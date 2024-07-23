<?php

namespace Modules\Home\Profile\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function info()
    {
        if (Auth::check()){
            $user = Auth::user();
            return view('Profile::Views/info', compact('user'));
        }
        toastr()->error('لطفا ثبت نام کنید.');
        return redirect()->back();
    }

    public function contacts()
    {
        if (Auth::check()){
            $user = Auth::user();
            return view('Profile::Views/contacts', compact('user'));
        }
        toastr()->error('لطفا ابتدا ثبت نام کنید.');
        return redirect()->back();
    }

    public function posts()
    {
        if (Auth::check()){
            $user = Auth::user();
            $posts = Post::where('user_id', \auth()->id())->get();
            return view('Profile::Views/posts', compact('user', 'posts'));
        }
        toastr()->error('لطفا ابتدا ثبت نام کنید.');
        return redirect()->back();
    }

    public function comments()
    {
        if (Auth::check()){
            $user = Auth::user();
            return view('Profile::Views/comments', compact('user'));
        }
        toastr()->error('لطفا ابتدا ثبت نام کنید.');
        return redirect()->back();
    }

    public function bookmarks()
    {
        if (Auth::check()){
            $user = Auth::user();
            return view('Profile::Views/bookmarks', compact('user'));
        }
        toastr()->error('لطفا ابتدا ثبت نام کنید.');
        return redirect()->back();
    }

    public function resetPassword()
    {
        if (Auth::check()){
            $user = Auth::user();
            return view('home.profile.resetPassword', compact('user'));
        }
        toastr()->error('لطفا ابتدا ثبت نام کنید.');
        return redirect()->back();
    }

    public function resetPasswordCheck(Request $request)
    {
        $request->validate([
            'currentPassword' => 'nullable',
            'newPassword' => 'required|min:8|max:32',
            'confirmNewPassword' => 'required|same:newPassword',
        ]);

        if (Hash::check($request->currentPassword, \auth()->user()->password)){
            $newPassword = Hash::make($request->newPassword);
            $user = Auth::user();
            $user->update([
                'password' => $newPassword
            ]);
            toastr()->success('کلمه عبور با موفقیت تغییر یافت.');
            return redirect()->back();
        }else{
            toastr()->error('کلمه عبور فعلی وارد شده درست نیست.');
            return redirect()->back();
        }
    }

    public function verifyEmail()
    {
        if (Auth::check()){
            $user = Auth::user();
            if ($user->email_verified_at == null){
                return view('home.profile.verifyEmail', compact('user'));
            }else{
                toastr()->info(('ایمیل شما قبلا تایید شده است.'));
                return redirect()->back();
            }
        }
        toastr()->error('لطفا ابتدا ثبت نام کنید.');
        return redirect()->back();
    }

    public function logout()
    {
        if (Auth::check()){
            auth()->logout();
        }
        return redirect()->route('home.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => ['required',Rule::unique('users')->ignore($request->user_id)],
            'avatar' => 'nullable|mimes:jpg,jpeg,png,svg',
            'email' => 'required|email'
        ]);

        try {
            DB::beginTransaction();

            $user = Auth::user();

            if ($request->avatar) {
                $avatarName = generateFileName($request->avatar->getClientOriginalName());
                $resized = $manager->read($request->avatar)->resize(100,100)->save(public_path(env('USER_AVATAR_UPLOAD_PATH')) , $avatarName);
//                $request->avatar->move(public_path(env('USER_AVATAR_UPLOAD_PATH')) , $avatarName);
            }

            $user->update([
                'username' => $request->username,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'avatar' => $request->avatar ? $avatarName : $user->avatar,
                'email' => $request->email
            ]);

            DB::commit();
        }catch (\Exception $ex) {
            DB::rollBack();
            toastr()->error('مشکلی پیش آمد!',$ex->getMessage());
            return redirect()->back();
        }

        toastr()->success('با موفقیت اطلاعات ویرایش شد.');
        return redirect()->back();
    }
}

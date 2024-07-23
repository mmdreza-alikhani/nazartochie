<?php

namespace Modules\Admin\User\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate();
        return view('User::Views/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('User::Views/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'min:8', 'max:12'],
        ]);

        User::create([
            'username' => $request->username,
            'provider_name' => 'manual',
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status
        ]);

        toastr()->success('با موفقیت به کاربران اضافه شد');
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('User::Views/show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('User::Views/edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'min:8', 'max:12'],
            'status' => ['required']
        ]);

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : Hash::make($user->password),
            'status' => $request->status
        ]);

        toastr()->success('کاربر مورد نظر با موفقیت ویرایش شد!');
        return redirect()->route('User::Views/index');
    }

    public function search(Request $request)
    {
        $keyWord = request()->keyword;
        if (request()->has('keyword') && trim($keyWord) != '') {
            $users = User::where('username', 'LIKE', '%' . trim($keyWord) . '%')->latest()->paginate(10);
            return view('User::Views/index', compact('users'));
        } else {
            $users = User::latest()->paginate(10);
            return view('User::Views/index', compact('users'));
        }
    }
}

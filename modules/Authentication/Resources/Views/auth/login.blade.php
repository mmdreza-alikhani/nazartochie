<!doctype html>
<html lang="fa">
<head>
    @include('home.sections.links')
</head>
<body>
<div class="signup text-right" style="direction: rtl">

    <!-- MAIN -->
    <main class="signup__main">
        <img class="signup__bg w-25" src="/home/images/R.png" alt="bg">

        <div class="container">
            <div class="signup__container">
                <div class="signup__logo">
                    {{--                    <a href="#"><img src="/home/fonts/icons/main/Logo_Forum.svg" alt="logo">Unity</a>--}}
                </div>

                <div class="signup__head">
                    <h3>ورود به حساب کاربری</h3>
                    <p>تا بتونی نظر بدی,مشکلاتت رو به اشتراک بذاری و فعالیت کنی!</p>
                </div>

                <form action="{{ route('login') }}" method="POST" style="margin-bottom: 5px">
                    @csrf
                    @error('email')
                    <div class="alert alert-danger text-center">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="signup__form">
                        <div class="signup__section">
                            <label class="signup__label" for="email">ایمیل:</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="signup__section">
                            <label class="signup__label" for="password">رمز عبور</label>
                            <div class="message-input">
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="signup__checkbox">
                            <div class="row">
                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <span class="ms-2 text-sm text-gray-600">{{ __('منو یادت نره!') }}</span>
                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="signup__section col-md-6" style="display: flex;justify-content: right">
                            <p>حساب کاربری نداری؟</p>
                            <a href="{{ route('register') }}">ثبت نام</a>
                        </div>

                        <div class="signup__section col-md-6" style="display: flex;justify-content: right">
                            <p>رمز عبور خودت رو فراموش کردی؟</p>
                            <a href="{{ route('password.request') }}">بازیابی</a>
                        </div>
                        <button class="signup__btn-create btn btn--type-02" type="submit">ورود</button>
                    </div>
                </form>

            </div>
        </div>
    </main>
</div>

@include('home.sections.scripts')
</body>
</html>

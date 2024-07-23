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
                    <h3>ساخت حساب کاربری</h3>
                    <p>تا بتونی نظر بدی,مشکلاتت رو به اشتراک بذاری و فعالیت کنی!</p>
                </div>

                <form action="{{ route('register') }}" method="POST" style="margin-bottom: 5px">
                    @csrf
                    <div class="signup__form">
                        <div class="signup__section">
                            <label class="signup__label" for="username">نام کاربری:</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
                            @error('username')
                            <div class="alert alert-danger text-center">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="signup__section">
                            <label class="signup__label" for="email">ایمیل:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                            <div class="alert alert-danger text-center">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="signup__section">
                                <label class="signup__label" for="password_confirmation">تکرار رمز عبور</label>
                                <div class="message-input">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                </div>
                            </div>
                            @error('password_confirmation')
                            <div class="alert alert-danger text-center">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="signup__section">
                                <label class="signup__label" for="password">رمز عبور</label>
                                <div class="message-input">
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                            @error('password')
                            <div class="alert alert-danger text-center">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="signup__checkbox">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="signup__box">
                                    <span>با <a style="color: #f9bc64">قوانین و مقررات</a> موافقم.
                                    <label class="custom-checkbox">
                                        <input type="checkbox" required>
                                        <i></i>
                                    </label>
                                    </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button class="signup__btn-create btn btn--type-02" type="submit">ثبت نام</button>
                    </div>
                </form>

                <div class="signup__section" style="display: flex;justify-content: right">
                    <p>قبلا ثبت نام کردی؟</p>
                    <a href="{{ route('login') }}">ورود</a>
                </div>
            </div>
        </div>
    </main>
</div>

@include('home.sections.scripts')
</body>
</html>

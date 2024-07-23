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
                    <h3>بازیابی رمز عبور</h3>
                    <p>ایمیل فعلی و رمز عبور جدیدت رو وارد کن!</p>
                </div>

                <form action="{{ route('password.store') }}" method="POST" style="margin-bottom: 5px">
                    @csrf
                    @error('email')
                    <div class="alert alert-danger text-center">
                        {{ $message }}
                    </div>
                    @enderror
                    @if(session('status'))
                        <div class="alert alert-success text-center">
                            {{ session('status') }}
                        </div>
                    @endif
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="signup__form">
                        <div class="signup__section">
                            <label class="signup__label" for="email">ایمیل:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
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
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
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
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                            </div>
                            @error('password')
                            <div class="alert alert-danger text-center">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button class="signup__btn-create btn btn--type-02" type="submit">بازیابی رمز عبور</button>
                    </div>
                </form>

            </div>
        </div>
    </main>
</div>

@include('home.sections.scripts')
</body>
</html>

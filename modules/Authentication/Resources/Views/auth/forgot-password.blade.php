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
                    <h3>فراموشی رمز عبور</h3>
                    <p>ایمیل خودت رو وارد کن و ما لینک بازیابی رو برات ارسال میکنیم!</p>
                </div>

                <form action="{{ route('password.email') }}" method="POST" style="margin-bottom: 5px">
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
                    <div class="signup__form">
                        <div class="signup__section">
                            <label class="signup__label" for="email">ایمیل:</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
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

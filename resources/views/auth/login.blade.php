{{--<x-guest-layout>--}}
{{--    <x-jet-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-jet-authentication-card-logo />--}}
{{--        </x-slot>--}}

{{--        <x-jet-validation-errors class="mb-4" />--}}

{{--        @if (session('status'))--}}
{{--            <div class="mb-4 font-medium text-sm text-green-600">--}}
{{--                {{ session('status') }}--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <form method="POST" action="{{ route('login') }}">--}}
{{--            @csrf--}}

{{--            <div>--}}
{{--                <x-jet-label for="email" value="{{ __('Email') }}" />--}}
{{--                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="password" value="{{ __('Password') }}" />--}}
{{--                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />--}}
{{--            </div>--}}

{{--            <div class="block mt-4">--}}
{{--                <label for="remember_me" class="flex items-center">--}}
{{--                    <x-jet-checkbox id="remember_me" name="remember" />--}}
{{--                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                @if (Route::has('password.request'))--}}
{{--                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">--}}
{{--                        {{ __('Forgot your password?') }}--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                <x-jet-button class="ml-4">--}}
{{--                    {{ __('Log in') }}--}}
{{--                </x-jet-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-jet-authentication-card>--}}
{{--</x-guest-layout>--}}
{{--    <!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>Login User</title>--}}
{{--    <link rel="stylesheet" href="{{ asset('auth/css/stylelogin.css') }}">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">--}}
{{--</head>--}}

{{--<body>--}}
{{--<img class="background" src="{{asset('auth/img/background.jpeg')}}">--}}
{{--<div class="header">--}}
{{--    <div class="header-logo">--}}
{{--        <ul>--}}
{{--            <li><img src="{{ asset('auth/img/logo.png') }}" class="img-logo"></li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="wrapper">--}}
{{--    <div class="container">--}}
{{--        <div class="whitebg">--}}

{{--            <div class="box signin">--}}
{{--                <h2>Sudah Punya Akun ?</h2>--}}
{{--                <button class="signinBtn">Masuk</button>--}}
{{--            </div>--}}
{{--            <div class="box signup">--}}
{{--                <h2>Belum Punya Akun ?</h2>--}}
{{--                <button class="signupBtn">Daftar</button>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--        <div class="formWx">--}}
{{--            <div class="form signinForm">--}}

{{--            </div>--}}
{{--            --}}{{--            <form >--}}
{{--            --}}{{--                @csrf--}}

{{--            --}}{{--                <div>--}}
{{--            --}}{{--                    <x-jet-label for="name" value="{{ __('Name') }}" />--}}
{{--            --}}{{--                    <x-jet-input id="name" class="block mt-1 w-full"  />--}}
{{--            --}}{{--                </div>--}}

{{--            --}}{{--                <div class="mt-4">--}}
{{--            --}}{{--                    <x-jet-label for="email" value="{{ __('Email') }}" />--}}
{{--            --}}{{--                    <x-jet-input id="email" class="block mt-1 w-full" />--}}
{{--            --}}{{--                </div>--}}

{{--            --}}{{--                <div class="mt-4">--}}
{{--            --}}{{--                    <x-jet-label for="password" value="{{ __('Password') }}" />--}}
{{--            --}}{{--                    <x-jet-input id="password" class="block mt-1 w-full"  />--}}
{{--            --}}{{--                </div>--}}

{{--            --}}{{--                <div class="mt-4">--}}
{{--            --}}{{--                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />--}}
{{--            --}}{{--                    <x-jet-input id="password_confirmation" class="block mt-1 w-full"/>--}}
{{--            --}}{{--                </div>--}}

{{--            --}}{{--                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())--}}
{{--            --}}{{--                    <div class="mt-4">--}}
{{--            --}}{{--                        <x-jet-label for="terms">--}}
{{--            --}}{{--                            <div class="flex items-center">--}}
{{--            --}}{{--                                <x-jet-checkbox name="terms" id="terms"/>--}}

{{--            --}}{{--                                <div class="ml-2">--}}
{{--            --}}{{--                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [--}}
{{--            --}}{{--                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',--}}
{{--            --}}{{--                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',--}}
{{--            --}}{{--                                    ]) !!}--}}
{{--            --}}{{--                                </div>--}}
{{--            --}}{{--                            </div>--}}
{{--            --}}{{--                        </x-jet-label>--}}
{{--            --}}{{--                    </div>--}}
{{--            --}}{{--                @endif--}}

{{--            --}}{{--                <div class="flex items-center justify-end mt-4">--}}
{{--            --}}{{--                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">--}}
{{--            --}}{{--                        {{ __('Already registered?') }}--}}
{{--            --}}{{--                    </a>--}}

{{--            --}}{{--                    <x-jet-button class="ml-4">--}}
{{--            --}}{{--                        {{ __('Register') }}--}}
{{--            --}}{{--                    </x-jet-button>--}}
{{--            --}}{{--                </div>--}}

{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}

{{--</div>--}}

{{--<script>--}}
{{--    const signinBtn = document.querySelector('.signinBtn')--}}
{{--    const signupBtn = document.querySelector('.signupBtn')--}}
{{--    const formWX = document.querySelector('.formWx')--}}
{{--    const wrapper = document.querySelector('.wrapper')--}}
{{--    const goSignInLabel = document.getElementById("goSignInLabel");--}}
{{--    const goSignUpLabel = document.getElementById("goSignUpLabel");--}}

{{--    signupBtn.onclick = function () {--}}
{{--        formWX.classList.add('active')--}}
{{--        wrapper.classList.add('active')--}}
{{--    }--}}

{{--    goSignUpLabel.onclick = function () {--}}
{{--        formWX.classList.add('active')--}}
{{--        wrapper.classList.add('active')--}}
{{--    }--}}

{{--    signinBtn.onclick = function () {--}}
{{--        formWX.classList.remove('active')--}}
{{--        wrapper.classList.remove('active')--}}
{{--    }--}}

{{--    goSignInLabel.onclick = function () {--}}
{{--        formWX.classList.remove('active')--}}
{{--        wrapper.classList.remove('active')--}}
{{--    }--}}

{{--    var state = false;--}}

{{--    function toggle() {--}}
{{--        if (state) {--}}
{{--            document.getElementById("password").setAttribute("type", "password");--}}
{{--            document.getElementById("eye").style.color = '#7a797e'--}}
{{--            state = false;--}}
{{--        } else {--}}
{{--            document.getElementById("password").setAttribute("type", "text");--}}
{{--            document.getElementById("eye").style.color = '#5887ef'--}}
{{--            state = true;--}}
{{--        }--}}
{{--    }--}}

{{--    var state = false;--}}

{{--    function toggle1() {--}}
{{--        if (state) {--}}
{{--            document.getElementById("daftar_password").setAttribute("type", "password");--}}
{{--            document.getElementById("eye_daftar").style.color = '#7a797e'--}}
{{--            state = false;--}}
{{--        } else {--}}
{{--            document.getElementById("daftar_password").setAttribute("type", "text");--}}
{{--            document.getElementById("eye_daftar").style.color = '#5887ef'--}}
{{--            state = true;--}}
{{--        }--}}
{{--    }--}}

{{--    var state = false;--}}

{{--    function toggle2() {--}}
{{--        if (state) {--}}
{{--            document.getElementById("daftar_password_konfirmasi").setAttribute("type", "password");--}}
{{--            document.getElementById("eye_daftar_konfirmasi").style.color = '#7a797e'--}}
{{--            state = false;--}}
{{--        } else {--}}
{{--            document.getElementById("daftar_password_konfirmasi").setAttribute("type", "text");--}}
{{--            document.getElementById("eye_daftar_konfirmasi").style.color = '#5887ef'--}}
{{--            state = true;--}}
{{--        }--}}
{{--    }--}}
{{--</script>--}}

{{--</body>--}}

{{--</html>--}}
    <!DOCTYPE html>
<html lang="id-ID">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
    <link rel="stylesheet" href="{{asset('auth/css/stylelogin.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
<img class="background" src="{{asset('auth/img/background.jpeg')}}">
<div class="header">
    <div class="header-logo">
        <ul>
            {{--            <li><img src="{{ asset('assets/images/logo/logo.png') }}" class="img-logo"></li>--}}
            <li><img src="{{ asset('auth/img/logo.png') }}" class="img-logo"></li>
        </ul>
    </div>
</div>

<div class="wrapper">
    <div class="container">
        <div class="whitebg">

            <div class="box signin">
                <h2>Sudah Punya Akun ?</h2>
                <button class="signinBtn">Masuk</button>
            </div>
            <div class="box signup">
                <h2>Belum Punya Akun ?</h2>
                <button class="signupBtn">Daftar</button>
            </div>

        </div>
        <div class="formWx">
            <div class="form signinForm">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <h1>Log In</h1>
                    <h3>Selamat Datang,<br> Masukkan akun anda : </h3>
                    <label for="container_form">
                        <input type="text" name="email" :value="old('email')" placeholder="Email" required autofocus>
                        @if($errors->has('email'))
                            <p class="error text-danger" style="color: red">{{ $errors->first('email') }}</p>
                        @endif
                        <input type="password" name="password" autocomplete="current-password" placeholder="Password"
                               id="password" required>
                        @if($errors->has('password'))
                            <p class="error text-danger" style="color: red">{{ $errors->first('password') }}</p>
                        @endif
                        <span>
                            <i class="fa-solid fa-eye eye" id="eye" onclick="toggle()"></i>
                            </span>
                    </label>
                    <div class="checkboxDiv">
                        <input class="check_box" type="checkbox" id="remember_me" name="remember">
                        <label class="label_box" for="tetap_masuk">Biarkan tetap masuk</label>
                    </div>
                    <input type="submit" class="submit" name="login" value="Masuk">
                    <a href="{{ route('password.request') }}" style="text-decoration: none"><h5 class="center-fpass-sign">Forget Password / Lupa Password ?</h5></a>
                    <h5 class="center-fpass-sign" id="or-fpass">or</h5>
                    <h5 class="center-fpass-sign" id="goSignUpLabel" onclick="">Belum Punya Akun ?</h5>
                </form>
            </div>
            {{--            <div class="form signupForm">--}}

            {{--                    <h3>Ayo Daftar dulu : </h3>--}}
            {{--                    <label for="container_form_daftar">--}}

            {{--                    </label>--}}
            {{--                </form>--}}
            <div class="form signupForm">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h3>Ayo Daftar dulu : </h3>
                    <label for="container_form_daftar">
                        <input type="text" placeholder="Nama Lengkap" name="name"
                               :value="old('name')" required
                        >
                        @if($errors->has('name'))
                            <p class="error text-danger" style="color: red">{{ $errors->first('name') }}</p>
                        @endif
                        <input placeholder="Alamat Email" type="email" name="email" :value="old('email')" required>
                        @if($errors->has('email'))
                            <p class="error text-danger" style="color: red">{{ $errors->first('email') }}</p>
                        @endif
                        <input placeholder="Password" type="password" name="password" required id="registerPassword"
                               autocomplete="new-password">
                        @if($errors->has('password'))
                            <p class="error text-danger" style="color: red">{{ $errors->first('password') }}</p>
                        @endif
                        <span>
                            <i class="fa-solid fa-eye" id="eye_daftar" onclick="toggle1()"></i>
                        </span>
                        <input placeholder="Konfirmasi Password" type="password" name="password_confirmation" required
                               autocomplete="new-password" id="registerConfirmPassword">
                        @if($errors->has('password_confirmation'))
                            <p class="error text-danger" style="color: red">{{ $errors->first('password_confirmation') }}</p>
                        @endif
                        <span>
                            <i class="fa-solid fa-eye" id="eye_daftar_konfirmasi"
                               onclick="toggle2()"></i>
                        </span>
                        <input type="text" name="phone_number" placeholder="Nomor Telepon" required>
                        @if($errors->has('phone_number'))
                            <p class="error text-danger" style="color: red">{{ $errors->first('phone_number') }}</p>
                        @endif
                        <input type="submit" class="submit" name="daftar" value="Daftar">
                        <h5 id="goSignInLabel">Sudah Punya Akun ?</h5>
                    </label>
                </form>
            </div>

        </div>
    </div>

</div>

<script>
    const signinBtn = document.querySelector('.signinBtn')
    const signupBtn = document.querySelector('.signupBtn')
    const formWX = document.querySelector('.formWx')
    const wrapper = document.querySelector('.wrapper')
    const goSignInLabel = document.getElementById("goSignInLabel");
    const goSignUpLabel = document.getElementById("goSignUpLabel");

    signupBtn.onclick = function () {
        formWX.classList.add('active')
        wrapper.classList.add('active')
    }

    goSignUpLabel.onclick = function () {
        formWX.classList.add('active')
        wrapper.classList.add('active')
    }

    signinBtn.onclick = function () {
        formWX.classList.remove('active')
        wrapper.classList.remove('active')
    }

    goSignInLabel.onclick = function () {
        formWX.classList.remove('active')
        wrapper.classList.remove('active')
    }

    var state = false;

    function toggle() {
        if (state) {
            document.getElementById("password").setAttribute("type", "password");
            document.getElementById("eye").style.color = '#7a797e'
            state = false;
        } else {
            document.getElementById("password").setAttribute("type", "text");
            document.getElementById("eye").style.color = '#5887ef'
            state = true;
        }
    }

    var state1 = false;

    function toggle1() {
        if (state1) {
            document.getElementById("registerPassword").setAttribute("type", "password");
            document.getElementById("eye_daftar").style.color = '#7a797e';
            state1 = false;
        } else {
            document.getElementById("registerPassword").setAttribute("type", "text");
            document.getElementById("eye_daftar").style.color = '#5887ef';
            state1 = true;
        }
    }

    var state2 = false;

    function toggle2() {
        if (state2) {
            document.getElementById("registerConfirmPassword").setAttribute("type", "password");
            document.getElementById("eye_daftar_konfirmasi").style.color = '#7a797e';
            state2 = false;
        } else {
            document.getElementById("registerConfirmPassword").setAttribute("type", "text");
            document.getElementById("eye_daftar_konfirmasi").style.color = '#5887ef';
            state2 = true;
        }
    }
</script>

</body>

</html>

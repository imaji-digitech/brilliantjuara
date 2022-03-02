{{--<x-guest-layout>--}}
{{--    <x-jet-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-jet-authentication-card-logo />--}}
{{--        </x-slot>--}}

{{--        <x-jet-validation-errors class="mb-4" />--}}

{{--        <form method="POST" action="{{ route('password.update') }}">--}}
{{--            @csrf--}}
{{--            <input type="hidden" name="token" value="{{ $request->route('token') }}">--}}

{{--            <div class="block">--}}
{{--                <x-jet-label for="email" value="{{ __('Email') }}" />--}}
{{--                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="password" value="{{ __('Password') }}" />--}}
{{--                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />--}}
{{--                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <x-jet-button>--}}
{{--                    {{ __('Reset Password') }}--}}
{{--                </x-jet-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-jet-authentication-card>--}}
{{--</x-guest-layout>--}}

    <!DOCTYPE html>
<html lang="id-ID">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="{{asset('auth/css/stylelogin.css?_=2')}}">
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
    <div class="container mobile-forgot" style="text-align: center; margin: auto;">
        <div class="formWx" style="width: 100%">
            <div class="form signinForm">

                {{--                <form method="POST" action="{{ route('password.email') }}">--}}
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <h1>Reset Password</h1>
                    <br>

                    @if (session('status'))
                        <h6>
                            {{ session('status') }}
                        </h6>
                    @endif
                    <br>

                    <label for="container_form">
                        <input type="text" id="email" name="email" value="{{old('email', $request->query('email'))}}" placeholder="Email" required
                               autofocus>
                        @if($errors->has('email'))
                            <p class="error text-danger" style="color: red">{{ $errors->first('email') }}</p>
                        @endif
                        <input placeholder="Password" type="password" name="password" required id="registerPassword"
                               autocomplete="new-password">
                        @if($errors->has('password'))
                            <p class="error text-danger" style="color: red">{{ $errors->first('password') }}</p>
                        @endif
                        <span>
                            <i class="fa-solid fa-eye" id="eye_daftar2" onclick="toggle1()"></i>
                        </span>
                        <input placeholder="Konfirmasi Password" type="password" name="password_confirmation" required
                               autocomplete="new-password" id="registerConfirmPassword">
                        @if($errors->has('password_confirmation'))
                            <p class="error text-danger" style="color: red">{{ $errors->first('password_confirmation') }}</p>
                        @endif
                        <span>
                            <i class="fa-solid fa-eye" id="eye_daftar_konfirmasi2"
                               onclick="toggle2()"></i>
                        </span>
                    </label>
                    {{--                    <div class="checkboxDiv">--}}
                    {{--                        <input class="check_box" type="checkbox" id="remember_me" name="remember">--}}
                    {{--                        <label class="label_box" for="tetap_masuk">Biarkan tetap masuk</label>--}}
                    {{--                    </div>--}}
                    <input type="submit" class="submit" name="Reset Password" value="Reset Password">
                    {{--                    <h5 class="center-fpass-sign">Forget Password / Lupa Password ?</h5>--}}
                    {{--                    <h5 class="center-fpass-sign" id="or-fpass">or</h5>--}}
                    {{--                    <h5 class="center-fpass-sign" id="goSignUpLabel" onclick="">Belum Punya Akun ?</h5>--}}
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
            document.getElementById("eye_daftar2").style.color = '#7a797e';
            state1 = false;
        } else {
            document.getElementById("registerPassword").setAttribute("type", "text");
            document.getElementById("eye_daftar2").style.color = '#5887ef';
            state1 = true;
        }
    }

    var state2 = false;

    function toggle2() {
        if (state2) {
            document.getElementById("registerConfirmPassword").setAttribute("type", "password");
            document.getElementById("eye_daftar_konfirmasi2").style.color = '#7a797e';
            state2 = false;
        } else {
            document.getElementById("registerConfirmPassword").setAttribute("type", "text");
            document.getElementById("eye_daftar_konfirmasi2").style.color = '#5887ef';
            state2 = true;
        }
    }
</script>

</body>

</html>

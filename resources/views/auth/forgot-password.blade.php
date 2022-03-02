<!DOCTYPE html>
<html lang="id-ID">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
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
    <div class="container" style="text-align: center; margin: auto; width: 30%">
        <div class="formWx" style="width: 100%">
            <div class="form signinForm">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <h1>Lupa Password</h1>
                    <br>
                    <h6>Masukkan email yang terdaftar di akun brilliant juara</h6>
                    @if (session('status'))
                        <h6>
                            {{ session('status') }}
                        </h6>
                    @endif
                    <br>
                    {{--                    <h3>Selamat Datang,<br> Masukkan akun anda : </h3>--}}
                    <label for="container_form">
                        <input type="text" id="email" name="email" :value="old('email')" placeholder="Email" required
                               autofocus>
                        @if($errors->has('email'))
                            <p class="error text-danger" style="color: red">{{ $errors->first('email') }}</p>
                        @endif
                        {{--                        <input type="password" name="password" autocomplete="current-password" placeholder="Password"--}}
                        {{--                               id="password" required>--}}
                        {{--                        <span>--}}
                        {{--                            <i class="fa-solid fa-eye eye" id="eye" onclick="toggle()"></i>--}}
                        {{--                            </span>--}}
                    </label>
                    {{--                    <div class="checkboxDiv">--}}
                    {{--                        <input class="check_box" type="checkbox" id="remember_me" name="remember">--}}
                    {{--                        <label class="label_box" for="tetap_masuk">Biarkan tetap masuk</label>--}}
                    {{--                    </div>--}}
                    <input type="submit" class="submit" name="login" value="Email Password Reset Link">
                    {{--                    <h5 class="center-fpass-sign">Forget Password / Lupa Password ?</h5>--}}
                    {{--                    <h5 class="center-fpass-sign" id="or-fpass">or</h5>--}}
                    {{--                    <h5 class="center-fpass-sign" id="goSignUpLabel" onclick="">Belum Punya Akun ?</h5>--}}
                </form>
            </div>
            {{--            <div class="form signupForm">--}}

            {{--                    <h3>Ayo Daftar dulu : </h3>--}}
            {{--                    <label for="container_form_daftar">--}}

            {{--                    </label>--}}
            {{--                </form>--}}


        </div>
    </div>

</div>


</body>

</html>

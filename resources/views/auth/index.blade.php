@extends('master')
@section('content')

<section class="login-wrapper">
    <div class="login">
        <div class="login-title">
            <h3>Bem vindo de volta!</h3>
            <h3>Estavamos sentido sua falta.</h3>
        </div>

        <div class="social-media-login">
            <button class="btn btn-sm-login">
                <i><img src="{{asset('img/g-icon.png')}}" alt=""></i>
                <span>
                    Entre com o Google
                </span>
            </button>
            <button class="btn btn-sm-login">
                <i><img src="{{asset('img/f-icon.png')}}" alt=""></i>
                <span>Entre com o Facebook</span>
            </button>
            <button class="btn btn-sm-login">
                <i><img src="{{asset('img/a-icon.png')}}" alt=""></i>
                <span>Entre com aApple</span>
            </button>
        </div>
        <h3 class="sub-login-title">Ou entre com seu e-mail</h3>
        <div class="email-login">
            <form action="{{route('auth.login')}}" method="post">
                @csrf
                <input class="form-control" name="email" type="email" placeholder="Digite seu e-mail...">
                <input class="form-control" name="password" type="password" placeholder="Digite sua senha...">
                <input class="btn btn-landing-login" type="submit" value="Entrar">
            </form>
            <div class="options">
                <a class="nav-link" href="{{route('auth.register')}}"><span>Junte-se </span>a nós</a>
                <span>Esqueceu sua senha?</span>
            </div>
        </div>
    </div>
    <div class="img-login">
        <img src="{{asset('img/login-img.png')}}" alt="">
    </div>
</section>
@endsection
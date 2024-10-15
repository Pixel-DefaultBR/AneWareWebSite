@extends('master')
@section('content')


<section class="login-wrapper">
    <div class="img-login">
        <img src="{{asset('img/register-img.png')}}" alt="">
    </div>
    <div class="login">
        <div class="login-title">
            <h3>Junte-se ao nosso time.</h3>
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
        <h3 class="sub-login-title">Ou registre-se com seu e-mail</h3>
        <div class="email-login">
            <form action="{{route('auth.register')}}" method="post">
                @csrf
                <input class="form-control" id="rg-email" type="email" name="email" placeholder="Digite seu e-mail...">
                <input class="form-control" id="rg-password" type="password"  name="password" placeholder="Digite sua senha...">
                <input class="form-control" id="rg-confirm-password"  name="confirmPassword"  type="password"
                    placeholder="Confirme sua senha...">
                <input class="btn btn-landing-login" id="call-modal" type="submit" value="Registrar">
            </form>
        </div>
    </div>
    <!-- <div class="modal-wrapper">
        <div class="modal-inputs">
            <h3>Escolha um nome de usuario</h3>
            <input type="text" id="access_key" class="form-control" placeholder="Nome de usuário" required><br>
            <button id="submit-register-form-btn" class="btn btn-landing-login">Confirmar</button>
        </div>
    </div> -->
</section>
@endsection
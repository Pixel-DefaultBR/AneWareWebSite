@extends('master')

@section('content')

<section class="landing-page-wrapper">
    <div class="landing-content-container">
        <div class="bubble-1"></div>
        <div class="bubble-2"></div>
        <div class="bubble-3"></div>
        <div class="content-wrapper">
            <div class="title-apresentation">
                <h1>Aneware Security</h1>
            </div>
            <div class="landing-content">
                <span>
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum."
                </span>
            </div>
            <div class="landing-btn">
                <a class="btn btn-landing-login">Entrar</a>
                <a class="btn btn-landing-about">Saiba mais</a>
            </div>
        </div>
    </div>
    <div class="landing-img-container">
        <img class="landing-img" src="{{asset('img/coding.png')}}" alt="">
    </div>
</section>

@endsection
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{asset('img/anew.png')}}">
    <title>Aneware security</title>
    <script src="https://kit.fontawesome.com/f22d008a67.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/report.css')}}">
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

@if(!auth()->check())
    <header class="navbar-menu">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid nav-items-wrapper">
                <a href="{{route('site.home')}}" class="navbar-brand" id="logo">A-W Sec</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-items navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <div class="border-bottom-hover">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{route('site.report.index')}}">Relatorios</a>
                            </li>
                        </div>
                        <div class="border-bottom-hover">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Codigos</a>
                            </li>
                        </div>
                        <div class="border-bottom-hover">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Sobre</a>
                            </li>
                        </div>
                    </ul>
                    <div class="navbar-login-icon-wrapper" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 login-redirect-btn">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('auth.index')}}"><i
                                        class="fa-solid fa-arrow-right-to-bracket"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
@else
    <header class="navbar-menu">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid nav-items-wrapper">
                <a href="{{route('site.home')}}" class="navbar-brand" id="logo">A-W Sec</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-items navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <div class="border-bottom-hover">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{route('site.report.index')}}">Relatorios</a>
                            </li>
                        </div>
                        <div class="border-bottom-hover">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Codigos</a>
                            </li>
                        </div>
                        <div class="border-bottom-hover">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Sobre</a>
                            </li>
                        </div>
                    </ul>
                    <div class="navbar-login-icon-wrapper" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 login-redirect-btn">
                            <li class="nav-item">
                                <a href="{{route('site.profile.profile')}}"><img class="nav-link profile-img"
                                        src="{{asset('storage/img/' . (auth()->user()->image ?? 'default.png'))}}">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
@endif

<body>
    <x-error-handle-card />

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

@if(auth()->check())

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/style.css?v=' . time())}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
            crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="https://kit.fontawesome.com/f22d008a67.js" crossorigin="anonymous"></script>
        <title>AneWare Security</title>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg nav-container">
            <div class="container-fluid ">
                <a class="navbar-brand" href="{{route('site.home')}}">A-W Sec</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('site.report.index')}}">Relatórios</a>
                        </li>
                        <li><a class="nav-link" href="{{route('site.code')}}">Códigos</a></li>
                        <li><a class="nav-link" href="{{route('site.about')}}">Sobre nós</a></li>

                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false" href="#">
                                <img class="top-perfil-image" src="{{asset('storage/img/' . (auth()->user()->image ?? 'default.jpg'))}}" />
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('app.dashboard.index')}}">Dashboard</a></li>
                                <li><a class="dropdown-item" href="{{route('app.index', auth()->user()->name)}}">Perfil</a>
                                </li>
                                <li><a class="dropdown-item" href="{{route('app.auth.logout')}}">Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
@else

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/style.css?v=' . time())}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
            crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="https://kit.fontawesome.com/f22d008a67.js" crossorigin="anonymous"></script>
        <title>AneWare Security</title>
    </head>

    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid ">
                <a class="navbar-brand" href="{{route('site.home')}}">A-W Sec</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('site.report.index')}}">Relatórios</a>
                        </li>
                        <li><a class="nav-link" href="{{route('site.code')}}">Códigos</a></li>
                        <li><a class="nav-link" href="{{route('site.about')}}">Sobre nós</a></li>
                    </ul>
                    <a class="btn bg-light bg-light btn-login" href="{{route('app.auth.index')}}"><i
                            class="fa-solid fa-door-open"></i></a>

                </div>
            </div>
        </nav>
    </header>

    <body>
@endif
        <div class="container">
            <div class="container py-2">
                <div class="alert-container">
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            <span class="error-message">
                                <i class="fa-solid fa-circle-exclamation"></i>{{session('error')}}
                            </span>
                        </div>
                    @elseif($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                <span class="error-message"> <i class="fa-solid fa-circle-exclamation"></i> {{$error}}</span>
                            </div>
                        @endforeach
                    @elseif(session('success'))
                        <div class="alert alert-success" role="alert">
                            <span class="success-message">
                                <i class="fa-solid fa-check"></i>{{session('success')}}
                            </span>

                        </div>
                    @endif
                </div>

                @yield('content')
            </div>
        </div>

        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
            </ul>
            <p class="text-center text-body-secondary">© 2024 Company, Inc</p>
        </footer>
        <script src="{{asset('js/script.js?v=') . time() }}"></script>
    </body>

</html>
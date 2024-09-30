@extends('master')
@section('content')

@if (count($response) > 0)

    <div>
        <!--CRIAR DIV DE ALERTA DE CODIGO COPAIDO COM SUCESSO-->
        <form action="{{route('site.code')}}" method="post">
            @csrf
            <div class="mb-3 container researcher-container">
                <select class="form-select" id="coder" name="coder">
                    @foreach ($username as $name)
                        <option value="{{$name->name}}">{{$name->name}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-dark">Buscar</button>
            </div>
        </form>
        @foreach ($response as $resp)
            <div class="card card-apear">
                <div class="card-header">
                    <div class="report-card-header">
                        <span>{{$resp->owner->login}}</span>
                        <img src="{{ $resp->owner->avatar_url }}" class="client-img" alt="">
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <p class="card-text">Veja no Github: -
                            <a href="{{$resp->html_url}}" class="researcher"><i class="fa-brands fa-github"></i></a>
                        </p>
                        <p class="card-text">
                            <code class="clone-url copy-code">
                                <span>
                                    git clone {{$resp->clone_url}}
                                </span>
                                <i class="fa-solid fa-copy"></i>
                            </code>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else

    <div class="home-page">
        <div class="code-landing">
            <div>
                <div class=" position-relative p-3 text-center text-muted bg-body border-0 border-dashed rounded-2d">
                    <h1 class="text-body-emphasis">Codigos</h1>
                    <p class="col-lg-6 mx-auto mb-4">
                        Veja abaixo o portfólio de nossos pesquisadores.
                    </p>
                </div>
            </div>
            <div class="card researcher-card">
                <form action="{{route('site.code')}}" method="post">
                    @csrf
                    <div class="card-header">
                        <label for="severity" class="form-label">Nossos pesquisadores</label>
                    </div>
                    <div class="mb-3 researcher-container card-body">
                        <select class="form-select" id="coder" name="coder" value="------">
                            @foreach ($username as $name)
                                <option value="{{$name->name}}">{{$name->name}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-dark">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="landing-image-container">
            <img class="landing-image" src="{{asset('/img/researchers.png')}}" alt="Aneware Security">
        </div>
    </div>
    <div class="container">

    </div>
@endif

@endsection
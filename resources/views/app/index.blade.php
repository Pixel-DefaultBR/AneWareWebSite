@extends('master')
@section('content')<!-- Inclui o arquivo sidebar.blade.php -->


<div class="container px-4">
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <img src="{{secure_asset('storage/img/' . ($user->image ?? 'default.jpg'))}}"
                        class="rounded-circle mb-2" alt="User Image"
                        style="max-width: 100px; height:100px; object-fit: cover;">
                    <h5 class="my-3">{{$user->name}}</h5>
                    <p class="text-muted mb-1"></p>
                    <div class="d-flex justify-content-center mb-2">
                        <a href="{{route('app.edit', $user->name)}}" class="btn btn-dark">Editar</a>
                    </div>
                </div>
            </div>
            <div class="card mb-4 mb-lg-0">
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush rounded-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fas fa-globe fa-lg text-warning"></i>
                            <p class="mb-0">{{$user->website ?? '----'}}</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fab fa-github fa-lg text-body"></i>
                            <p class="mb-0">{{$user->github ?? '----'}}</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                            <p class="mb-0">{{$user->twitter ?? '----'}}</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                            <p class="mb-0">{{$user->instagram ?? '----'}}</p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                            <p class="mb-0">{{$user->facebook ?? '----'}}</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card mb-4 mb-lg-0">
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush rounded-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3 row">
                            <a class="btn btn-dark" href="{{route('app.auth.logout')}}">Sair</a>
                        </li>
                </div>

            </div>
        </div>

        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">README</div>
                <div class="card-body" style="height: 100vh; overflow: auto;">
                    <div class="bio-container">
                        <textarea class="bio-area" readonly >{{$user->description}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

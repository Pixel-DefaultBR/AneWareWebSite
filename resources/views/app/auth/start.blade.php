@extends('master')
@section('content')

<div class="container d-flex align-items-center justify-content-center">
    <div class="card col-lg-4">
        <div class="px-3 py-4 p-md-5 mx-md-4 register-container">
            <h4 class="mb-4">Junte-se a nós</h4>
            <form action="{{route('app.auth.register')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="registerName" class="form-label">Nome de usuario:</label>
                    <input type="text" class="form-control" id="registerName" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="registerEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="registerEmail" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="registerPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="registerPassword" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirme sua senha</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-secondary">Criar conta</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
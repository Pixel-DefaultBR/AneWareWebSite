@extends('master')
@section('content')


<div class="container d-flex align-items-center justify-content-center">
    <div class="card col-lg-4 ">
        <div class="card-body p-md-5 mx-md-4">
            <div class="text-center">
                <h4 class="mt-1 mb-5 pb-1">Entre</h4>
            </div>
            <form action="{{route('app.auth.login')}}" method="post">
                @csrf
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example11">Email</label>
                    <input type="email" id="form2Example11" class="form-control" name="email" required value="" />
                </div>
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="form2Example22" name="password">Password</label>
                    <input type="password" id="form2Example22" class="form-control" name="password" value="" />
                </div>
                <div class="text-center row pt-1 mb-5 pb-1">
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-secondary btn-block"
                        type="submit">Login</button>
                </div>
            </form>
            <a class="nav-link border-bottom d-flex align-items-center justify-content-center"
                href="{{route('app.auth.start')}}">Ou junte-se a nos</a>
        </div>
    </div>
</div>

@endsection
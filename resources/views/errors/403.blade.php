@extends('master')
@section('content')

<div class="container  d-flex justify-content-center">
    <div class="card mt-5">
        <div class="card-header 403-header">
            <h2>403</h2>
        </div>
        <div class="card-body">
            <span>{{$error}}</span>
        </div>
    </div>
</div>


@endsection
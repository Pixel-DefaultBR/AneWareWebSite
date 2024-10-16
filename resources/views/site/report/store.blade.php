@extends('master')
@section('content')
<!-- 
                $table->integer('reported_for_user_id');
                $table->string('title')->nullable(false);
                $table->text('description')->nullable(false);
                $table->string('user')->nullable(false);
                $table->string('severity')->nullable(false);
                $table->string('status')->nullable(false);
                $table->string('image')->nullable(true);
                $table->timestamps(); -->
@if (auth()->check())
    <form action="{{route('site.report.store')}}" method="post">
        @csrf
        <input type="text" name="title" value="CORS * habilitado">
        <input type="text" name="description"
            value="Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit placeat deserunt obcaecati est facere nisi architecto pariatur adipisci! Eveniet quo ">
        <input type="text" name="user" value="{{auth()->user()->name}}">
        <input type="text" name="severity" value="Informativa">
        <input type="text" name="status" value="Resolvido">
        <input type="file" name="image">
        <input type="submit" value="criar">
    </form>
@else
    <script>window.location.href = "{{ route('site.home') }}";</script>
@endif

@endsection
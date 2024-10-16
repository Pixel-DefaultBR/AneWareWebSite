@extends('master')
@section('content')

@if (auth()->check())
    <section class="profile-wrapper">
        <div class="profile-img-wrapper">
            <div class="main-img">
                <img class="can-edit-top-img" id="top-img"
                    src="{{asset('storage/img/' . (auth()->user()->top_image ?? 'default-top.png'))}}" alt="">
                <input type="file" id="dashboard-image" accept="image/png image/jpg image/jpg" data-max-sixe="4000" class="edit-input-top-img" style="display: none;">
            </div>
            <div class="user-profile-img">
                <img class="can-edit-profile-img" id="profile-img"
                    src="{{asset('storage/img/' . (auth()->user()->image ?? 'default.png'))}}" alt="">
                <input type="file" id="profile-image" accept="image/png image/jpg image/jpg" data-max-sixe="4000" class="edit-input-profile-img" style="display: none;">
                <div class="followers-img">
                    <img src="{{asset('img/fl-1.png')}}" alt="">
                    <img src="{{asset('img/fl-2.png')}}" alt="">
                    <img src="{{asset('img/fl-3.png')}}" alt="">
                    <img src="{{asset('img/fl-4.png')}}" alt="">
                </div>
            </div>
        </div>

        <div class="profile-info-wrapper">
            <h3 id="user-name" class="can-edit">{{auth()->user()->name}}</h3>
            <h5 id="user-summary" class="can-edit">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga voluptatum,
                totam reiciendis
                consequatur
                laborum expedita magni odio vel nam earum accusantium praesentium omnis ea voluptas. Explicabo, officiis!
                Soluta, ullam nemo.
                Porro quo in iste laudantium earum. Velit impedit perferendis harum in odio. Dignissimos enim modi impedit
                laudantium voluptates soluta magnam saepe reiciendis suscipit quis, neque omnis eius dicta temporibus
                deserunt.</h5>
            <div class="profile-action-wrapper">
                <div class="actions">
                    <a href="{{route('site.report.store')}}" class="btn btn-action-pf"><i class="fa-solid fa-plus"></i></a>
                    <button class="btn btn-action-pf"><i class="fa-solid fa-code"></i></button>
                    <button class="btn btn-action-pf"><i class="fa-solid fa-eye"></i></button>
                </div>
                <a href="{{route('auth.logout')}}" class="btn btn-action-pf"><i class="fa-solid fa-door-open"></i></a>
            </div>
        </div>
        <h5>Seus <span class="purple">relatorios</span>:</h5>
        <div class="show-report-wrapper">
            @foreach ($reports as $report)
                <x-report-card :id="$report->id" :cardType="'card-profile'" :title="$report->title"
                    :description="$report->description" :user="$report->user" :severity="$report->severity" />
            @endforeach
        </div>
        <div class="paginate">
            {{$reports->links()}}
        </div>
    </section>
@else
    <script>window.location.href = "{{ route('site.home') }}";</script>
@endif

@endsection
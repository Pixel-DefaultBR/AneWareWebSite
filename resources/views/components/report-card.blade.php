@props([
    'title',
    'description',
    'user',
    'severity',
    'cardType',
    'id',
])

<div class="report-card">
    <div class="report-img">
        <img class="card-img-top profile-report {{$cardType}}" src="{{ asset('img/bug.png') }}" alt=""
            data-report-id="{{ $id }}">
    </div>
    <div class="card-body">
        <h4 class="report-title">{{ $title }}</h4>
        <span class="report-desc">
            {{ $description }}
        </span>
        <div class="report-info">
            <div>
                <span class="report-user">
                    Reportado por:
                </span>
                <a href="{{route('site.profile.profile')}}" class="nav-link report-user-name">{{ $user }}</a>
            </div>
            <span class="report-severity">{{ $severity }}<span class="severity-icon"></span></span>
        </div>
    </div>
</div>
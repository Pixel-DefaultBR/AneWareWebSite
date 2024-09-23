@include('templates.sidebar')

<div class="main-layout-container">
    <div class="container">
        @include('templates.header')
        @foreach ($reports as $report)
            <div class="card">
                <div class="card-header">
                    <div class="report-card-header">
                        <span>{{$report->client}}</span>
                        <img src="{{  asset('storage/img/' . ($report->image ?? 'default.jpg'))}}" class="client-img"
                            alt="">
                    </div>
                    <span>
                        {{$report->title}}
                    </span>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <p class="card-text">Reportado por: -
                            <a href="#" class="researcher">{{$report->researcher}}</a>
                        </p>
                        <p class="card-text severity">
                            {{$report->severity}}
                        </p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-muted">
                            <span class="status">{{$report->status}}</span>
                        </div>
                        <small class=" text-muted">{{$report->created_at}}</small>
                    </div>
                </div>
            </div>
        @endforeach

    </div>


    @include('templates.footer')
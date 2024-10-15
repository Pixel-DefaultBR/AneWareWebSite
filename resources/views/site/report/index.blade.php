@extends('master')
@section('content')

<section class="report-wrapper">
    <form action="" method="post" class="report-filter-wrapper">
        <label for="report-filter">Pesquisar</label>
        <div class="report-filter-input-wrapper">
            <input type="text" class="form-control report-input" name="report-filter"
                placeholder="Titulo, equisador, vulnerabilidade">
            <input type="submit" class="btn btn-report-filter" value="Filtrar">
        </div>
    </form>

    <div class="show-report-wrapper">
        @foreach ($reports as $report)
            <x-report-card :id="0" :cardType="'card-report'" :title="$report->title" :description="$report->description"
                :user="$report->user" :severity="$report->severity" />
        @endforeach
    </div>
    <div class="paginate">
        {{$reports->links()}}
    </div>
</section>
@endsection
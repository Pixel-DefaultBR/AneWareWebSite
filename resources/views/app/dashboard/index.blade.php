@extends('master')
@section('content')

@if(auth()->check())

    <div class="container mt-4">
        <a href="{{route('app.dashboard.create')}}" class="btn btn-light mb-3">ADD
            Relatório+</a>

        <table class="table table-striped">
            @if (count($reports) > 0)
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Pesquisador</th>
                        <th scope="col">Vulnerabilidade</th>
                        <th scope="col">Gravidade</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reports as $report)
                        <tr>
                            <th scope="row">{{$report->id}}</th>
                            <td>{{$report->client}}</td>
                            <td>{{$report->researcher}}</td>
                            <td>{{$report->vulnerability_type}}</td>
                            <td>{{$report->severity}}</td>
                            <td>{{$report->status}}</td>

                            <td>
                                <div class="btn-group" role="group">
                                    <a href="#" class="text-body-secondary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{route('app.dashboard.edit', $report->id)}}" class="text-body-secondary">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{route('site.report.destroy')}}" method="post" style="">
                                        @csrf
                                        <input type="hidden" value="{{$report->id}}" name="id">
                                        <button type="submit" class="text-body-secondary" style="border:none;"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @else
                <div class="card">
                    <div class="card-header">
                        Ops.
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">(x_x)</h5>
                        <p class="card-text">Nenhum relatório encontrado.</p>
                        <a href="#" class="btn btn-dark">Adicionar</a>
                    </div>
                </div>
            @endif
        </table>
    </div>
@else
    <span>Nao ta logado nao mano</span>
@endif


@endsection
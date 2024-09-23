@include('templates.sidebar')

<div class="container mt-4">

    <form action="{{route('site.report.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="client" class="form-label">Cliente</label>
            <input type="text" class="form-control" id="client" name="client" aria-describedby="clientHelp" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp" required>
        </div>
        <div class="mb-3">
            <label for="researcher" class="form-label">Pesquisador</label>
            <input type="text" class="form-control" id="researcher" name="researcher" required>
        </div>
        <div class="mb-3">
            <label for="vulnerability_type" class="form-label">Tipo de Vulnerabilidade</label>
            <input type="text" class="form-control" id="vulnerability_type" name="vulnerability_type" required>
        </div>
        <div class="mb-3">
            <label for="severity" class="form-label">Gravidade</label>
            <select class="form-select" id="severity" name="severity" required>
                <option value="Crítico">Crítico</option>
                <option value="Alto">Alto</option>
                <option value="Médio">Médio</option>
                <option value="Baixo">Baixo</option>
                <option value="Informativo">Informativo</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Status</label>
            <select class="form-select" name="status" aria-label="Default select example">
                <option value="Resolvido">Resolvido</option>
                <option value="Pendente">Pendente</option>
                <option value="Informativo">Informativo</option>
                <option value="Não resolvido">Não resolvido</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Imagem (URL)</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-dark">Adicionar Relatório</button>
    </form>
</div>

@include('templates.footer')
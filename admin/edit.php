<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/report_process.php";

$reportProcess = new ReportProcess();
$report = $reportProcess->getById();

?>

<div class="container">
    <?php if (count($report) > 0): ?>
        <form action="<?= $baseUrl ?>/report_process.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Cliente</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="client" aria-describedby="emailHelp"
                    value="<?= $report["client"] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Titulo</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp"
                    value="<?= $report["title"] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Pesquisador</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="researcher"
                    value="<?= $report["researcher"] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Vulnerabilidade</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="vulnerability_type"
                    value="<?= $report["vulnerability_type"] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Gravidade</label>
                <select class="form-select" name="severity" aria-label="Default select example">
                    <option value="<?= $report["severity"] ?>"><?= $report["severity"] ?></option>
                    <option value="Critico">Critico</option>
                    <option value="Alto">Alto</option>
                    <option value="Medio">Medio</option>
                    <option value="Baixo">Baixo</option>
                    <option value="Informativo">Informativo</option>
                </select>

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Descricao</label>
                <textarea name="description" class="form-control"
                    value="<?= $report["description"] ?>"><?= $report["description"] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Status</label>
                <select class="form-select" name="status" aria-label="Default select example">
                    <option value="<?= $report["status"] ?>"><?= $report["status"] ?></option>
                    <option value="Resolvido">Resolvido</option>
                    <option value="Pendente">Pendente</option>
                    <option value="Informativo">Informativo</option>
                    <option value="Não resolvido">Não resolvido</option>
                </select>

            </div>
            <input type="hidden" name="type" value="update">
            <input type="hidden" name="id" value="<?= $report["id"] ?>">

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    <?php else: ?>
        <div class="card">
            <div class="card-header">
                Ops.
            </div>
            <div class="card-body">
                <h5 class="card-title">(x_x)</h5>
                <p class="card-text">Nenhum relatorio encontrado.</p>
                <a href="#" class="btn btn-primary">Adicionar</a>
            </div>
        </div>
    <?php endif ?>
</div>

<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/templates/footer.php" ?>
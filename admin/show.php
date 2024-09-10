<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/report_process.php";

$reportProcess = new ReportProcess();
$report = $reportProcess->getById();
?>

<div class="container">
    <?php if ($report): ?>
        <div class="card" id="show-card">
            <div class="card-header">
                <?= $report["title"] ?>
            </div>
            <div class="card-body">
                <h5 class="card-title">Reportado por: <?= $report["researcher"] ?></h5>
                <p class="card-text"> <?php $report["description"] ?></p>
                <a href="<?= $$baseUrl ?>/admin/dashboard.php" class="btn btn-primary">Voltar</a>
            </div>
        </div>

        
    <?php else: ?>
        <div class="card" id="show-card">
            <div class="card-header">
                Ops (X-x)
            </div>
            <div class="card-body">
                <h5 class="card-title">Nenhum relatorio encontrado.</h5>
                <p class="card-text"> Tente novamente mais tarde</p>
                <a href="<?= $baseUrl ?>/admin/dashboard.php" class="btn btn-primary">Voltar</a>
            </div>
        <?php endif ?>
    </div>

    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "/templates/footer.php" ?>
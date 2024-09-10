<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php";

$reportDao = new ReportDAO($conn, $baseUrl);
$reports = $reportDao->getAllReports();
?>

<div class="container">
    <div class="row">
        <?php if (count($reports) > 0): ?>
            <?php foreach ($reports as $report): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="vulnerability-header d-flex justify-content-between">
                                <h5 class="card-title"><?php echo outputSantizer($report["client"]); ?></h5>
                                <span class="badge text-dark justify-content-center align-items-center">
                                    <?= $report["severity"] ?> /
                                    <?= $report["status"] ?>
                                </span>
                            </div>
                            <h6><?php echo outputSantizer($report["title"]); ?></h6>
                            <p class="card-text">Reportado por:
                                <span class="reporter"><?php echo outputSantizer($report["researcher"]); ?></span>
                            </p>
                            <p class="card-text">
                                Tipo de vulnerabilidade: <?php echo outputSantizer($report["vulnerability_type"]); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Ops.
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">(x_x)</h5>
                        <p class="card-text">Nenhum relatório encontrado.</p>
                        <a href="#" class="btn btn-primary">Adicionar</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/templates/footer.php" ?>
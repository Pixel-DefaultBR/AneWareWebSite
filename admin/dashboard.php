<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php";

$reportDao = new ReportDAO($conn, $baseUrl);
$reports = $reportDao->getAllReports();
?>

<div class="container mt-4">
    <a href="<?= $baseUrl ?>/admin/create.php" class="btn btn-primary mb-3">ADD Relatório+</a>

    <table class="table table-striped">
        <?php if (count($reports) > 0): ?>
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
                <?php foreach ($reports as $report): ?>
                    <tr>
                        <th scope="row"><?= htmlspecialchars($report["id"]) ?></th>
                        <td><?= htmlspecialchars($report["client"]) ?></td>
                        <td><?= htmlspecialchars($report["researcher"]) ?></td>
                        <td><?= htmlspecialchars($report["vulnerability_type"]) ?></td>
                        <td><?= htmlspecialchars($report["severity"]) ?></td>
                        <td><?= htmlspecialchars($report["status"]) ?></td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="<?= $baseUrl ?>/admin/show.php?id=<?= urlencode($report["id"]) ?>"
                                    class="btn btn-info btn-sm">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="<?= $baseUrl ?>/admin/edit.php?id=<?= urlencode($report["id"]) ?>"
                                    class="btn btn-warning btn-sm">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="<?= $baseUrl ?>/report_process.php" method="post" style="display:inline;">
                                    <input type="hidden" name="type" value="delete">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($report["id"]) ?>">
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        <?php else: ?>
            <div class="card">
                <div class="card-header">
                    Ops.
                </div>
                <div class="card-body">
                    <h5 class="card-title">(x_x)</h5>
                    <p class="card-text">Nenhum relatório encontrado.</p>
                    <a href="<?= $baseUrl ?>admin/create.php" class="btn btn-primary">Adicionar</a>
                </div>
            </div>
        <?php endif; ?>
    </table>
</div>

<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/templates/footer.php"; ?>
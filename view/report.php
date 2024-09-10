<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php" ?>
<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/config/getById.php"; ?>


<div class="container">
    <?php if ($items): ?>
        <div class="card" id="show-card">
            <div class="card-header">
                <?php echo outputSantizer($items["title"]) ?>
            </div>
            <div class="card-body">
                <h5 class="card-title">Reportado por: <?php echo outputSantizer($items["user"]) ?></h5>
                <p class="card-text"> <?php echo outputSantizer($items["description"]) ?></p>
                <a href="<?= $BASE_URL ?>view/reports.php" class="btn btn-primary">Voltar</a>
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
                <a href="<?= $BASE_URL ?>view/reports.php" class="btn btn-primary">Voltar</a>
            </div>
        <?php endif ?>
    </div>

    <?php include_once $_SERVER["DOCUMENT_ROOT"] . "../templates/footer.php" ?>
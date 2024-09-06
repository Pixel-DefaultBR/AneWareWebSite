<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/Blog/templates/header.php" ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/Blog/config/getAll.php"; ?>

<main class="wrapper">
    <div class="container">
        <?php if (count($items) > 0): ?>
            <?php foreach ($items as $item): ?>
                <div class="card" id="report-card">
                    <div class="card-body" id="report-card-body">
                        <p class="card-text" id="report-card-text">
                        <div class="like-container">
                            <p><?php echo userInputSantizer($item['likes']); ?></p>
                        </div>
                        <div class="text-container">
                            <div class="vulnerability-header">
                                <p><?php echo userInputSantizer($item['sistema_afetado']); ?></p>
                                <p><?php echo userInputSantizer($item['gravidade']); ?> /
                                    <?php echo userInputSantizer($item['estado']); ?></p>

                            </div>
                            <div class="vulnerability-body">
                                <p class="report-title"><?php echo userInputSantizer($item['titulo']); ?></>

                            </div>
                            <div class="vulnerabilty-details">
                                <p>Reportado por: <span
                                        class="reporter"><?php echo userInputSantizer($item['usuario']); ?></span></p>
                                <p><?php echo userInputSantizer($item['tipo_vulnerabilidade']); ?></p>
                            </div>
                        </div>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <h1>NADA AQUI!</h1>
        <?php endif; ?>
    </div>
</main>

<?php include_once "./templates/footer.php" ?>
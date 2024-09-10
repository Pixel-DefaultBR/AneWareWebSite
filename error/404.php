<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php"; ?>
<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/utils/url.php"; ?>
<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/utils/getClientInfos.php"; ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>404</h2>
        </div>
        <div class="card-body">

            <h5 class="card-title">Acho que você se perdeu.</h5>
            <p class="card-text">Volte a segurança ou contate algum administrador.</p>
            <span><?= getClientIPAddr() ?></span><br>
            <span>User-Agent: <?= getClientUserAgent() ?></span>
        </div>
    </div>
</div>


<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/templates/footer.php" ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/Blog/templates/header.php"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/Blog/helpers/url.php"; ?>


<main class="wrapper">
    <div class="presentation">
        <div class="h-100 p-5 bg-light border rounded-3">
            <h2>Aneware Security</h2>
            <h4>Protegendo o futuro digital com segurança e inovação</h4>
            <p>Na Aneware Security, somos uma equipe dedicada de especialistas em cibersegurança com anos de experiência
                no mercado. Nossa missão é proteger empresas de todos os tamanhos contra ameaças digitais, utilizando
                práticas avançadas de pentest e auditoria de segurança. Nosso trabalho é identificar vulnerabilidades e
                fortalecer sua infraestrutura de TI</p>
            <a class="btn btn-outline-secondary" href="<?= $BASE_URL ?>reports.php">Saiba mais +</a>
        </div>
    </div>
    <div class="img-presentation">
        <img src="<?= $BASE_URL ?>/imgs/Coding-bro.png" class="img-coding">
    </div>
</main>
<?php include_once "./templates/footer.php" ?>
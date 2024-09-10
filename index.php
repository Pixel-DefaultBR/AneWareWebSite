<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php"; ?>

<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="h-100 p-5 bg-light border rounded-3">
                <h2>Aneware Security</h2>
                <h4>Protegendo o futuro digital com segurança e inovação</h4>
                <p>Na Aneware Security, somos uma equipe dedicada de especialistas em cibersegurança com anos de
                    experiência
                    no mercado. Nossa missão é proteger empresas de todos os tamanhos contra ameaças digitais,
                    utilizando
                    práticas avançadas de pentest e auditoria de segurança. Nosso trabalho é identificar
                    vulnerabilidades e
                    fortalecer sua infraestrutura de TI.</p>
                <a class="btn btn-outline-secondary" href="<?= $baseUrl ?>/view/reports.php">Saiba mais +</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="img-presentation text-center">
                <img src="<?= $baseUrl ?>/img/Coding-bro.png" class="img-coding img-fluid" alt="Coding Image">
            </div>
        </div>
    </div>
</div>


<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/templates/footer.php" ?>
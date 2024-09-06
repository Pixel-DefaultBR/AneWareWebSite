<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/Blog/templates/header.php"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/Blog/helpers/url.php"; ?>

<div class="container">
    <form action="<?= $BASE_URL ?>config/add.php" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Cliente</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="cliente" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Titulo</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="titulo" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Pesquisador</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="pesquisador">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Vulnerabilidade</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="vulnerabilidade">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Gravidade</label>
            <select class="form-select" name="gravidade" aria-label="Default select example">
                <option value="Critico">Critico</option>
                <option value="Alto">Alto</option>
                <option value="Medio">Medio</option>
                <option value="Baixo">Baixo</option>
                <option value="Informativo">Informativo</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Descricao</label>
            <textarea name="descricao" class="form-control"></textarea>
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
        <input type="hidden" name="type" value="create">

        <button type="submit" class="btn btn-primary">Add +</button>
    </form>
</div>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/Blog/templates/footer.php" ?>
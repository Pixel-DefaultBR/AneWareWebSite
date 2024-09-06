<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/Blog/templates/header.php"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/Blog/helpers/url.php"; ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/Blog/config/getById.php"; ?>

<div class="container">
    <form action="<?= $BASE_URL ?>config/edit.php" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Cliente</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="cliente" aria-describedby="emailHelp"
                value="<?= $items['sistema_afetado'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Titulo</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="titulo" aria-describedby="emailHelp"
                value="<?= $items['titulo'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Pesquisador</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="pesquisador"
                value="<?= $items['usuario'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Vulnerabilidade</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="vulnerabilidade"
                value="<?= $items['tipo_vulnerabilidade'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Gravidade</label>
            <select class="form-select" name="gravidade" aria-label="Default select example">
                <option value="<?= $items['gravidade'] ?>"><?= $items['gravidade'] ?></option>
                <option value="Critico">Critico</option>
                <option value="Alto">Alto</option>
                <option value="Medio">Medio</option>
                <option value="Baixo">Baixo</option>
                <option value="Informativo">Informativo</option>
            </select>

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Descricao</label>
            <textarea name="descricao" class="form-control"
                value="<?= $items['descricao'] ?>"><?= $items['descricao'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Status</label>
            <select class="form-select" name="status" aria-label="Default select example">
                <option value="<?= $items['estado'] ?>"><?= $items['estado'] ?></option>
                <option value="Resolvido">Resolvido</option>
                <option value="Pendente">Pendente</option>
                <option value="Informativo">Informativo</option>
                <option value="Não resolvido">Não resolvido</option>
            </select>

        </div>
        <input type="hidden" name="type" value="update">
        <input type="hidden" name="id" value="<?= $items['id']?>">

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/Blog/templates/footer.php" ?>
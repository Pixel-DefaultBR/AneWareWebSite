<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/Blog/templates/header.php" ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . "/Blog/config/getAll.php"; ?>

<div class="container">
    <a href="<?= $BASE_URL ?>admin/create.php">ADD relatorio+</a>
    <table class="table">
        <?php if (count($items) > 0): ?>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Pesquisador</th>
                    <th scope="col">Vulnerabilidade</th>
                    <th scope="col">Gravidade</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <th scope="row"><?php echo userInputSantizer($item['id']); ?></th>
                        <td><?php echo userInputSantizer($item['sistema_afetado']); ?></td>
                        <td><?php echo userInputSantizer($item['usuario']); ?></td>
                        <td><?php echo userInputSantizer($item['tipo_vulnerabilidade']); ?></td>
                        <td><?php echo userInputSantizer($item['gravidade']); ?></td>
                        <td><?php echo userInputSantizer($item['estado']); ?></td>
                        <td>
                            <div class="action">
                                <a href="<?= $BASE_URL ?>admin/show.php?id=<?= $item['id'] ?>">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="<?= $BASE_URL ?>admin/edit.php?id=<?= $item['id'] ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="<?= $BASE_URL ?>config/del.php" method="post">
                                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                    <button class="dashboard-item" type="submit" style="border: none"><i
                                            class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        <?php else: ?>
            <h1>NADA AQUI!</h1>
        <?php endif; ?>
    </table>


</div>


<?php include_once "../templates/footer.php" ?>
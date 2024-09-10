<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php" ?>

<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">
                                <div class="text-center">
                                    <h4 class="mt-1 mb-5 pb-1">Entre</h4>
                                </div>
                                <form action="<?= $baseUrl ?>/auth_process.php" method="post">
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form2Example11">Email</label>
                                        <input type="email" id="form2Example11" class="form-control" name="email"
                                            required />
                                    </div>
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="form2Example22" name="password">Password</label>
                                        <input type="password" id="form2Example22" class="form-control" name="password" />
                                    </div>
                                    <div class="text-center row pt-1 mb-5 pb-1">
                                        <button data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-primary btn-block" type="submit">Login</button>
                                    </div>
                                    <input type="hidden" name="type" value="login">
                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center justify-content-center gradient-custom-2 row">
                            <div class="px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4">Ou junte-se a nós</h4>
                                <form action="<?= $baseUrl ?>/auth_process.php" method="post">
                                    <div class="mb-3">
                                        <label for="registerName" class="form-label">Nome de usuario:</label>
                                        <input type="text" class="form-control" id="registerName" name="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="registerLastname" class="form-label">Sobrenome (opcional)</label>
                                        <input type="text" class="form-control" id="registerLastname" name="lastname">
                                    </div>
                                    <div class="mb-3">
                                        <label for="registerEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="registerEmail" name="email"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="registerPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="registerPassword"
                                            name="password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirmPassword" class="form-label">Confirme sua senha</label>
                                        <input type="password" class="form-control" id="confirmPassword"
                                            name="confirm-password" required>
                                    </div>
                                    <input type="hidden" name="type" value="register">
                                    <div class="row">
                                        <button type="submit" class="btn btn-primary">Criar conta</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- REGISTER
 
<div class="register-field">
   
</div>
</div>-->


<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/templates/footer.php" ?>
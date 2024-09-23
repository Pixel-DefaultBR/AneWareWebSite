@include('templates.sidebar');

<div class="container py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
            <div class="card rounded-3 text-black">
                <div class="row g-0">
                    <div class="col-lg-6">
                        <div class="card-body p-md-5 mx-md-4">
                            <div class="text-center">
                                <h4 class="mt-1 mb-5 pb-1">Entre</h4>
                            </div>

                            <form action="{{route('app.auth.login')}}" method="post">
                                @csrf
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="form2Example11">Email</label>
                                    <input type="email" id="form2Example11" class="form-control" name="email"
                                        required value="" />
                                </div>
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="form2Example22" name="password">Password</label>
                                    <input type="password" id="form2Example22" class="form-control" name="password"  value=""/>
                                </div>
                                <div class="text-center row pt-1 mb-5 pb-1">
                                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-secondary btn-block"
                                        type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div style="height: 100vh; width: 20px; display:flex; justify-content:center; align-items:center;">
                        <span style="font-size: 20px; font-weight: 600;">Ou</span>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center justify-content-center gradient-custom-2 row">
                        <div class="px-3 py-4 p-md-5 mx-md-4">
                            <h4 class="mb-4">Junte-se a nós</h4>
                            <form action="{{route('app.auth.register')}}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="registerName" class="form-label">Nome de usuario:</label>
                                    <input type="text" class="form-control" id="registerName" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="registerEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="registerEmail" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="registerPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="registerPassword" name="password"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Confirme sua senha</label>
                                    <input type="password" class="form-control" id="confirmPassword"
                                        name="confirm-password" required>
                                </div>
                                <div class="row">
                                    <button type="submit" class="btn btn-secondary">Criar conta</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- REGISTER
 
<div class="register-field">
   
</div>
</div>-->

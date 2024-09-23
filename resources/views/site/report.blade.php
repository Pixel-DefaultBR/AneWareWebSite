@include('templates.sidebar')

<div class="main-layout-container">
    <div class="container py-4">
        @include('templates.header')
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-header d-flex justify-content-between">
                                <span>sony<br>xss no tanto faz</span>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <p class="card-text">Reportado por: -
                                        <a href="#" class="researcher">pesquisador</a>
                                    </p>
                                    <p class="card-text severity">
                                        critico
                                    </p>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <div class="text-muted">
                                        <span class="marker">
                                        </span>
                                        <span class="status">Resolvido</span>
                                    </div>
                                    <small class=" text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('templates.footer')
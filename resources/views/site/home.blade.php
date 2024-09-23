@section('content')
    @include('templates.sidebar') <!-- Inclui o arquivo sidebar.blade.php -->
    {{-- @include('templates.header') --}}

    <div class="main-layout-container">
        <div class="home-page">
            <div class="container landing">
                <div class="position-relative p-3 text-center text-muted bg-body border-0 border-dashed rounded-2 apear-card">
                    <h1 class="text-body-emphasis">Aneware Security</h1>
                    <p class="col-lg-6 mx-auto mb-4">
                        A Aneware Security é uma empresa inovadora no setor de segurança da informação, oferecendo serviços especializados em proteção cibernética, auditoria de sistemas e testes de penetração. Nosso objetivo é garantir a segurança dos seus dados e sistemas contra ameaças digitais.
                    </p>
                    <button class="btn btn-secondary px-5 mb-5" type="button">
                        Saiba mais
                    </button>
                </div>
                <div class="blocks">
                    <div class="card apear-card border-0" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Serviços Personalizados</h5>
                            <p class="card-text">Nossos serviços são customizados para atender as necessidades específicas de cada cliente, garantindo a máxima proteção e eficiência.</p>
                            <a href="#" class="btn btn-secondary">Ver serviços</a>
                        </div>
                    </div>
                    <div class="card apear-card border-0" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Consultoria de Segurança</h5>
                            <p class="card-text">Oferecemos consultoria especializada em segurança da informação para proteger sua empresa contra as mais diversas ameaças.</p>
                            <a href="#" class="btn btn-secondary">Saiba mais</a>
                        </div>
                    </div>
                    <div class="card apear-card border-0" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Auditoria e Pentest</h5>
                            <p class="card-text">Realizamos auditorias de segurança e testes de penetração completos para identificar vulnerabilidades e aumentar a segurança dos sistemas.</p>
                            <a href="#" class="btn btn-secondary">Solicitar auditoria</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="landing-image-container">
                <img class="landing-image" src="{{asset('img/home.png')}}" alt="Aneware Security">
            </div>

        </div>

        @include('templates.footer')



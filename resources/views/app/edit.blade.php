@extends('master')
@section('content')

@if ($errors->any())
    <script>
        @foreach ($errors->all() as $error)
            $(document).ready(function () {
                Swal.fire({
                    title: "Ops..",
                    icon: "error",
                    timer: 2000,
                    html: '{{ $error }}',
                    timerProgressBar: true
                });
            });
        @endforeach
    </script>
@endif

<div class="container-xl px-4">
    <hr class="mt-0 mb-4">
    <form class="row" action="{{route('app.update')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Imagem de perfil</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <div class="edit-profile-image-container">
                        <img class="img-account-profile rounded-circle mb-2"
                            style="max-width: 100px; height:100px; object-fit: cover;" id="image-preview" src="" alt="">
                    </div>
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                    <input type="file" class="form-control" id="file-input" name="image">
                </div>
            </div>
            <div class="card mb-4 mb-lg-0">
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush rounded-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fas fa-globe fa-lg text-warning"></i>
                            <input class="ml-0 form-control" style="width: 80%;" name="website"
                                value="{{$user->website}}">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fab fa-github fa-lg text-body"></i>
                            <input class="mb-0 form-control" style="width: 80%;" name="github"
                                value="{{$user->github}}">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                            <input class="mb-0 form-control" style="width: 80%;" name="twitter"
                                value="{{$user->twitter}}">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                            <input class="mb-0 form-control" style="width: 80%;" name="instagram"
                                value="{{$user->instagram}}">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                            <input class="mb-0 form-control" style="width: 80%;" name="facebook"
                                value="{{$user->facebook}}">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Detalhes da conta</div>
                <div class="card-body">
                    <!-- Form Row-->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (first name)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputFirstName">Nome de usuario</label>
                            <input class="form-control" id="inputFirstName" type="text" placeholder="" name="name"
                                value="{{$user->name}}">
                        </div>
                    </div>
                    <!-- Form Group (bio)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputEmailAddress">README.md</label>
                        <textarea class="form-control" name="description" id="" placeholder="Fale Sobre você"
                            style="height: 50vh; resize: none">{{$user->description}}</textarea>
                    </div>
                    <!-- Save changes button-->
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <button class="btn btn-dark" type="submit">Salvar
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>


@endsection
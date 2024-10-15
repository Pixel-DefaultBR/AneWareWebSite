@if(session('error'))
    <div class="card message-card">
        <div class="card-body card-error">
            <span> <i class="fa-solid fa-x"></i>{{session('error')}}</span>
        </div>
    </div>

@elseif(session('success'))
    <div class="card message-card">
        <div class="card-body card-success">
            <span> <i class="fa-solid fa-check"></i>{{session('success')}}</span>
        </div>
    </div>

@elseif($errors->any())
    @foreach ($errors->all() as $error)
        <div class="card message-card">
            <div class="card-body card-success">
                <span> <i class="fa-solid fa-bug"></i>{{$error}}</span>
            </div>
        </div>
    @endforeach
@endif
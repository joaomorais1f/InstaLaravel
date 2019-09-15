@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row ">
        <div class="col-lg-5 offset-lg-2 col-xl-4 offset-xl-4 welcome-left d-flex align-items-center justify-content-center align-self-center">

            <form method="POST" enctype="multipart/form-data" class="card p-5 m-auto" action="{{route ('data_user')}}">
                @csrf
                <div class="img-fluid">
                    <img class="rounded mx-auto d-block icons" src="{{ url('images/logo.png')}}">
                    <h3 class="ml-2 text-center">LaraInsta</h3>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="nome">Nome</label>
                        <input name="name" value="{{$users->name}}" placeholder="Nome" id="nome" type="text" class="form-control" required="" autofocus="">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="email">Email</label>
                        <input value="{{$users->email}}" placeholder="Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required="" autofocus="">

                        @if ($errors->has('email'))

                        <span class="invalid-feedback" role="alert">

                            <strong>{{ $errors->first('email') }}</strong>

                        </span>

                        @endif
                    </div>
                    <div class="form-group col-lg-5 offset-lg-2 col-xl-4 offset-xl-4 welcome-left d-flex align-items-center justify-content-center align-self-center">
                        <label for="avatar_path"><img class="rounded mx-auto d-block icons" src="{{asset('images/user.svg')}}">
                            <figcaption>Foto Perfl</figcaption>
                        </label>
                        <input type="file" name="avatar_path" id="avatar_path">
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-success">Alterar Dados</button>
                <br>
                <a class="btn btn-outline-danger" href="/account/delete/{{$users->id}}"> Excluir Conta </a>
            </form>

        </div>
    </div>



</div>
<div class="p-5">
    <a href="{{ url('/') }}"><img class="float button add circle p-3" src="{{ url('images/back.svg')}}" width="50" height="50"></a>
</div>
@endsection
</body>

</html>
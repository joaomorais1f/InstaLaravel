@extends('layouts.app')


@section('content')
<div class="container m-5">
    <div class="row ">
        <div class="col-lg-5 offset-lg-2 col-xl-4 offset-xl-4 welcome-left d-flex align-items-center justify-content-center align-self-center">

            <form method="POST" class="card p-5 m-auto" action="{{route ('login')}}">
                @csrf
                <div class="img-fluid">
                    <img class="offset-lg-2 col-xl-4 offset-xl-4 welcome-left d-flex align-items-center justify-content-center align-self-center " src="{{ url('images/logo.png')}}" width="50" height="50">
                    <h3 class="ml-2 text-center">LaraInsta</h3>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="email">Email</label>
                        <input placeholder="Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required="" autofocus="">

                        @if ($errors->has('email'))

                        <span class="invalid-feedback" role="alert">

                            <strong>{{ $errors->first('email') }}</strong>

                        </span>

                        @endif
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputPassword4">Senha</label>
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required="" id="inputPassword4" placeholder="Senha">

                        @if ($errors->has('password'))

                        <span class="invalid-feedback" role="alert">

                            <strong>{{ $errors->first('password') }}</strong>

                        </span>

                        @endif
                    </div>
                </div>
                <center><button type="submit" class="btn btn-outline-success">Entrar</button></center>
                <p class="pt-4">Não possui uma conta? <a href="{{route('register')}}" class="links"><strong>Registre-se</strong></a></p>
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
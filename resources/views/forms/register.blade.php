<div class="register-holder">

    <div class="row">

        <div class="{{ $clases }} bg-white border text-center mt-2 pr-5 pl-5 pt-2 pb-0 card">



            <div class="img-fluid">
                <center><img src="{{ url('images/logo.png')}}" width="50" height="50">
                    <h3 class="ml-2">LaraInsta</h3>
                </center>
            </div>

            <h4> Registre para compartilhar fotos </h4>


            <form method="POST" action="{{ route('register') }}">

                {{ csrf_field() }}


                <div class="form-group row">


                    <div class="col-md-12">

                        <input placeholder="Nome" id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required="" autofocus="">


                        @if ($errors->has('name'))

                        <span class="invalid-feedback" role="alert">

                            <strong>{{ $errors->first('name') }}</strong>

                        </span>

                        @endif

                    </div>

                </div>


                <div class="form-group row">


                    <div class="col-md-12">

                        <input placeholder="Email" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required="">


                        @if ($errors->has('email'))

                        <span class="invalid-feedback" role="alert">

                            <strong>{{ $errors->first('email') }}</strong>

                        </span>

                        @endif

                    </div>

                </div>


                <div class="form-group row">


                    <div class="col-md-12">

                        <input placeholder="Senha" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required="">


                        @if ($errors->has('password'))

                        <span class="invalid-feedback" role="alert">

                            <strong>{{ $errors->first('password') }}</strong>

                        </span>

                        @endif

                    </div>

                </div>


                <div class="form-group row">




                    <div class="col-md-12">

                        <input placeholder="Confirme a senha" id="password-confirm" type="password" class="form-control" name="password_confirmation" required="">

                    </div>

                </div>


                <div class="form-group row">

                    <div class="col-md-12">

                        <button type="submit" class="btn btn-outline-success">

                            Registrar

                        </button>

                    </div>

                </div>
                <div class="mt-2 mb-3">

                    <button type="" class="btn btn-outline-primary">

                        Entre com Facebook

                    </button>

                </div>


                <div class="form-group row">

                    <div class="col-md-12">

                        <span>
                            Ao se registrar, você aceita nossas Condições, a Política de Dados e a Política de Cookies.
                        </span>
                        <p class="pt-4">Já possui uma conta? <a class="links" href="{{route ('login')}}"><strong>Login</strong></a></p>
                    </div>

                </div>

            </form>
        </div>
    </div>





</div>
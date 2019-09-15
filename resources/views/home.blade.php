@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bem-vindo!</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <p> Caso queira ver as publicações, <a href="{{route ('publications')}}">clique aqui</a> </p>
                    <p> Para realizar uma publicação, clique no botão abaixo: </p>
                    <a href="{{route ('publication')}}" class="btn btn-outline-success"> Publicar </a>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
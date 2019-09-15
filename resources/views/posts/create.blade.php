@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row ">
        <div class="col-lg-5 offset-lg-2 col-xl-4 offset-xl-4 welcome-left d-flex align-items-center justify-content-center align-self-center ">

            <form class="card p-5 m-auto" enctype="multipart/form-data" method="POST" action="{{ route('publish')}}">
                @csrf
                <div class="img-fluid">
                    <img src="{{ url('images/logo.png')}}" class="offset-lg-2 col-xl-4 offset-xl-4 welcome-left d-flex align-items-center justify-content-center align-self-center" width="50" height="50">
                    <h3 class="ml-2 text-center">LaraInsta</h3>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">

                        <input type="hidden" class="form-control" id="filter" placeholder="Filter" value="nada">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="description">Legenda</label>
                        <textarea class="form-control" name="description" id="description" placeholder="Legenda da foto" rows="3"> </textarea>
                    </div>
                    <div class="form-group col-md-12  offset-lg-2 col-xl-4 offset-xl-4 welcome-left d-flex align-items-center justify-content-center align-self-center">
                        <label class="" for="image_path"><img class="icons" src="{{asset('images/upload-button.svg')}}">
                            <figcaption></figcaption>
                        </label>
                        <input type="file" name="image_path" id="image_path">
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-success">Publicar</button>
                <p> </p>
                <p> </p>
                <p> </p>
            </form>
        </div>
    </div>



</div>
<div class="p-5">
    <a href="{{ route('publications') }}"><img class="float button add circle p-3" src="{{ url('images/back.svg')}}" width="50" height="50"></a>
</div>
@endsection
</body>

</html>
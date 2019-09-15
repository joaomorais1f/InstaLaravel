@extends('layouts.app')


@section('content')

<div class="container">
  <a href="{{route('publication')}}" class="btn btn-outline-success btn-lg active m-9" role="button" aria-pressed="true">Publicar</a>
</div>

<div class="container" style="width:900px;height:700px">

  <div class="row justify-content-center">

    <div class="col-md-8">
      @if (count($posts) > 0)
      @foreach ($posts as $post)
      <div class="card mt-4">

        <div class="publicacao">
          <img class="card-img-top" src="{{$post->image_path}}" alt="imagem_publicada">
          @if ($post->user_id == Auth()->id())
          <a href="/posts/delete/{{$post->id}}"> <img src="{{ url('images/delete.svg')}}" id="delete" class="icons" alt="deletar_publicacao"> </a>
          @endif
        </div>

        <div class="hearts m-2">

          @if ($post->person_like == Auth()->user()->id)
          <a href="/deslike/{{$post->id}}"><img src="{{ asset('images/like.svg') }}" class="like"> </a>
          <img class="ballon" src="{{asset ('images/comment-balloon.svg')}}">
          @else
          <a href="/like/{{$post->id}}"> <img src="{{ asset('images/white-heart.svg') }}" class="deslike"> </a>
          <img class="ballon" src="{{asset ('images/comment-balloon.svg')}}">
          @endif

        </div>
        <strong> <span class="curtidas p-3">

            @if ($post->likes < 1) Seja o Primeiro a Curtir @elseif ($post->likes == 1)
              1 Curtida
              @else
              Curtido por {{ Auth::user()->name }} e outras
              {{$post->likes - 1}}
              @if (($post->likes - 1) > 1)
              pessoas
              @else
              pessoa
              @endif
              @endif

          </span> </strong>
        @foreach ($users as $user)
        @if ($post->user_id == $user->id)
        <div class="card-body">
          <span class="legenda">
            <strong><?php $nome = $user->name;
                    echo ucfirst($nome); ?> </strong>{{$post->description}}
          </span>
          @endif
          @endforeach
          @if (count($comments) > 0)
          @foreach ($comments as $comment)
          @if ($comment->post_id == $post->id)
          <div class="media">
            @foreach ($users as $user)
            @if (($comment->user_id == $user->id))
            @if ($user->avatar_path != null)
            <img class="rounded-circle img-user" src="/storage/{{$user->avatar_path}}" alt="foto de perfil">
            @else
            <img class="rounded-circle img-user" src="{{asset ('images/user.svg')}}" alt="foto de perfil">
            @endif
            @endif
            @endforeach
            <div class="media-body p-2">
              @foreach ($users as $user)
              @if ($comment->user_id == $user->id)
              <div class="format-comments p-2">
                <h5 class="mt-0"><strong> <?php $nome = $user->name;
                                          echo ucfirst($nome); ?></strong> comentou: </h5>
                @endif
                @endforeach
                <div class="comments">
                  @if ($comment->post_id == $post->id)
                  @if (isset($comments))
                  <p>{{$comment->comment}}</p>
                  @endif
                  @endif
                  @if (Auth()->id() == $comment->user_id)
                  <a href="/comment/delete/{{$comment->id}}"> <span class="comment-post"> Deletar comentário </span></a>
                  @endif
                  <hr>
                </div>
              </div>
            </div>
          </div>

          @endif
          @endforeach
          @endif
          <form action="/comment/{{$post->id}}" method="POST">
            <div class="form-row">
              @csrf

              <div class="form-group col-md-10">
                <textarea class="form-control" name="comment" rows="2" placeholder="Comente a publicação"></textarea>
              </div>
              <div class="form-group col-md-2">
                <button class="btn btn-primary p-2" type="submit"> Comentar </button>
              </div>
          </form>

        </div>
      </div>
    </div>

    @endforeach
    @else

    <h2 class="text-center"> Não há publicações, você pode publicar clicando no botão ao lado </h2>
    @endif
  </div>

</div>

@endsection
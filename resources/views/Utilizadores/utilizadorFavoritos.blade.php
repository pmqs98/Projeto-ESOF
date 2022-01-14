@extends('layouts.app')



@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<h3 style="text-align:center"> Os seus anúncios </h3>


<div class="container">
  <div class="row">

    <div class="col-lg-10">
      <div class="header__nav">
        <nav class="header__menu">
          <ul>
            <li><a href="{{url('/dashboard')}}">Anúncios</a></li>
            <li><a href="{{url('/dashboard/favoritos')}}">Favoritos</a></li>
            <li><a href="{{url('/dashboard/mensagens')}}">Mensagens</a></li>
            <li><a href="{{url('/about')}}">Pagamentos</a></li>
            <li><a href="{{url('/dashboard/definicoes')}}">Definições</a></li>
          </ul>
        </nav>

      </div>
    </div>
  </div>

</div>



</div>

<div class="container-fluid">
  <div class="p-3 mb-2 bg-secondary text-white">
    
    <div class="container-fluid">
      
      <div class="row">
        @forelse(App\Http\Controllers\FavoritosController::findAnunciosById(Auth::user()->id) as $favorito)
        <div class="col-12 mt-3">
            @foreach(App\Http\Controllers\AnunciosController::findInfoAboutAnuncio($favorito->id_anuncio) as $anuncio)
          <div class="card">
            <div class="card-horizontal" style="display: flex; flex: 1 1 auto;">
              <div class="img-square-wrapper">
                <img class="" src="/storage/app/anunciosImg/{{$anuncio->id_utilizador}}/{{$anuncio->id_anuncio}}/{{$anuncio->foto_perfil}}" style="width:500px;height:345px;" alt="Card image cap">
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-10 text-dark">
                    <h4 class="card-title text-dark">{{ $anuncio->titulo }}</h4>
                  </div>
                  <div class="col-sm-2 text-dark">
                    Preço: {{ $anuncio->preco }}€
                  </div>
                </div>

                <p class="card-text text-dark small">Ativo desde: {{ $anuncio->created_at }} </p>
                <div class="container">
                  <div class="row">
                    <div class="col-sm-2 text-dark">

                      <a href="/anuncios/show/{{$anuncio->id_anuncio}}" style="color:black;">Visualizar</a>

                    </div>
                    <div class="col-sm-2 text-dark">

                      <a href="/favoritos/remover?id_anuncio={{$anuncio->id_anuncio}}" style="color:black;">Remover Favorito</a>

                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="card-footer">
              <div class="container">
                <div class="row">
                  <div class="col-sm-3 text-dark">

                  </div>
                  
                  
                </div>
              </div>
            </div>
            @endforeach
          </div>
      </div>
      <h5 class="text-center">Não possui favoritos!</h5>
    </div>
    @empty
    @endforelse
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


@endsection
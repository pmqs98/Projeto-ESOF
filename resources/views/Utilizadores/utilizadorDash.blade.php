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
    <nav class="header__menu">
      <ul>
        <li><a href="{{url('/dashboard')}}">Activos</a></li>
        <li><a href="{{url('/arquivos')}}">Arquivados</a></li>
      </ul>
    </nav>

    <div class="container-fluid">
      <a class="btn btn-primary" href="{{ url('/product') }}" role="button">Criar Anuncio</a>
        @forelse(App\Http\Controllers\AnunciosController::findAnunciosById(Auth::user()->id) as $anuncio)
      <div class="row">
        <div class="col-12 mt-3">



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
                      <a href="/anuncios/edit/{{$anuncio->id_anuncio}}" style="color:black;">Editar</a>
                    </div>
                    <div class="col-sm-2 text-dark">
                      <a href="/anuncios/delete?id={{$anuncio->id_anuncio}}" style="color:black;">Arquivar</a>
                    </div>
                    @if($anuncio->destacado==0)
                    <div class="col-sm-2 text-dark">
                      <a href="/stripe-payment?id_anuncio={{$anuncio->id_anuncio}}" style="color:green;">Destacar</a>
                    </div>
                    @endif


                  </div>
                </div>

              </div>
            </div>
            <div class="card-footer">
              <div class="container">
                <div class="row">
                  <div class="col-sm-3 text-dark">

                  </div>
                  <div class="col-sm-2 text-dark">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    @if(App\Http\Controllers\MensagensController::countConversas($anuncio->id_anuncio) > 0 )
                    {{App\Http\Controllers\MensagensController::countConversas($anuncio->id_anuncio)}} Mensagens
                    @else
                    {{'0 Mensagens'}}
                    @endif

                  </div>
                  <div class="col-sm-2 text-dark">
                    <i class="fa fa-heart" aria-hidden="true"></i>
                    @if(App\Http\Controllers\FavoritosController::countFavoritos($anuncio->id_anuncio) > 0 )
                    {{App\Http\Controllers\FavoritosController::countFavoritos($anuncio->id_anuncio)}} Favoritos
                    @else
                    {{'0 Favoritos'}}
                    @endif

                  </div>

                  <div>
                    @if($anuncio->destacado==1)
                    <span class="label success">Anúncio em Destaque</span>
                    @else
                    <span class="label danger">Anúncio Não Destacado</span>
                    @endif
                  </div>



                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @empty
      <h5 class="text-center">Ainda não possui anuncios!</h5>
      @endforelse
    </div>
  </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  <style>
    .label {
      color: white;
      padding: 8px;
      font-family: Arial;
    }

    .success {
      background-color: #4CAF50;
    }

    /* Green */
    .danger {
      background-color: #f44336;
    }

    /* Red */
  </style>
  @endsection
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

    </nav>

    <div class="container-fluid">

      <div class="row">


        <table class="table">
          <tbody>
            <tr>

              <td>Utilizador</td>
              <td>Anuncio</td>
              <td></td>
              <td>Data</td>
            </tr>
          </tbody>
        </table>
        @forelse(App\Http\Controllers\MensagensController::findMensagemId() as $mensagens)
        @if(empty($mensagens))
        <h5 class="text-center">Não existem conversas!</h5>
        @else
        <table class="table">
          <tbody>
            <tr>
              <th scope="row"> <a href="/mensagens/show/{{$mensagens->id_conversa}}">Abrir Conversa</a> </th>

              <td>
                @foreach(App\Http\Controllers\UtilizadoresController::findUserById($mensagens->id_emissor) as $utilizador)
                {{$utilizador->nome}}
                {{$utilizador->apelido}}
                @endforeach


              </td>
              <td> <a href="/anuncios/show/{{$mensagens->id_anuncio}}" target="_blank" style="color:black;">
                  @foreach(App\Http\Controllers\AnunciosController::findAnunciosById($mensagens->id_anuncio) as $anuncio)
                  {{$anuncio->titulo}}
                  @endforeach

                </a></td>

              <td>{{$mensagens->created_at}}</td>
            </tr>
          </tbody>
        </table>
        @endif
        @empty
        <h5 class="text-center">Não existem conversas!</h5>
        @endforelse
      </div>
    </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


    @endsection
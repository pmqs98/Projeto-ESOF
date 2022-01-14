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
                                <li><a href="{{url('/')}}">Activos</a></li>
                                <li><a href="{{url('/cars')}}">Arquivados</a></li>
  </ul>
  </nav>

    <div class="container-fluid">
   
    <div class="row">
     
       <table class="table">
  <thead>
    <tr>
      <th scope="col">Interessado
      @foreach(App\Http\Controllers\UtilizadoresController::findUserById($mensagem->id_emissor) as $utilizador)
        {{$utilizador->nome}}
        {{$utilizador->apelido}}
     @endforeach
      
      </th>
      <th scope="col">Suas Mensagens</th>
      <th scope="col">Eu</th>
      <th scope="col">Suas Mensagens</th>
      <th scope="col">Data</th>
    </tr>
  </thead>
  
  <tbody>
    @foreach(App\Http\Controllers\MensagensController::findMensagensConversa($mensagem->id_conversa) as $conversa)
    
    <tr>
    @if($conversa->id_emissor != Auth::user()->id)
      <td>{{$conversa->texto}}</td>
      <td>{{$conversa->created_at}}</td>
      @else
      <td></td>
      <td></td>
      <td>{{$conversa->id_emissor}}</td>
      <td>{{$conversa->texto}}</td>
      <td>{{$conversa->created_at}}</td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>


    
        
    

 <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
 
  <script>
        // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('75f818b071a2ca8da95a', {
      cluster: 'eu'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
     //document.write();
     
            var str = JSON.stringify(data);
            var parsedJSON = JSON.parse(JSON.stringify(data));

             let tableRef = document.getElementById("my-table");

  // Insert a row at the end of the table
  let newRow = tableRef.insertRow(-1);

  // Insert a cell in the row at index 0
  let newCell = newRow.insertCell(0);
  let newCel = newRow.insertCell(1);
  

  // Append a text node to the cell

  
let newText = document.createTextNode(parsedJSON.texto);
  newCell.appendChild(newText);
  
   let newTex = document.createTextNode(parsedJSON.created_at);
  newCel.appendChild(newTex);
 
  
            // document.getElementById('td1').innerHTML = parsedJSON.text;
      
                
            
     // alert(JSON.stringify(data));
    });
            
        </script>
      


<table id="my-table">
  
</table>
   
      
      
      
      





<form  action="{{ ('/msg') }}" method="POST">
@csrf
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Mensagem:</label>
    <textarea class="form-control" name="texto" id="exampleFormControlTextarea1" rows="3"></textarea>
    
  </div>
  @if($conversa->id_emissor != Auth::user()->id)
  <input type="hidden" id="id_recetor" name="id_recetor" value="{{$conversa->id_emissor}}">
  <input type="hidden" id="id_anuncio" name="id_anuncio" value="{{$conversa->id_anuncio}}">
  @else
  <input type="hidden" id="id_recetor" name="id_recetor" value="{{$conversa->id_recetor}}">
  <input type="hidden" id="id_anuncio" name="id_anuncio" value="{{$conversa->id_anuncio}}">
  @endif
  <button type="submit" class="btn btn-primary mb-2">Enviar</button>
</form>
 
  </div>
</div>   







 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


@endsection
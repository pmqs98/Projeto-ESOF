@extends('layouts.app')

@section('content')

<!-- Car Details Section Begin -->

<section class="car-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="/storage/app/anunciosImg/{{$anuncio->id_utilizador}}/{{$anuncio->id_anuncio}}/{{$anuncio->foto_perfil}}" alt="First slide" style="width:847px;height:535px;">
                        </div>
                        @foreach(App\Http\Controllers\AnunciosController::getImgs("storage/app/anunciosImg/".$anuncio->id_utilizador."/".$anuncio->id_anuncio."/") as $files)
                        @if(strcmp($files->getFilename(),$anuncio->foto_perfil)!=0)
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/storage/app/anunciosImg/{{$anuncio->id_utilizador}}/{{$anuncio->id_anuncio}}/{{ $files->getFilename() }}" style="width:847px;height:535px;">
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="car__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item" style="width: 50%; margin-right: 0px">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" style="text-align: center;">Descrição</a>
                        </li>
                        <li class="nav-item" style="width: 50%;">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" style="text-align: center;">Detalhes técnicos</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="car__details__tab__info">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="car__details__tab__info__item">
                                            <h5>Descrição do anúncio</h5>
                                            <label style="padding-left: 15px;"> {{$anuncio->descricao}} </label>
                                        </div>
                                    </div>
                                    @if( Auth::user()->id != $anuncio->id_utilizador)
                                    <form action="{{ ('/msg') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1" style="padding-left: 15px;padding-top: 15px;">Mensagem:</label>
                                            <textarea class="form-control" name="texto" id="exampleFormControlTextarea1" rows="3" style="margin-left: 15px;"></textarea>

                                        </div>
                                        <input type="hidden" id="id_recetor" name="id_recetor" value="{{$anuncio->id_utilizador}}">
                                        <input type="hidden" id="id_anuncio" name="id_anuncio" value="{{$anuncio->id_anuncio}}">
                                        <button type="submit" class="btn btn-primary mb-2" style="margin-left: 15px;">Enviar</button>
                                    </form>
                                    @else
                                    
                                    @endif
                                    
                                    @if( Auth::user()->id != $anuncio->id_utilizador)
                                    <form action="{{ ('/fav') }}" method="POST">
                                        @csrf
                                        <input type="hidden" id="id_utilizador" name="id_utilizador" value="{{ Auth::user()->id}}">
                                        <input type="hidden" id="id_anuncio" name="id_anuncio" value="{{$anuncio->id_anuncio}}">
                                        <button type="submit" class="btn btn-primary mb-2" style="margin-left: 15px;">Adicionar Favorito</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="car__details__tab__info">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="car__details__tab__info__item">
                                            <h5>Detalhes técnicos sobre o veículo:</h5>
                                            <ul style="columns:2">
                                                @foreach(App\Http\Controllers\MarcasController::findMarcasById($anuncio->id_marca) as $marca)
                                                <li><em class="fa fa-long-arrow-right"></em> Marca: {{$marca->nome}}</li>
                                                @endforeach
                                                @foreach(App\Http\Controllers\ModelosController::findModeloById($anuncio->id_modelo) as $modelo)
                                                <li><em class="fa fa-long-arrow-right"></em> Modelo: {{$modelo->nome}}</li>
                                                @endforeach

                                                <li><em class="fa fa-long-arrow-right"></em> Versao: {{$anuncio->versao}}</li>
                                                <li><em class="fa fa-long-arrow-right"></em> Cor: {{$anuncio->cor}}</li>
                                                <li><em class="fa fa-long-arrow-right"></em> Combustivel: {{$anuncio->combustivel}}</li>
                                                <li><em class="fa fa-long-arrow-right"></em> Data de Registo: {{$anuncio->data_registo}}</li>
                                                <li><em class="fa fa-long-arrow-right"></em> Quilómetros: {{$anuncio->quilometragem}} km</li>
                                                <li><em class="fa fa-long-arrow-right"></em> Cilindrada: {{$anuncio->cilindrada}} cc</li>
                                                <li><em class="fa fa-long-arrow-right"></em> Potência: {{$anuncio->potencia}} cv</li>
                                                @if($anuncio->retoma == 0)
                                                <li><em class="fa fa-long-arrow-right"></em> Retoma: Não </li>
                                                @else
                                                <li><em class="fa fa-long-arrow-right"></em> Retoma: Sim </li>
                                                @endif
                                                @if($anuncio->financiamento == 0)
                                                <li><em class="fa fa-long-arrow-right"></em> Financiamento: Não </li>
                                                @else
                                                <li><em class="fa fa-long-arrow-right"></em> Financiamento: Sim </li>
                                                @endif
                                                <li><em class="fa fa-long-arrow-right"></em> Segmento: {{$anuncio->segmento}} </li>
                                                <li><em class="fa fa-long-arrow-right"></em> Metalizado: {{$anuncio->metalizado}} </li>
                                                <li><em class="fa fa-long-arrow-right"></em> Caixa: {{$anuncio->caixa}} </li>
                                                <li><em class="fa fa-long-arrow-right"></em> Lotação: {{$anuncio->lotacao}} </li>
                                                <li><em class="fa fa-long-arrow-right"></em> Portas: {{$anuncio->portas}} </li>
                                                <li><em class="fa fa-long-arrow-right"></em> Classe Veiculo: {{$anuncio->classe_veiculo}} </li>
                                                <li><em class="fa fa-long-arrow-right"></em> Tração: {{$anuncio->tracao}} </li>
                                                @if($anuncio->garantia_stand == 0)
                                                <li><em class="fa fa-long-arrow-right"></em> Garantia Stand: Não </li>
                                                @else
                                                <li><em class="fa fa-long-arrow-right"></em> Garantia Stand: Sim </li>
                                                @endif
                                                <li><em class="fa fa-long-arrow-right"></em> Número de Registos: {{$anuncio->nr_registos}} </li>
                                                @if($anuncio->livro_revisoes == 0)
                                                <li><em class="fa fa-long-arrow-right"></em> Livro de Revisões: Não </li>
                                                @else
                                                <li><em class="fa fa-long-arrow-right"></em> Livro de Revisões: Sim </li>
                                                @endif
                                                @if($anuncio->seg_chave == 0)
                                                <li><em class="fa fa-long-arrow-right"></em> Segunda-chave: Não </li>
                                                @else
                                                <li><em class="fa fa-long-arrow-right"></em> Segunda-chave: Sim </li>
                                                @endif
                                                @if($anuncio->jantes_liga_leve == 0)
                                                <li><em class="fa fa-long-arrow-right"></em> Jantes Liga Leve: Não </li>
                                                @else
                                                <li><em class="fa fa-long-arrow-right"></em> Jantes Liga Leve: Sim </li>
                                                @endif

                                                <li><em class="fa fa-long-arrow-right"></em> Estofos: {{$anuncio->estofos}} </li>
                                                <li><em class="fa fa-long-arrow-right"></em> Medida Jantes: {{$anuncio->medida_jantes}} </li>
                                                @if($anuncio->airbags == 0)
                                                <li><em class="fa fa-long-arrow-right"></em> Airbags: Não </li>
                                                @else
                                                <li><em class="fa fa-long-arrow-right"></em> Airbags: Sim </li>
                                                @endif
                                                @if($anuncio->ar_condicionado == 0)
                                                <li><em class="fa fa-long-arrow-right"></em> Ar Condicionado: Não </li>
                                                @else
                                                <li><em class="fa fa-long-arrow-right"></em> Ar Condicionado: Sim </li>
                                                @endif
                                                @if($anuncio->importado == 0)
                                                <li><em class="fa fa-long-arrow-right"></em> Origem: Nacional </li>
                                                @else
                                                <li><em class="fa fa-long-arrow-right"></em> Origem: Importado </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="car__details__sidebar">
                    <div class="car__details__sidebar__model">
                        <ul>
                            <li style="font-weight:900; text-align: center">{{$anuncio->titulo}}</li>
                            <li ><i class="fa fa-circle" aria-hidden="true"></i> Data de registo: {{$anuncio->data_registo}} <br>
                                <i class="fa fa-circle" aria-hidden="true"></i> Quilometragem: {{$anuncio->quilometragem}} km <br>
                                <i class="fa fa-circle" aria-hidden="true"></i> Combustível: {{$anuncio->combustivel}}
                            </li>
                        </ul>
                        <ul>
                            <li>Preço: {{$anuncio->preco}} <i class="fa fa-euro" aria-hidden="true"></i> </li>
                        </ul>
                        @foreach(App\Http\Controllers\UtilizadoresController::findUserById($anuncio->id_utilizador) as $utilizador)
                        <div class="car__details__sidebar__payment">
                            <ul>
                                <p> {{$utilizador->tipovendedor}} </p>
                                <li> {{$utilizador->nome}} {{$utilizador->apelido}} <a target="_blank" href="/storage/app/{{$utilizador->foto_perfil}}"><img src="/storage/app/{{$utilizador->foto_perfil}}" class="rounded-circle z-depth-2" style="height: 70px;width: 70px;padding: 5px;margin-left: 40px;" ></a></li>
                            </ul>
                        </div>
                        <div class="car__details__sidebar__payment">
                            <h6><i class="fa fa-map-marker" aria-hidden="true"></i>
                                Localização: </h6>
                            @foreach(App\Http\Controllers\FrequesiasController::findFregById($utilizador->id_freguesia) as $freguesia)
                            <li>{{$freguesia->nome}}, concelho de {{$freguesia->concelho}} </li>
                            
                            @endforeach

                        </div>
                        <p></p>


                        @endforeach
                    </div>
                    <div class="car__details__sidebar__payment">
                        <h5><i class="fa fa-phone" aria-hidden="true"></i>
                            Telefone </h5>
                        <p><button class="primary-btn" id="myDIV" onclick="myFunction()" style="padding-top: 0px;padding-bottom: 0px;padding-left: 5px;padding-right: 5px;margin-top: 10px;">Mostrar</button></p>

                        <script>
                            function myFunction() {
                                var x = document.getElementById("myDIV");
                                if (x.innerHTML === "Mostrar") {
                                    x.innerHTML = {{$utilizador->telefone}};
                                } 
                                else {
                                    x.innerHTML = "Mostrar";
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6 mix sale">


    </div>



<div class="container" style="padding-bottom: 50px;">
<h3> Medidor de Preço </h3>

@foreach(App\Http\Controllers\AnunciosController::grafico_preco($anuncio) as $media)
    @foreach(App\Http\Controllers\AnunciosController::max_preco($anuncio) as $max)
        @foreach(App\Http\Controllers\AnunciosController::min_preco($anuncio) as $min)
            @foreach(App\Http\Controllers\AnunciosController::total_preco($anuncio) as $total)
    <canvas id="myCanvas2" width="1140" height="100"
style="border:0px solid #d3d3d3 ">

</canvas>


<script>

var canvas = document.getElementById("myCanvas2");
var ctx = canvas.getContext("2d");
var media = {!! json_encode($media, JSON_HEX_TAG) !!};
var preco = {!! json_encode($anuncio->preco, JSON_HEX_TAG) !!};
var max = {!! json_encode($max, JSON_HEX_TAG) !!};
var min = {!! json_encode($min, JSON_HEX_TAG) !!};
var total = {!! json_encode($total, JSON_HEX_TAG) !!};
var calc = (preco*100)/total ;
var medida = 1141 * (calc*0.01);
console.log(medida);
if(preco == max || medida > 990){
    ctx.fillStyle = "white";
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    ctx.moveTo(100,0);
    ctx.beginPath();
    ctx.rect(990, 50, 150, 50);
    ctx.stroke();
    if(preco > media){
        ctx.font = "10px Arial";
        ctx.strokeText("O veiculo está acima da", 990, 60); 
        ctx.strokeText("média de preços", 990, 70); 
        ctx.strokeText(Number(media).toFixed(2) + "€", 990, 80); 
    }



}else if(preco == min || medida < 150){
ctx.fillStyle = "white";
ctx.fillRect(0, 0, canvas.width, canvas.height);
ctx.moveTo(100,0);
ctx.beginPath();
ctx.rect(0, 50, 150, 50);
ctx.stroke();
if(preco < media){
ctx.font = "10px Arial";
ctx.strokeText("O veiculo está abaixo da", 0, 60); 
ctx.strokeText("média de preços", 0, 70); 
ctx.strokeText(Number(media).toFixed(2) + "€", 0, 80); 
    }

}else  {
ctx.fillStyle = "white";
ctx.fillRect(0, 0, canvas.width, canvas.height);
ctx.moveTo(100,0);
ctx.beginPath();
ctx.rect(medida, 50, 150, 50);
ctx.stroke();

ctx.font = "10px Arial";
ctx.strokeText("O veiculo está dentro da", medida, 60); 
ctx.strokeText("média de preços", medida, 70); 
ctx.strokeText(Number(media).toFixed(2) + "€", medida, 80); 
    
}

</script>

<canvas id="myCanvas" width="1140" height="100"
style="border:0px solid #d3d3d3 ">

</canvas>


<script>

var canvas = document.getElementById("myCanvas");
var ctx = canvas.getContext("2d");

var media = {!! json_encode($media, JSON_HEX_TAG) !!};
var preco = {!! json_encode($anuncio->preco, JSON_HEX_TAG) !!};
var max = {!! json_encode($max, JSON_HEX_TAG) !!};
var min = {!! json_encode($min, JSON_HEX_TAG) !!};
var total = {!! json_encode($total, JSON_HEX_TAG) !!};

if(preco == max){
    ctx.fillStyle = "white";
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    ctx.moveTo(1140,0);
    ctx.lineTo(1140,1140);
    ctx.stroke();
}else if(preco == min){

    ctx.fillStyle = "white";
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    ctx.moveTo(0,0);
    ctx.lineTo(0,100);
    ctx.stroke();
}else {
    var calc = (preco*100)/total ;
    var medida = 1141 * (calc*0.01);
    ctx.fillStyle = "white";
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    ctx.moveTo(medida,0);
    ctx.lineTo(medida,medida);
    ctx.stroke();
}


</script>


<div class="progress ">
<div class="progress-bar bg-success"  role="progressbar" style="width: 34%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
<div class="progress-bar bg-warning" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
<div class="progress-bar bg-danger" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
</div>





@endforeach
@endforeach
@endforeach
@endforeach
</div>






    <div class="container-fluid">
        <div class="row" style="padding-left: 47px;">
            @foreach(App\Http\Controllers\AnunciosController::randomAdds($anuncio->id_anuncio) as $anuncio)
            <div class="col-lg-4 col-md-4">
                <div class="car__item">
                    <div class="car__item__pic ">
                        <img src="/storage/app/anunciosImg/{{$anuncio->id_utilizador}}/{{$anuncio->id_anuncio}}/{{$anuncio->foto_perfil}}" alt="" style="width:375px;height:200px;" class="center">
                    </div>
                    <div class="car__item__text">
                        <div class="car__item__text__inner">
                            <div class="label-date">{{ App\Http\Controllers\AnunciosController::getYear($anuncio->data_registo) }}</div>
                            <h5><a href="/anuncios/show/{{$anuncio->id_anuncio}}" target="_blank" style="color:black;">{{$anuncio->titulo}}</a></h5>
                            <ul>
                                <li><span>{{$anuncio->quilometragem}}</span> km</li>
                                <li>{{$anuncio->caixa}}</li>
                                <li><span>{{$anuncio->potencia}}</span> cv</li>
                            </ul>
                        </div>
                        <div class="car__item__price">
                            <span class="car-option sale">Venda</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</section>
<!-- Car Details Section End -->

@endsection
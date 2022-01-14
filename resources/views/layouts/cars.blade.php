@extends ('layouts.app')


@section('title')
<title>MR. Automotive | Carros </title>
@endsection('title')


@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="resources/theme/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="resources/theme/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="resources/theme/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="resources/theme/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="resources/theme/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="resources/theme/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="resources/theme/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="resources/theme/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="resources/theme/css/style.css" type="text/css">


</head>


<!-- Breadcrumb End -->
<div class="breadcrumb-option set-bg" data-setbg="resources/theme/img/breadcrumb-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Lista de carros:</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Begin -->

<!-- Car Section Begin -->
<section class="car spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="car__sidebar">



                    <div class="car__filter">
                        <h5>Filtros:</h5>


                        <form action="/cars" method="GET">

                            <select class="form-select" name="marca" id="marca_id">
                                <option value="">Marca</option>
                                @foreach(App\Http\Controllers\AnunciosController::findMarcas() as $marca)
                                <option value="{{ $marca->id_marca }}">{{ $marca->nome }}</option>
                                @endforeach
                            </select>

                            <select name="estado">
                                <option value="">Condição</option>
                                <option value="1">Novo</option>
                                <option value="0">Usado</option>
                            </select>
                            <select name="quilometragem">
                                <option value="">Quilometragem (KM)</option>
                                <option value="5000">Até 5.000 KM</option>
                                <option value="10000">Até 10.000 KM</option>
                                <option value="50000">Até 50.000 KM</option>
                                <option value="100000">Até 100.000 KM</option>
                                <option value="200000">Até 200.000 KM</option>
                                <option value="500000">Até 500.000 KM</option>
                            </select>
                            <select name="combustivel">
                                <option value="">Combustivel</option>
                                <option value="Gasolina">Gasolina</option>
                                <option value="Diesel">Diesel</option>
                                <option value="GPL">GPL</option>
                                <option value="Híbrido">Híbrido</option>
                                <option value="Elétrico">Elétrico</option>
                            </select>
                            <select name="cor">
                                <option value="">Cores</option>
                                <option value="Vermelho">Vermelho</option>
                                <option value="Azul">Azul</option>
                                <option value="Preto">Preto</option>
                                <option value="Amarelo">Amarelo</option>
                                <option value="Verde">Verde</option>
                                <option value="Cinza">Cinza</option>
                                <option value="Branco">Branco</option>
                                <option value="Outro">Outro</option>
                            </select>

                            <select name="preco">
                                <option value="">Preço Máximo</option>
                                <option value="2000">Até 2.000€</option>
                                <option value="5000">Até 5.000€</option>
                                <option value="10000">Até 10.000€</option>
                                <option value="20000">Até 20.000€</option>
                                <option value="50000">Até 50.000€</option>
                                <option value="100000">Até 100.000€</option>
                                <option value="200000">Até 200.000€</option>
                            </select>

                            <div>
                                <div class="car__filter__btn">
                                    <button type="submit" class="site-btn" name="remover" value="remover" style="margin-top: 10px;padding-left: 25px;padding-right: 30px;">Remover Filtros</button>
                                </div>

                                <div class="car__filter__btn">
                                    <button type="submit" class="site-btn" name="filtrar" value="filtrar" style="margin-top: 10px;padding-left: 60px;padding-right: 60px;"> Filtrar </button>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="car__filter__option">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="car__filter__option__item">
                                <h6>Mostrar na página:</h6>
                                <select name="num">
                                    <option value="9">9 Carros</option>
                                    <option value="15">15 Carros</option>
                                    <option value="20">20 Carros</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="car__filter__option__item car__filter__option__item--right">
                                <h6>Preço</h6>
                                <select name="expensive">
                                    <option value="more">Mais caros primeiro</option>
                                    <option value="less">Mais baratos primeiro</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                </form>


                <!--DEBUG DE RESULTASDOS-->
                <div class="ShowDataHere">
                    /**</br>
                    *Debug:</br>
                    @if(!empty(request()->all()))
                    #marca id: {{ request()->marca }} </br>
                    #modelo id: {{ request()->modelo }} </br>
                    #estado bool:{{ request()->estado }} </br>
                    #quilometragem:{{ request()->quilometragem }} </br>
                    #combustivel: {{ request()->combustivel }} </br>
                    #Cor: {{ request()->cor }} </br>
                    #preco: {{ request()->preco }} </br>
                    #Numero de encontrados (por pagina): {{ $count ?? '' }} </br>
                    */
                    @endif
                </div>



                <div class="row">
                    @foreach($anuncios as $anuncio)
                    @if($anuncio->disponivel == 1)
                    <div class="col-lg-4 col-md-4">
                        <div class="car__item">
                            <div class="car__item__pic__slider owl-carousel">


                                <img src="/storage/app/anunciosImg/{{$anuncio->id_utilizador}}/{{$anuncio->id_anuncio}}/{{$anuncio->foto_perfil}}" alt="" style="width:262.5px;height:175.1px;">
                                @foreach(App\Http\Controllers\AnunciosController::getImgs("storage/app/anunciosImg/".$anuncio->id_utilizador."/".$anuncio->id_anuncio."/") as $files)
                                @if(strcmp($files->getFilename(),$anuncio->foto_perfil)!=0)
                                <img src="/storage/app/anunciosImg/{{$anuncio->id_utilizador}}/{{$anuncio->id_anuncio}}/{{ $files->getFilename() }}" alt="" style="width:262.5px;height:175.1px;">
                                @endif
                                @endforeach


                            </div>
                            <div class="car__item__text">
                                <div class="car__item__text__inner">
                                    <div class="label-date">Ano: {{ App\Http\Controllers\AnunciosController::getYear($anuncio->data_registo) }}</div>
                                    <h5><a href="/anuncios/show/{{$anuncio->id_anuncio}}">{{$anuncio->titulo}}</a></h5>
                                    <ul>
                                        @foreach(App\Http\Controllers\MarcasController::findMarcasById($anuncio->id_marca) as $marca)
                                        <li><span>Marca:</span> {{$marca->nome}}</li>
                                        @endforeach
                                        <li>Segmento: {{$anuncio->segmento}}</li>
                                        <li><span>{{$anuncio->quilometragem }}</span> Quilometragem(KMs)</li>
                                    </ul>
                                </div>
                                <div class="car__item__price">
                                    <span class="car-option sale">Para Venda</span>
                                    <h6> &nbsp;&nbsp; {{$anuncio->preco}}&nbsp;€<span></span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>

                {!! $anuncios->links('pagination::bootstrap-4') !!}

            </div>
        </div>
    </div>
</section>
<!-- Car Section End -->
<!-- Js Plugins -->
<script src="resources/theme/js/jquery-3.3.1.min.js"></script>
<script src="resources/theme/js/bootstrap.min.js"></script>


<script src="resources/theme/js/jquery.nice-select.min.js"></script>
<script src="resources/theme/js/jquery-ui.min.js"></script>
<script src="resources/theme/js/jquery.magnific-popup.min.js"></script>

<script src="resources/theme/js/jquery.slicknav.js"></script>
<script src="resources/theme/js/owl.carousel.min.js"></script>
<script src="resources/theme/js/main.js"></script>

@endsection
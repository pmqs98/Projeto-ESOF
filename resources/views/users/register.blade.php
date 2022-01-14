@extends('layouts.app')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="description" content="HVAC Template">
    <meta name="keywords" content="HVAC, unica, creative, html">
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

<div class="container-fluid">
<form action="{{url('/register')}}" method="post">
    @csrf {{-- <- Required for protection or the form is rejected --}}
    Nome: <input type="text" name="nome" value="{{old('nome')}}" style="margin-left: 5px;"><br><br>
    Apelido: <input type="text" name="apelido" value="{{old('apelido')}}" style="margin-left: 5px;"> <br><br>
    Email: <input type="email" name="email" value="{{old('email')}}" style="margin-left: 5px;"><br><br>
    Telefone: <input type="tel" name="telefone" maxlength="9" value="{{old('telefone')}}" style="margin-left: 5px;"><br><br>
    Data de nascimento: <input type="date" name="data_nascimento"  value="{{old('data_nascimento')}}" style="margin-left: 5px;"><br><br>
    Sexo: 
        <input type="radio" id="male" name="sexo" value="1" style="margin-left: 5px;">
        <label for="male">Masculino</label>
        <input type="radio" id="female" name="sexo" value="2" style="margin-left: 5px;">
        <label for="female">Feminino</label>
        <input type="radio" id="other" name="sexo" value="3" style="margin-left: 5px;">
        <label for="other">Outro</label> <br><br>
    Tipo de vendedor: 
    <input type="radio" id="particular" name="tipovendedor" value="particular" style="margin-left: 5px;">
        <label for="male">Particular</label>
        <input type="radio" id="empresa" name="tipovendedor" value="empresa" style="margin-left: 5px;">
        <label for="female">Empresa</label> <br><br>
    Palavra-passe: <input type="password" name="password" style="margin-left: 5px;"><br><br>
    Confirmar palavra-passe: <input type="password" name="password2" style="margin-left: 5px;"><br><br>

    <div class="form-row"style="padding-left: 5px;">
    <label for = "distrito" style="padding-right: 31.6px;"> Distrito:  </label>
    <select class="select-sm" id="distrito" >
        <option>Teste</option>
        <option>Teste2</option>
    </select> 
    </div> 

    <br>
    <div class="form-row"style="padding-left: 5px;">
    <label for = "concelho" style="padding-right: 19.54px;"> Concelho:  </label>
        <select class="select" id='concelho'>
        <option>Teste</option>
        <option>Teste2</option>
        </select>
    </div>
    <br>
    <div class="form-row" style="padding-left: 5px;">
    <label for = "freguesia" style="padding-right: 18px;"> Freguesia:  </label> 
        <select class="select" id='freguesia' name='id_freguesia' >
        <option>1</option>
        <option>2</option>
        </select>
    </div>
    <br>
    Foto de perfil: <input type="text" id="myfile" name="foto_perfil"><br><br>
    admin: <input type="number" name="admin"><br><br>
    <button type="submit" class="btn btn-primary">Registar</button>
</form>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<script src="resources/theme/js/jquery-3.3.1.min.js"></script>
    <script src="resources/theme/js/bootstrap.min.js"></script>
    <script src="resources/theme/js/jquery.nice-select.min.js"></script>
    <script src="resources/theme/js/jquery-ui.min.js"></script>
    <script src="resources/theme/js/jquery.magnific-popup.min.js"></script>
    <script src="resources/theme/js/mixitup.min.js"></script>
    <script src="resources/theme/js/jquery.slicknav.js"></script>
    <script src="resources/theme/js/owl.carousel.min.js"></script>
    <script src="resources/theme/js/main.js"></script>

@endsection
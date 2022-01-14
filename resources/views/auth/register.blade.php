@extends('layouts.app')

@section('content')
<!--  Error handle -->
@if($errors->any())
<div class="row collapse">
    <ul class="alert-box warning radius">
        @foreach($errors->all() as $error)
        <li> {{ $error }} </li>
        @endforeach
    </ul>
</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-bottom: 16px;">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}" required autocomplete="nome" autofocus>

                                @error('nome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Apelido') }}</label>

                            <div class="col-md-6">
                                <input id="apelido" type="text" class="form-control @error('apelido') is-invalid @enderror" name="apelido" value="{{ old('apelido') }}" required autocomplete="apelido" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Telefone') }}</label>

                            <div class="col-md-6">
                                <input id="telefone" type="integer" class="form-control @error('telefone') is-invalid @enderror" maxlength="9" name="telefone" value="{{ old('telefone') }}" required autocomplete="telefone" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Data de nascimento') }}</label>

                            <div class="col-md-6">
                                <input id="data_nascimento" type="date" max="<?php echo date("Y-m-d"); ?>" class="form-control @error('data_nascimento') is-invalid @enderror" name="data_nascimento" value="{{ old('data_nascimento') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Sexo') }}</label>

                            <div class="col-md-6">

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input " type="radio" name="sexo" id="inlineRadio1" value="M">
                                    <label class="form-check-label" for="inlineRadio1">Masculino</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sexo" id="inlineRadio2" value="F">
                                    <label class="form-check-label" for="inlineRadio2">Feminino</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sexo" id="inlineRadio3" value="O">
                                    <label class="form-check-label" for="inlineRadio3">Outro</label>
                                </div>
                                @error('sexo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de Vendedor') }}</label>

                            <div class="col-md-6">

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input " type="radio" name="tipovendedor" id="inlineRadi1" value="particular">
                                    <label class="form-check-label" for="inlineRadi1">Particular</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tipovendedor" id="inlineRadi2" value="profissional">
                                    <label class="form-check-label" for="inlineRadi2">Profissional</label>
                                </div>

                                @error('tipovendedor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Distrito') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="distrito" id="distrito">
                                    @foreach(App\Http\Controllers\Auth\RegisterController::findDistritos() as $distrito)
                                    <option value="{{ $distrito->nome }}">{{ $distrito->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Concelho') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="concelho" id="concelho">
                                    @foreach(App\Http\Controllers\Auth\RegisterController::findConcelhos() as $concelho)
                                    <option value="{{$concelho->distrito}}->{{$concelho->nome}}">{{ $concelho->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="form-group row">

                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Freguesia') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="id_freguesia" id="freguesia">
                                    @foreach(App\Http\Controllers\Auth\RegisterController::findFreguesias() as $freguesias)
                                    <option value="{{$freguesias->concelho}}->{{$freguesias->id_freguesia}}">{{ $freguesias->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                        <script>
                            src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"
                        </script>


                        <script>
                            $(document).ready(function() {
                                var $options = $("#concelho").clone(); // this will save all initial options in the second dropdown

                                $("#distrito").change(function() {
                                    var filters = [];
                                    if ($(this).val() == "") {
                                        $(this).find("option").each(function(index, option) {
                                            if ($(option).val() != "")
                                                filters.push($(option).val());
                                        });
                                    } else {
                                        filters.push($(this).val())
                                    }

                                    $("#concelho").html("");

                                    $.each(filters, function(index, value) {
                                        $options.find("option").each(function(optionIndex, option) { // a second loop that check if the option value starts with the filter value
                                            var val = $(option).val().split("->");
                                            //console.log(val);
                                            if (value.localeCompare(val[0]) == 0)
                                                $(option).clone().appendTo($("#concelho"));
                                        });

                                    });

                                });
                            });
                        </script>

                        <script>
                            $(document).ready(function() {
                                var $options = $("#freguesia").clone(); // this will save all initial options in the second dropdown

                                $("#concelho").change(function() {
                                    var filters = [];
                                    if ($(this).val() == "") {
                                        $(this).find("option").each(function(index, option) {
                                            if ($(option).val() != "")
                                                filters.push($(option).val());
                                        });
                                    } else {
                                        filters.push($(this).val())
                                    }

                                    $("#freguesia").html("");

                                    $.each(filters, function(index, value) {
                                        $options.find("option").each(function(optionIndex, option) { // a second loop that check if the option value starts with the filter value
                                            var val2 = value.split("->");
                                            var val = $(option).val().split("->");
                                            console.log(val2);
                                            if (val2[1].localeCompare(val[0]) == 0)
                                                $(option).clone().appendTo($("#freguesia"));
                                        });

                                    });

                                });
                            });
                        </script>



                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Foto Perfil') }}</label>

                            <div class="col-md-6">
                                <input id="foto_perfil" type="file" class="form-control @error('name') is-invalid @enderror" name="foto_perfil" value="{{ old('foto_perfil') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@if (isset($errors) && count($errors))

There were {{count($errors->all())}} Error(s)
<ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }} </li>
    @endforeach
</ul>

@endif

@endsection
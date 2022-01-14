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



<div class="container">
    <div class="card">
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <i class="fa fa-user" aria-hidden="true"></i> Editar Dados
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">

                        <form method="POST" action="{{ url('/dashboard/definicoes/update/'.Auth::user()->id ) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                                <div class="col-md-6">
                                    <input id="nome" type="text" class="form-control @error('name') is-invalid @enderror" name="nome" value="{{ Auth::user()->nome  }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Apelido') }}</label>

                                <div class="col-md-6">
                                    <input id="apelido" type="text" class="form-control @error('apelido') is-invalid @enderror" name="apelido" value="{{ Auth::user()->apelido  }}" required autocomplete="apelido" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Telefone') }}</label>

                                <div class="col-md-6">
                                    <input id="telefone" type="integer" class="form-control @error('telefone') is-invalid @enderror" name="telefone" value="{{ Auth::user()->telefone  }}" required autocomplete="telefone" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Data Nascimento') }}</label>

                                <div class="col-md-6">
                                    <input id="data_nascimento" type="date" class="form-control @error('data_nascimento') is-invalid @enderror" name="data_nascimento" value="{{ Auth::user()->data_nascimento  }}" required autocomplete="name" autofocus>

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
                                        <input class="form-check-input " type="radio" name="sexo" id="inlineRadio1" value="M" {{Auth::user()->sexo=="M" ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inlineRadio1">Masculino</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexo" id="inlineRadio2" value="F" {{Auth::user()->sexo=="F" ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inlineRadio2">Feminino</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexo" id="inlineRadio3" value="O" {{Auth::user()->sexo=="O" ? 'checked' : '' }}>
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
                                        <input class="form-check-input " type="radio" name="tipovendedor" id="inlineRadio1" value="particular" {{Auth::user()->tipovendedor=="particular" ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inlineRadio1">Particular</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tipovendedor" id="inlineRadio2" value="profissional" {{Auth::user()->tipovendedor=="profissional" ? 'checked' : '' }}>
                                        <label class="form-check-label" for="inlineRadio2">Profissional</label>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
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
                                        <input id="foto_perfil" type="file" class="form-control @error('name') is-invalid @enderror" name="foto_perfil" value="/storage/app/utilizadoresImg/{{Auth::user()->id}}/" autocomplete="name" autofocus>

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
                                            {{ __('Confirmar') }}
                                        </button>
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
                        </form>


                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        Editar E-mail
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">

                        <form method="POST" action="{{ url('/dashboard/definicoes/updateemail/'.Auth::user()->id ) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="oldemail" class="col-md-4 col-form-label text-md-right">{{ __('E-mail Antigo') }}</label>

                                <div class="col-md-6">
                                    <input id="oldemail" type="email" class="form-control @error('oldemail') is-invalid @enderror" name="oldemail" value="" required autocomplete="name" autofocus>

                                    @error('oldemail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nvemail" class="col-md-4 col-form-label text-md-right">{{ __('Novo E-mail') }}</label>

                                <div class="col-md-6">
                                    <input id="nvemail" type="email" class="form-control @error('nvemail') is-invalid @enderror" name="nvemail" value="" required autocomplete="apelido" autofocus>

                                    @error('nvemail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nvemailc" class="col-md-4 col-form-label text-md-right">{{ __('Novo E-mail Confirmação') }}</label>

                                <div class="col-md-6">
                                    <input id="nvemailc" type="email" class="form-control @error('nvemailc') is-invalid @enderror" name="nvemailc" value="" required autocomplete="email">

                                    @error('nvemailc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>




                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Confirmar') }}
                                    </button>
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
                        </form>


                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        Editar Password
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <form method="POST" action="{{ url('/dashboard/definicoes/updatepassword/'.Auth::user()->id ) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="oldpass" class="col-md-4 col-form-label text-md-right">{{ __('Password Antiga') }}</label>

                                <div class="col-md-6">
                                    <input id="oldpass" type="password" class="form-control @error('oldpass') is-invalid @enderror" name="oldpass" value="" required autocomplete="oldpass" autofocus>

                                    @error('oldpass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nvpass" class="col-md-4 col-form-label text-md-right">{{ __('Nova Password') }}</label>

                                <div class="col-md-6">
                                    <input id="nvpass" type="password" class="form-control @error('nvpass') is-invalid @enderror" name="nvpass" value="" required autocomplete="nvpass" autofocus>

                                    @error('nvpass')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nvpassc" class="col-md-4 col-form-label text-md-right">{{ __('Nova Password Confirmação') }}</label>

                                <div class="col-md-6">
                                    <input id="nvpassc" type="password" class="form-control @error('nvpassc') is-invalid @enderror" name="nvpassc" value="" required autocomplete="nvpassc">

                                    @error('nvpassc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>




                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Confirmar') }}
                                    </button>
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
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


@endsection
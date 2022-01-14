@extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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
<div>
    <form class="tm-edit-product-form" action="{{ url('/anuncios') }}" method="POST">

        @csrf
        @method('POST')

        <div class="row">
            <div class="col-12">
                <h1>Adicionar Carro </h1>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="titulo">Titulo:
            </label>
            <input id="titulo" name="titulo" type="text" class="form-control validate" required="">
        </div>

        <div class="form-group mb-3">
            <label for="marca_id" class="col-md-4 col-form-label text-md-right">{{ __('Marca:') }}</label>
            <div class="col-xs-6">
                <select class="form-control" name="id_marca" id="marca_id">
                    @foreach(App\Http\Controllers\AnunciosController::findMarcas() as $marca)
                    <option value="{{ $marca->id_marca }}">{{ $marca->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="form-group mb-3">
            <label for="modelo_id" class="col-md-4 col-form-label text-md-right">{{ __('Modelo:') }}</label>
            <div class="col-xs-6">
                <select class="form-control" name="id_modelo" id="modelo_id">
                    @foreach(App\Http\Controllers\AnunciosController::findModelos() as $modelo)
                    <option value="{{ $modelo->id_marca }}-{{ $modelo->id_modelo }}">{{ $modelo->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="descricao_id">Descrição:</label>
            <textarea name="descricao" id="descricao_id" class="form-control validate" rows="5" required=""></textarea>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">€</span>
            <span class="input-group-text">Euro.Centimos</span>
            <input type="number" name="preco" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
        </div>
        <div>
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Valor Negociável:') }}</label>
            <div class="form-check">
                <label class="form-check-label" for="flexRadioDefault_valor_fixo1">
                    Sim
                </label>
                <input class="form-check-input" type="radio" name="valor_fixo" id="flexRadioDefault_valor_fixo1" value="1">
            </div>
            <div class="form-check">
                <label class="form-check-label" for="flexRadioDefault_valor_fixo2">
                    Não
                </label>
                <input class="form-check-input" type="radio" name="valor_fixo" id="flexRadioDefault_valor_fixo2" value="0" checked>
            </div>
        </div>

        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">Cor:</span>
            <input type="text" name="cor" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div>
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Data de Registo:') }}</label>
            <input type="datetime-local" id="data_registo" name="data_registo">
        </div>

        <div>
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Estado do Veiculo:') }}</label>
            <div class="form-check">
                <label class="form-check-label" for="flexRadioDefault1">
                    Novo
                </label>
                <input class="form-check-input" type="radio" name="estado" id="flexRadioDefault1" value="1">

            </div>
            <div class="form-check">
                <label class="form-check-label" for="flexRadioDefault2">
                    Usado
                </label>
                <input class="form-check-input" type="radio" name="estado" id="flexRadioDefault2" value="0" checked>
            </div>
        </div>

        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm_versao">Versão:</span>
            <input type="text" name="versao" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

        <select name="combustivel" class="form-select" aria-label="Default select example">
            <option selected>Tipo de combustível do Veiculo</option>
            <option value="Gasolina premium">Gasolina premium</option>
            <option value="Gasolina formulada">Gasolina formulada</option>
            <option value="Etanol">Etanol</option>
            <option value="Etanol aditivado">Etanol aditivado</option>
            <option value="GNV (Gás Natural Veicular)">GNV (Gás Natural Veicular)</option>
            <option value="Diesel">Diesel</option>
            <option value="Diesel S-10">Diesel S-10</option>
            <option value="Diesel aditivado">Diesel aditivado</option>
            <option value="Diesel Premium">Diesel Premium</option>
            <option value="Elétrico">Elétrico</option>
        </select>
        <div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm_quilometragem">Quilometragem(KMs):</span>
                <input name="quilometragem" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm_potencia">Potencia:</span>
                <input name="potencia" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm_cilindrada">Cilindrada:</span>
                <input name="cilindrada" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </div>
        </div>
        <div>
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Retoma:') }}</label>
            <div class="form-check">
                <label class="form-check-label" for="flexRadioDefault1">
                    Sim
                </label>
                <input class="form-check-input" type="radio" name="retoma" id="flexRadioDefault_Retoma1" value="1">
            </div>
            <div class="form-check">
                <label class="form-check-label" for="flexRadioDefault2">
                    Não
                </label>
                <input class="form-check-input" type="radio" name="retoma" id="flexRadioDefault_Retoma2" value="0" checked>
            </div>
        </div>

        <div>
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Financiamento:') }}</label>
            <div class="form-check">
                <label class="form-check-label" for="flexRadioDefault_Financiamento1">
                    Sim
                </label>
                <input class="form-check-input" type="radio" name="financiamento" id="flexRadioDefault_Financiamento1" value="1">

            </div>
            <div class="form-check">
                <label class="form-check-label" for="flexRadioDefault_Financiamento2">
                    Não
                </label>
                <input class="form-check-input" type="radio" name="financiamento" id="flexRadioDefault_Financiamento2" value="0" checked>
            </div>
        </div>

        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm_segmento">Segmento:</span>
            <input type="text" class="form-control" name="segmento" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm_lotacao">Lotacao:</span>
            <input type="number" class="form-control" name="lotacao" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm_portas">Numero de portas:</span>
            <input type="number" class="form-control" name="portas" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

        <select name="classe_veiculo" class="form-select" aria-label="Default select example">
            <option value="classe 1">classe 1</option>
            <option value="classe 2">classe 2</option>
            <option value="classe 3">classe 3</option>
            <option value="classe 4">classe 4</option>

        </select>
        <select name="tracao" class="form-select" aria-label="Default select example">
            <option value="Tração dianteira">Tração</option>
            <option value="Tração traseira">Tração traseira</option>
        </select>
        <div class="form-check">
            <input name="garantia_stand" class="form-check-input" type="checkbox" value="0" id="flexCheckChecked_garantia_stand">
            <label class="form-check-label" for="flexCheckChecked">
                Garantia de stand
            </label>
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm_portas">Numero de Registos:</span>
            <input type="number" class="form-control" name="nr_registos" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>
        <div class="form-check">
            <input name="livro_revisoes" class="form-check-input" type="checkbox" value="0" id="flexCheckChecked_livro_revisoes">
            <label class="form-check-label" for="flexCheckChecked">
                Livro de Revisões
            </label>
        </div>
        <div class="form-check">
            <input name="seg_chave" class="form-check-input" type="checkbox" value="0" id="flexCheckChecked_seg_chave">
            <label class="form-check-label" for="flexCheckChecked">
                Segunda Chave:
            </label>
        </div>
        <div class="form-check">
            <input name="jantes_liga_leve" class="form-check-input" type="checkbox" value="0" id="flexCheckChecked_jantes_liga_leve">
            <label class="form-check-label" for="flexCheckChecked_jantes_liga_leve">
                Jantes Liga-Leve:
            </label>
        </div>
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-medida_jantes">Medida das Jantes:</span>
            <input type="number" class="form-control" name="medida_jantes" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="form-check">
            <input name="airbags" class="form-check-input" type="checkbox" value="0" id="flexCheckChecked_jantes_airbags">
            <label class="form-check-label" for="flexCheckChecked_jantes_airbags">
                Airbags:
            </label>
        </div>
        <div class="form-check">
            <input name="ar_condicionado" class="form-check-input" type="checkbox" value="0" id="flexCheckChecked_ar_condicionado">
            <label class="form-check-label" for="flexCheckChecked_ar_condicionado">
                Ar condicionado:
            </label>
        </div>
        <div class="form-check">
            <input name="importado" class="form-check-input" type="checkbox" value="0" id="flexCheckChecked_importado">
            <label class="form-check-label" for="flexCheckChecked_importado">
                Importado:
            </label>
        </div>
        <div class="form-check">
            <input name="metalizado" class="form-check-input" type="checkbox" value="0" id="flexCheckChecked_metalizado">
            <label class="form-check-label" for="flexCheckChecked_metalizado">
                Metalizado:
            </label>
        </div>

        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-caixa">Caixa:</span>
            <input type="number" class="form-control" name="caixa" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-estofos">Estofos:</span>
            <input type="text" class="form-control" name="estofos" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>

        <div class="input-group mb-3">
            <input name="fotos" type="file" class="form-control" id="inputGroupFile_fotos">
        </div>


        <div class="col-12">
            <button name="submit" type="submit" class="btn btn-primary btn-block text-uppercase">Publicar Anuncio</button>
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

<script>
    $(document).ready(function() {
        var $options = $("#modelo_id").clone(); // this will save all initial options in the second dropdown

        $("#marca_id").change(function() {
            var filters = [];
            if ($(this).val() == "") {
                $(this).find("option").each(function(index, option) {
                    if ($(option).val() != "")
                        filters.push($(option).val());
                });
            } else {
                filters.push($(this).val())
            }

            $("#modelo_id").html("");

            $.each(filters, function(index, value) {
                $options.find("option").each(function(optionIndex, option) { // a second loop that check if the option value starts with the filter value
                    if ($(option).val().startsWith(value))
                        $(option).clone().appendTo($("#modelo_id"));
                });

            });

        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

@endsection
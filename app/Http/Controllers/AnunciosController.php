<?php

namespace App\Http\Controllers;

use App\Models\anuncios;
use Illuminate\Http\Request;
use App\Models\modelos;
use App\Models\marcas;
use App\Models\Favoritos;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Cache\Store;

class AnunciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $max1 = 'max:1';
        $max10 = 'max:10';
        $max50 = 'max:50';
        $max100 = 'max:100';
        $request->validate([
            'titulo' => ['required', 'string', 'max:90'],
            'descricao' => ['required', 'string', 'max:9000'],
            'id_marca' => ['required', 'integer', $max100],
            'id_modelo' => ['required', 'string', $max100],
            'preco' => ['required', 'integer', 'max:10000000'],
            'valor_fixo' => ['required', 'integer', $max1],
            'data_registo' => ['required', 'date'],
            'cor' => ['required', 'string', $max10],
            'estado' => ['required', 'integer', $max1],
            'versao' => ['required', 'string', 'max:60'],
            'combustivel' => ['required', 'string', 'max:30'],
            'quilometragem' => ['required', 'integer', 'max:30000000', 'min:0'],
            'potencia' => ['required', 'integer', 'max:1000'],
            'cilindrada' => ['required', 'integer', 'max:32767'],
            'retoma' => ['required', 'integer', $max1],
            'financiamento' => ['required', 'integer', $max1],
            'segmento' => ['required', 'string', 'max:20'],
            'metalizado' => ['integer', $max1],
            'caixa' => ['required', 'integer', $max10],
            'lotacao' => ['required', 'integer', 'max:9'],
            'portas' => ['required', 'integer', 'max:5'],
            'classe_veiculo' => ['required', 'string', $max50],
            'garantia_stand' => ['integer', $max1],
            'nr_registos' => ['required', 'integer', $max50],
            'tracao' => ['required', 'string', $max10],
            'livro_revisoes' => ['integer', $max1],
            'seg_chave' => ['integer', $max1],
            'jantes_liga_leve' => ['integer', $max1],
            'estofos' => ['required', 'string', $max10],
            'medida_jantes' => ['required', 'integer', $max50],
            'airbags' => ['integer', $max1],
            'ar_condicionado' => ['integer', $max1],
            'importado' => ['integer', $max1],
            'fotos.*' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:10240']
        ]);

        list($lixo, $id_modelo) = explode("-", $request['id_modelo']);
        $request['id_modelo'] = $id_modelo;
        $request['id_utilizador'] = Auth::user()->id;
        $request['disponivel'] = 1;
        $data = $request->all();
        if (empty($data['garantia_stand'])) {
            $request['garantia_stand'] = 0;
        } else {
            $request['garantia_stand'] = 1;
        }
        if (empty($data['livro_revisoes'])) {
            $request['livro_revisoes'] = 0;
        } 
        else {
            $request['livro_revisoes'] = 1;
        }
        if (empty($data['seg_chave'])) {
            $request['seg_chave'] = 0;
        } else {
            $request['seg_chave'] = 1;
        }
        if (empty($data['jantes_liga_leve'])) {
            $request['jantes_liga_leve'] = 0;
        } else {
            $request['jantes_liga_leve'] = 1;
        }
        if (empty($data['airbags'])) {
            $request['airbags'] = 0;
        } else {
            $request['airbags'] = 1;
        }
        if (empty($data['ar_condicionado'])) {
            $request['ar_condicionado'] = 0;
        } else {
            $request['ar_condicionado'] = 1;
        }
        if (empty($data['importado'])) {
            $request['importado'] = 0;
        } else {
            $request['importado'] = 1;
        }
        if (empty($data['metalizado'])) {
            $request['metalizado'] = 0;
        } else {
            $request['metalizado'] = 1;
        }



        if ($request->hasFile('fotos')) {

            $save = $request->fotos;
            $a = new anuncios;

            $a->titulo = $request->titulo;
            $a->id_utilizador = $request->id_utilizador;
            $a->disponivel = $request->disponivel;
            $a->foto_perfil = "teste";
            $a->descricao = $request->descricao;
            $a->id_marca = $request->id_marca;
            $a->id_modelo = $request->id_modelo;
            $a->preco = $request->preco;
            $a->valor_fixo = $request->valor_fixo;
            $a->data_registo = $request->data_registo;
            $a->cor = $request->cor;
            $a->estado = $request->estado;
            $a->versao = $request->versao;
            $a->combustivel = $request->combustivel;
            $a->quilometragem = $request->quilometragem;
            $a->potencia = $request->potencia;
            $a->cilindrada = $request->cilindrada;
            $a->retoma = $request->retoma;
            $a->financiamento = $request->financiamento;
            $a->segmento = $request->segmento;
            $a->metalizado = $request->metalizado;
            $a->caixa = $request->caixa;
            $a->lotacao = $request->lotacao;
            $a->portas = $request->portas;
            $a->classe_veiculo = $request->classe_veiculo;
            $a->garantia_stand = $request->garantia_stand;
            $a->nr_registos = $request->nr_registos;
            $a->tracao = $request->tracao;
            $a->livro_revisoes = $request->livro_revisoes;
            $a->seg_chave = $request->seg_chave;
            $a->jantes_liga_leve = $request->jantes_liga_leve;
            $a->estofos = $request->estofos;
            $a->medida_jantes = $request->medida_jantes;
            $a->airbags = $request->airbags;
            $a->ar_condicionado = $request->ar_condicionado;
            $a->importado = $request->importado;
            $a->fotos = "teste";
            $a->destacado = 0;
            $a->save();

            $dir = "anunciosImg";
            $scan = Storage::directories($dir);
            if (in_array("anunciosImg" . "/" . $a['id_utilizador'], $scan)) {
                Storage::makeDirectory("anunciosImg" . "/"  . $a['id_utilizador'] . "/" . $a->id_anuncio);
                $files = $save;
                foreach ($files as $pics) {
                    Storage::putFile("anunciosImg" . "/"  . $a['id_utilizador'] . "/" . $a['id_anuncio'], $pics);
                }
            } 
            else {
                Storage::makeDirectory($dir . "/" . $a['id_utilizador']);
                Storage::makeDirectory("anunciosImg" . "/"  . $a['id_utilizador'] . "/" . $a->id_anuncio);
                $files = $save;
                foreach ($files as $pics) {
                    Storage::putFile("anunciosImg" . "/"  . $a['id_utilizador'] . "/" . $a['id_anuncio'], $pics);
                }
            }

            $a['fotos'] = "anunciosImg" . "/"  . $a['id_utilizador'] . "/" . $a->id_anuncio;
            $files = scandir("storage/app/anunciosImg" . "/"  . $a['id_utilizador'] . "/" . $a->id_anuncio);
            $name = $files[2];
            $a['foto_perfil'] = $name;
            $a->save();
        }
        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\anuncios  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function show(anuncios $anuncio)
    {
        $anuncio = anuncios::findOrFail($anuncio->id_anuncio);
        return view('Anuncios.detalhesanuncio', [
            'anuncio' => $anuncio,
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\anuncios  $anuncios
     * @return \Illuminate\Http\Response
     */
    public function edit(anuncios $anuncio)
    {
        $data = anuncios::findOrFail($anuncio->id_anuncio);
        return view('Anuncios.editAnuncio', [
            'anuncio' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\anuncios  $anuncios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, anuncios $anuncios)
    {
        $max1 = 'max:1';
        $max10 = 'max:10';
        $max50 = 'max:50';
        $max100 = 'max:100';
        $anuncios = anuncios::findOrFail($request->id_anuncio);
        $request->validate([
            'titulo' => ['required', 'string', 'max:90'],
            'descricao' => ['required', 'string', 'max:9000'],
            'id_marca' => ['required', 'integer', $max100],
            'id_modelo' => ['required', 'string', $max100],
            'preco' => ['required', 'integer', 'max:10000000'],
            'valor_fixo' => ['required', 'integer', $max1],
            'data_registo' => ['required', 'date'],
            'cor' => ['required', 'string', $max10],
            'estado' => ['required', 'integer', $max1],
            'versao' => ['required', 'string', 'max:60'],
            'combustivel' => ['required', 'string', 'max:30'],
            'quilometragem' => ['required', 'integer', 'max:30000000', 'min:0'],
            'potencia' => ['required', 'integer', 'max:1000'],
            'cilindrada' => ['required', 'integer', 'max:32767'],
            'retoma' => ['required', 'integer', $max1],
            'financiamento' => ['required', 'integer', $max1],
            'segmento' => ['required', 'string', 'max:20'],
            'metalizado' => ['integer', $max1],
            'caixa' => ['required', 'integer', $max10],
            'lotacao' => ['required', 'integer', 'max:9'],
            'portas' => ['required', 'integer', 'max:5'],
            'classe_veiculo' => ['required', 'string', $max50],
            'garantia_stand' => ['integer', $max1],
            'nr_registos' => ['required', 'integer', $max50],
            'tracao' => ['required', 'string', $max10],
            'livro_revisoes' => ['integer', $max1],
            'seg_chave' => ['integer', $max1],
            'jantes_liga_leve' => ['integer', $max1],
            'estofos' => ['required', 'string', $max10],
            'medida_jantes' => ['required', 'integer', $max50],
            'airbags' => ['integer', $max1],
            'ar_condicionado' => ['integer', $max1],
            'importado' => ['integer', $max1],
            'fotos.*' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:10240']
        ]);


        $val = explode("-", $request->id_modelo);
        $modelo_id = (int) $val[1];
        $anuncios->id_modelo = $modelo_id;

        if ($request->hasFile('fotos')) {
            $files = Storage::allFiles('anunciosImg/' . $anuncios['id_utilizador'] . "/" . $anuncios['id_anuncio']);
            Storage::delete($files);
            $save = $request['fotos'];
            foreach ($save as $pics) {
                Storage::putFile('anunciosImg/' . $anuncios['id_utilizador'] . "/" . $anuncios['id_anuncio'], $pics);
            }


            $anuncios['fotos'] = 'anunciosImg/' . $anuncios['id_utilizador'] . "/" . $anuncios['id_anuncio'];
            $files = scandir("storage/app/anunciosImg" . "/"  . $anuncios['id_utilizador'] . "/" . $anuncios['id_anuncio']);
            $name = $files[2];
            $anuncios['foto_perfil'] = $name;
        }
        $anuncios->update($request->only(['titulo', 'descricao', 'id_marca', 'preco', 'valor_fixo', 'data_registo', 'cor', 'estado', ' versao', 'combustivel', 'quilometragem', 'potencia', 'cilindrada', 'retoma', 'financiamento', 'segmento', 'metalizado', 'caixa', 'lotacao', 'portas', 'classe_veiculo', 'garantia_stand', 'nr_registos', 'tracao', 'livro_revisoes', 'seg_chave', 'jantes_liga_leve', 'estofos', 'medida_jantes', 'airbags', 'ar_condicionado', 'importado']));
        return redirect('/dashboard')->with('success', 'Anúncio alterado com sucesso!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\anuncios  $anuncios
     * @return \Illuminate\Http\Response
     */
    public function delete(request $anuncios)

    {
        $data = anuncios::findOrFail($anuncios);

        if ($data[0]->disponivel == "1") {
            $data[0]->disponivel = "0";
            $data[0]->save();
            if (favoritos::find($data[0]->id_anuncio)) {
                $RetirarFavoritos = favoritos::where('id_anuncio', $data[0]->id_anuncio)->delete();
                return redirect('/dashboard')->with('Anuncio arquivado');
            }
            return redirect('/dashboard')->with('Anuncio arquivado');
        } else {
            Storage::deleteDirectory($data[0]->fotos);
            $data[0]->delete();
            return redirect('/dashboard')->with('Anuncio apagado');
        }
    }


    public function anuncios_home(Request $request)
    {

        $anuncios = anuncios::where('destacado', '=', 1)->inRandomOrder()->limit(6)->get();
        $anuncios_naodestacados = anuncios::where('destacado', '=', 0)->inRandomOrder()->limit(6)->get();
        return view('layouts.frontpage', [
            'anuncios' => $anuncios,
            'anuncios_naodestacados' => $anuncios_naodestacados,
        ]);
    }


    public function destacar(Request $request)
    {
        return view('layouts.pagamento');
    }


    public static function findMarcas()
    {

        $marcas = marcas::orderBy('nome', 'asc')->get(); //get data from table
        return ($marcas);
    }
    public static function  findModelos()
    {

        $modelos = modelos::orderBy('nome', 'asc')->get(); //get data from table
        return ($modelos);
    }

    public static function findAnunciosId()
    {
        $anuncios = anuncios::orderBy('created_at', 'desc')->where('id_anuncio', '=', Auth::user()->id)->get();
        return ($anuncios);
    }

    public static function findAnunciosById($id)
    {
        $anuncios = anuncios::orderBy('created_at', 'desc')->where('id_utilizador', '=', $id)->where('disponivel', '=', 1)->get();
        return ($anuncios);
    }

    public static function findInfoAboutAnuncio($id)
    {
        $anuncios = anuncios::orderBy('created_at', 'desc')->where('id_anuncio', '=', $id)->where('disponivel', '=', 1)->get();
        return ($anuncios);
    }

    public static function findAnunciosArquivados($id)
    {
        $anuncios = anuncios::orderBy('created_at', 'desc')->where('id_utilizador', '=', $id)->where('disponivel', '=', 0)->get();
        return ($anuncios);
    }

    public static function activate(anuncios $anuncio)
    {
        $anuncios = anuncios::findOrFail($anuncio->id_anuncio);
        $anuncios['disponivel'] = 1;
        $anuncios->save();
        return redirect('/dashboard');
    }


    public static function randomAdds($id)
    {
        ///o id que recebe como argumento é o id que é para excluir.

        $anuncios = anuncios::inRandomOrder()->where('id_anuncio', '!=', $id)->limit(3)->get();
        return ($anuncios);
    }

    public static function findAllAnuncios()
    {

        $anuncio = anuncios::All(); //get data from table
        return ($anuncio);
    }
    public static function getYear($data)
    {
        list($year, $month, $day) = explode("-", $data);
        return $year;
    }

    public static function getImgs($dir)
    {
        $files = File::allFiles($dir);
        return ($files);
    }



    public function todos_anuncios(Request $request)
    {

        /** Vai mandar todos os anúncios existentes quando é carregada a pagina */

        $anuncios = anuncios::paginate($request->num); //get data from table

        $count = $anuncios->count();
        return view('layouts.cars', [
            'anuncios' => $anuncios,
            'count' => $count,
        ]);
    }




    public function filter(Request $request)
    {

        $filter = array();
        $count = 0;
        if ($request->marca != null) {
            $filter['id_marca'] = $request->marca;
            $count++;
        }
        if ($request->modelo != null) {
            $filter['id_modelo'] = $request->modelo;
            $count++;
        }
        if ($request->cor != null) {
            $filter['cor'] = $request->cor;
            $count++;
        }
        if ($request->combustivel != null) {
            $filter['combustivel'] = $request->combustivel;
            $count++;
        }
        if ($request->estado != null) {
            $filter['estado'] = $request->estado;
            $count++;
        }


        if ($request->preco != null && $request->quilometragem != null) { //preco + quilometragem
            $count += 2;
            if ($count > 2) {
                $anuncios = anuncios::where($filter)->whereRaw('preco <=' . $request->preco)->whereRaw('quilometragem <=' . $request->quilometragem)->paginate($request->num);
            } 
            else {
                $anuncios = anuncios::whereRaw('preco <=' . $request->preco)->whereRaw('quilometragem <=' . $request->quilometragem)->paginate($request->num);
            }
        }

        if ($request->preco != null && $request->quilometragem == null) {  //preco 
            $count++;
            if ($count > 1) {
                    $anuncios = anuncios::where($filter)->whereRaw('preco <=' . $request->preco)->paginate($request->num);
                }
                else {
                $anuncios = anuncios::whereRaw('preco <=' . $request->preco)->paginate($request->num);
                }
        }

        if ($request->preco == null && $request->quilometragem != null) { // quilometragem
            $count++;
            if ($count > 1) {
                $anuncios = anuncios::where($filter)->whereRaw('quilometragem <=' . $request->quilometragem)->paginate($request->num);
            }
            else {
                $anuncios = anuncios::whereRaw('quilometragem <=' . $request->quilometragem)->paginate($request->num);
            }
        }

        if ($request->preco == null && $request->quilometragem == null) {
            $anuncios = anuncios::where($filter)->paginate($request->num);
        }



        if ($request->filled('filtrar') && $count > 0) {

            $nr_encontrados = $anuncios->count();
            return view('layouts.cars', [
                'anuncios' => $anuncios,
                'count' => $nr_encontrados,
            ]);
        } 
        else {
            return $this->todos_anuncios($request);
        }
    }

    public function anuncios(Request $request)
    {
        if ($request->filled('filtrar')) {
            return $this->filter($request);
        }
        else {
            return $this->todos_anuncios($request);
        }
    }




    public static function findMarcasById($id)
    {
        $marcas = marcas::where('id_marca', '=', $id)->get();
        foreach ($marcas as $marca) {
            return $marca->nome;
        }
    }


    public static function grafico_preco(anuncios $anuncio)
    {
        $msg = DB::table('anuncios')
            ->where('id_marca', '=', $anuncio->id_marca)
            ->where('id_modelo', '=', $anuncio->id_modelo)
            ->get();
        $soma = 0;
        $contador = 0;
        foreach ($msg as $marca) {
            $soma += $marca->preco;
            $contador++;
        }
        $media = $soma / $contador;

        $max = DB::table('anuncios')
            ->where('id_marca', '=', $anuncio->id_marca)
            ->where('id_modelo', '=', $anuncio->id_modelo)
            ->max('preco');

        $min = DB::table('anuncios')
            ->where('id_marca', '=', $anuncio->id_marca)
            ->where('id_modelo', '=', $anuncio->id_modelo)
            ->min('preco');

        $array = array([
            0 => $min,
            1 => $max,
            2   => $media,
        ]);

        $array = array($media);


        return $array;
    }

    public static function min_preco(anuncios $anuncio)
    {
        $min = DB::table('anuncios')
            ->where('id_marca', '=', $anuncio->id_marca)
            ->where('id_modelo', '=', $anuncio->id_modelo)
            ->min('preco');

        $array = array($min);

        return $array;
    }

    public static function max_preco(anuncios $anuncio)
    {

        $max = DB::table('anuncios')
            ->where('id_marca', '=', $anuncio->id_marca)
            ->where('id_modelo', '=', $anuncio->id_modelo)
            ->max('preco');


        $array = array($max);


        return $array;
    }

    public static function total_preco(anuncios $anuncio)
    {

        $max = DB::table('anuncios')
            ->where('id_marca', '=', $anuncio->id_marca)
            ->where('id_modelo', '=', $anuncio->id_modelo)
            ->sum('preco');


        $array = array($max);


        return $array;
    }

    public static function returnMarcaId()
    {

        $marcas = DB::table('anuncios')->groupBy('id_marca')->having(DB::raw('count(id_marca)'), '>', 0)->get('id_marca', 'count');
        return ($marcas);
    }

    public static function countMarcas($id)
    {
        $count = DB::table('anuncios')->select()->where('id_marca', '=', $id)->count();
        return ($count);
    }

    public static function listAnuncios()
    {
        $anuncios = anuncios::all();
        return ($anuncios);
    }
}

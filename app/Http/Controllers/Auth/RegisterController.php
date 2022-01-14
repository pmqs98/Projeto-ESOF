<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\utilizadores;
use App\Models\concelhos;
use App\Models\freguesias;
use App\Models\distritos;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $max255 = 'max:255';
        return Validator::make($data, [
            'nome' => ['required', 'string', $max255],
            'apelido' => ['required', 'string', $max255],
            'email' => ['required', 'string', 'email', $max255, 'unique:utilizadores'],
            'telefone' => ['integer', 'min:9', 'unique:utilizadores'],
            'data_nascimento' => ['required', 'date'],
            'sexo' => ['required', 'string', 'max:1'],
            'tipovendedor' => ['required', 'string', 'max:15'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'id_freguesia' => ['required', 'string', 'max:150'],
            'foto_perfil' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:10240'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $request = request();
        $request->foto_perfil;

        $a = new utilizadores;
        $a->nome = $request->nome;
        $a->apelido = $request->apelido;
        $a->email = $request->email;
        $a->telefone = $request->telefone;
        $a->data_nascimento = $request->data_nascimento;
        $a->sexo = $request->sexo;
        $a->tipovendedor = $request->tipovendedor;
        $a->password = Hash::make($request->password);

        $val = explode("->", $request->id_freguesia);
        $freguesia_id = (int) $val[1];
        $a->id_freguesia = $freguesia_id;

        $a->admin = 0;
        $a->foto_perfil = "teste";
        $a->save();

        $dir = "utilizadoresImg";
        Storage::makeDirectory($dir . "/"  . $a['id']);
        $name = Storage::putFile($dir . "/" . $a['id'], $request->foto_perfil);
        $a->foto_perfil = $name;
        $a->save();

        return $a;

    }

    public static function findDistritos()
    {

        $distrito = distritos::orderBy('nome', 'asc')->get(); //get data from table
        //dd($distrito);
        //return view('findDistritos'); //sent data to view
        //return view('register'); //sent data to view~
        return ($distrito);
    }
    public static function  findConcelhos()
    {

        $concelhos = concelhos::orderBy('nome', 'asc')->get(); //get data from table
        //dd($distrito);
        //return view('findDistritos'); //sent data to view
        //return view('register'); //sent data to view~
        return ($concelhos);
        //if our chosen id and products table prod_cat_id col match the get first 100 data 

        //$request->id here is the id of our chosen option id
        //$data = concelhos::select('nome')->where('distrito', $request->nome)->get();
        // return response()->json($data); //then sent this data to ajax success
    }


    public static function findFreguesias()
    {

        $freguesias = freguesias::all(); //get data from table
        //dd($distrito);
        //return view('findDistritos'); //sent data to view
        //return view('register'); //sent data to view~
        return ($freguesias);
    }
}
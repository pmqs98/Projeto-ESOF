<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\utilizadores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UtilizadoresController extends Controller
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
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'apelido' => 'required',
            'email' => 'required',
            'telefone' => 'required',
            'data_nascimento' => 'required',
            'sexo' => 'required',
            'tipovendedor' => 'required',
            'admin' => 'required',
            'password' => 'required',
            'id_freguesia' => 'required',
            'foto_perfil' => 'required',
        ]);

        utilizadores::create($request->all());

        return redirect('/register')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\utilizadores  $utilizadores
     * @return \Illuminate\Http\Response
     */
    public function show(utilizadores $utilizadores)
    {
        return view('user.index', ['user' => $utilizadores]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\utilizadores  $utilizadores
     * @return \Illuminate\Http\Response
     */
    public function edit(utilizadores $utilizadores)
    {
        return view('Utilizadores.utilizadorDash', ['utilizadores' => $utilizadores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\utilizadores  $utilizadores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, utilizadores $utilizadores)
    {
        $max255 = 'max:255';
        $request->validate([
            'nome' => ['required', 'string', $max255],
            'apelido' => ['required', 'string', $max255],

            'data_nascimento' => ['required', 'date'],
            'sexo' => ['required', 'string', 'max:1'],
            'tipovendedor' => ['required', 'string', 'max:15'],

            'id_freguesia' => ['required', 'integer', 'max:3092'],
            'foto_perfil' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:10240'],
        ]);
        if ($request->hasFile('foto_perfil')) {

            $files = Storage::allFiles('utilizadoresImg/' . $utilizadores['id']);
            Storage::delete($files);
            $name = Storage::putFile('utilizadoresImg/' . $utilizadores['id'], $request['foto_perfil']);

            $utilizadores['foto_perfil'] = $name;
        }
        $utilizadores->update($request->only(['nome', 'apelido', 'data_nascimento', 'sexo', 'tipovendedor', 'id_freguesia']));

        return redirect('/dashboard')->with('success', 'Dados alterados com sucesso!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\utilizadores  $utilizadores
     * @return \Illuminate\Http\Response
     */
    public function updateemail(Request $request, utilizadores $utilizadores)
    {
        $max255 = 'max:255';
        $request->validate([
            'oldemail' => ['required', 'string', $max255],
            'nvemail' => ['required', 'string', $max255],
            'nvemailc' => ['required', 'string', $max255],
        ]);

        ///Se o email antigo for corretamente inserido
        if (strcmp($request['oldemail'], Auth::user()->email) == 0) {
            //Se os emails dos outros dois campos forem iguais
            if (strcmp($request['nvemail'], $request['nvemailc']) == 0) {

                $utilizadores->email = $request->nvemail;

                $utilizadores->save();


                return redirect('/dashboard')->with('success', 'Email alterado com sucesso!');
            } else {
                return redirect('/dashboard')->with('danger', 'Novo email e confirmação não são iguais!');
            }
        } else {
            return redirect('/dashboard')->with('danger', 'Email antigo errado!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\utilizadores  $utilizadores
     * @return \Illuminate\Http\Response
     */
    public function updatepassword(Request $request, utilizadores $utilizadores)
    {
        $max255 = 'max:255';
        $request->validate([
            'oldpass' => ['required', 'string', $max255],
            'nvpass' => ['required', 'string', $max255],
            'nvpassc' => ['required', 'string', $max255],
        ]);

        /// se as passwords derem match , testamos o novo campo
        if (Hash::check($request['oldpass'], Auth::user()->password)) {   //se tudo estiver certo no novo campo, alteramos
            if (strcmp($request['nvpass'], $request['nvpassc']) == 0) {
                $newpassword = Hash::make($request->nvpass);
                $utilizadores->password = $newpassword;

                $utilizadores->save();
                return redirect('/dashboard')->with('success', 'Password alterada com sucesso!');
            } else {
                return redirect('/dashboard')->with('danger', 'As novas passwords nao coincidem!');
            }
        } else {

            return redirect('/dashboard')->with('danger', 'Password antiga incorreta!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\utilizadores  $utilizadores
     * @return \Illuminate\Http\Response
     */
    public function destroy(utilizadores $utilizadores)
    {
        //
    }


    public static function findUserById($id)
    {
        $utilizador = DB::table('utilizadores')->where('id', '=', $id)->get();
        return ($utilizador);
    }


    public static function listUtilizadores()
    {
        $users = utilizadores::all();
        return ($users);
    }

    public function admin()
    {
        if (Auth::user()->admin == 1) {
            return view('admin.index');
        }
        return redirect('/dashboard');
    }
}

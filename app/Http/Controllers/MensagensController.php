<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\mensagens;
use App\Models\anuncios;
use App\Models\conversas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MensagensController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $max255 = 'max:255';
        $request->validate([
            'texto' => ['required', 'string', $max255],
            'id_recetor' => ['required', 'int', $max255],
            'id_anuncio' => ['required', 'int', $max255],
        ]);
        
        $data = $request ->all();
        $data['id_emissor'] = Auth::user()->id;
        $data['data'] = "2020/10/10";
        $data['fotos'] = "tste";
        $data['visto'] = 1;
        
        
        $checkconversa = DB::table('conversas')
        ->whereIn('id_recetor',[$data['id_recetor'],$data['id_emissor']])
        ->whereIn('id_emissor',[$data['id_recetor'],$data['id_emissor']])
        ->where('id_anuncio','=',$data['id_anuncio'])
        ->first();
        
        
        
        
        ///Senao existir conversa criamos, se existir adicionamos a mensagem nas mensagens
        if(empty($checkconversa)){
            
            $dados=array();
            
            $dados['id_emissor'] = Auth::user()->id;
            $dados['id_recetor'] = $data['id_recetor'];
            $dados['id_anuncio'] = $data['id_anuncio'];
            $conversa= conversas::create($dados);
            //apos a conversa criada , temos que atualizar o id_conversa nas mensagens
            $getconversa = DB::table('conversas')
            ->whereIn('id_recetor',[$data['id_recetor'],$data['id_emissor']])
            ->whereIn('id_emissor',[$data['id_recetor'],$data['id_emissor']])
            ->where('id_anuncio','=',$data['id_anuncio'])
            ->first();
            
            $data['id_conversa'] = $conversa->id_conversa;
            $t= mensagens::create($data);
            $pusher = new \Pusher(
                config('broadcasting.connections.pusher.key'),
                config('broadcasting.connections.pusher.secret'),
                config('broadcasting.connections.pusher.app_id'),
                config('broadcasting.connections.pusher.options')
            );
            // Your data that you would like to send to Pusher
            // Sending the data to channel: "test_channel" with "my_event" event
            $pusher->trigger( 'my-channel', 'my-event', $t);
            return redirect('/mensagens/show/'.$t->id_conversa);
        }else {

            ///Caso a conversa já exista , só atualizamos o campo do id_conversa na mensagem
            $getconversa = DB::table('conversas')
            ->whereIn('id_recetor',[$data['id_recetor'],$data['id_emissor']])
            ->whereIn('id_emissor',[$data['id_recetor'],$data['id_emissor']])
            ->where('id_anuncio','=',$data['id_anuncio'])
        ->first();
        
            $data['id_conversa'] = $getconversa->id_conversa;
            
            $t= mensagens::create($data);
            $pusher = new \Pusher(
                config('broadcasting.connections.pusher.key'),
                config('broadcasting.connections.pusher.secret'),
                config('broadcasting.connections.pusher.app_id'),
                config('broadcasting.connections.pusher.options')
            );
            // Your data that you would like to send to Pusher
            // Sending the data to channel: "test_channel" with "my_event" event
            $pusher->trigger( 'my-channel', 'my-event', $t);
            
            return redirect('/mensagens/show/'.$t->id_conversa);
        }


        
        

        
            
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mensagens  $mensagens
     * @return \Illuminate\Http\Response
     */
    public function show($mensagens)
    {   

        $msg = DB::table('mensagens')
            ->where('id_conversa','=',$mensagens)
        ->first();
        
        return view('Utilizadores.utilizadorConversa', [
            'mensagem' => $msg,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mensagens  $mensagens
     * @return \Illuminate\Http\Response
     */
    public function edit(mensagens $mensagens)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mensagens  $mensagens
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mensagens $mensagens)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mensagens  $mensagens
     * @return \Illuminate\Http\Response
     */
    public function destroy(mensagens $mensagens)
    {
        //
    }

    public static function findMensagemId()
    {   
       // $mensagem = mensagens::findOrFail(Auth::user()->id);
        ///o id que recebe como argumento é o id que é para excluir.

        $getconversa = DB::table('conversas')
        ->where('id_recetor','=',Auth::user()->id)
        ->orWhere('id_emissor','=',Auth::user()->id)
        ->get();
        return ($getconversa);
    }

    public static function countConversas($id)
    {   
        ///o id que recebe como argumento é o id que é para excluir.
        $mensagens = DB::table('conversas')
            ->select()
            ->where('id_anuncio','=',$id)
            ->count();
        return ($mensagens);
    }

    public static function findMensagensConversa($id)
    {   
        //vai buscar a 1º mensagem
        //carrega todas as mensagens da conversa com base na 1º mensagem
        

        $conversa = DB::table('mensagens')
        ->where('id_conversa','=',$id)
        ->get();
        
        return ($conversa);
    }
}

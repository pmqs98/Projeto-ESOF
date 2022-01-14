<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use Pusher\Laravel\Facades\Pusher;
use App\Events;
use App\Http\Controllers\UtilizadoresController;
use App\Http\Controllers\AnunciosController;
use App\Http\Controllers\MensagensController;
use App\Http\Controllers\FavoritosController;
use App\Http\Controllers\StripeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth'], function () {
    // User needs to be authenticated to enter here.
    Route::get('/dashboard/definicoes', function () {
        return view('Utilizadores.utilizadorDashDef');
    });

    Route::get('/dashboard/mensagens', function () {
        return view('Utilizadores.utilizadorDashMsg');
    });

    Route::get('/mensagens/show/{mensagens}', [MensagensController::class, 'show']);

    Route::get('/dashboard/edit/{utilizadores}', [UtilizadoresController::class, 'edit']);

    Route::get('/product', function () {
        return view('layouts.novoanuncio');
    });

    Route::get('/anuncios/edit/{anuncio}', [AnunciosController::class, 'edit']);

    Route::get('/anuncios/delete', [AnunciosController::class, 'delete']);

    Route::get('/anuncios/activate/{anuncio}', [AnunciosController::class, 'activate']);

    Route::post('/fav', [FavoritosController::class, 'store']);

    Route::get('/favoritos/remover', [FavoritosController::class, 'remove']);

    Route::get('/dashboard', function () {
        return view('Utilizadores.utilizadorDash');
    });

    Route::get('/dashboard/favoritos', function () {
        return view('Utilizadores.utilizadorFavoritos');
    });

    Route::get('/arquivos', function () {
        return view('Utilizadores.utilizadorDashArquivos');
    });

    Route::post('/dashboard/definicoes/update/{utilizadores}', [UtilizadoresController::class, 'update']);
    Route::post('/dashboard/definicoes/updateemail/{utilizadores}', [UtilizadoresController::class, 'updateemail']);
    Route::post('/dashboard/definicoes/updatepassword/{utilizadores}', [UtilizadoresController::class, 'updatepassword']);
    Route::post('/msg', [MensagensController::class, 'store']);
    Route::post('/anuncios/edit/{anuncio}', [AnunciosController::class, 'update']);
    Route::get('/chat', function () {
        return view('chat.index');
    });

    Route::get('/anuncios/show/{anuncio}', [AnunciosController::class, 'show']);


    Route::get('/admin', [UtilizadoresController::class, 'admin']);


    Route::get('/stripe-payment', [StripeController::class, 'handleGet']);
    Route::post('/stripe-payment', [StripeController::class, 'handlePost'])->name('stripe.payment');
});

Route::get('/', [AnunciosController::class, 'anuncios_home']);

Route::get('/about', function () {
    return view('layouts.about');
});

Route::get('/cars', [AnunciosController::class, 'anuncios']);




////Rotas Relativas aos Utilizadores














Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::post('/anuncios', [AnunciosController::class, 'store']);









//// chat

Route::get('/test', function () {
    // New Pusher instance with our config data
    $pusher = new \Pusher(
        config('broadcasting.connections.pusher.key'),
        config('broadcasting.connections.pusher.secret'),
        config('broadcasting.connections.pusher.app_id'),
        config('broadcasting.connections.pusher.options')
    );



    // Your data that you would like to send to Pusher
    $data = ['text' => 'hello world from Laravel 5.3'];

    // Sending the data to channel: "test_channel" with "my_event" event
    $pusher->trigger('my-channel', 'my-event', $data);

    return 'ok';
});

@extends('layouts.app')

@section('content')

<div class="row">
    @forelse($utilizadores as $utilizadores) {
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nome:</strong>
            {{ $utilizadores->nome }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Apelido:</strong>
            {{ $utilizadores->apelido }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $utilizadores->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Telefone:</strong>
            {{ $utilizadores->telefone }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Data de nascimento:</strong>
            {{ $utilizadores->data_nascimento }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Sexo:</strong>
            {{ $utilizadores->sexo }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Tipo de vendedor:</strong>
            {{ $utilizadores->tipovendedor }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Foto:</strong>
            {{ $utilizadores->foto_perfil }}
        </div>
    </div>
    }
    @empty
    <h5 class="text-center">No Students Found!</h5>
    @endforelse
</div>
@endsection
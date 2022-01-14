<!DOCTYPE html>
<html lang="en">

    
    <head>
        
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="/resources/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    
    <body class="sb-nav-fixed">
        
        @include('includes.header-admin')
                <div class="container-fluid" style="margin-top: 55px;">
                    <h1 class="mt-4">Tabelas</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tabelas</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <em class="fas fa-table mr-1"></em>
                            Tabela de utilizadores
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th id=1>Id</th>
                                            <th id=1>Nome</th>
                                            <th id=1>Apelido</th>
                                            <th id=1>Email</th>
                                            <th id=1>Telefone</th>
                                            <th id=1>Sexo</th>
                                            <th id=1>Tipo de vendedor</th>
                                            <th id=1>Foto de perfil</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th id=1>Id</th>
                                            <th id=1>Nome</th>
                                            <th id=1>Apelido</th>
                                            <th id=1>Email</th>
                                            <th id=1>Telefone</th>
                                            <th id=1>Sexo</th>
                                            <th id=1>Tipo de vendedor</th>
                                            <th id=1>Foto de perfil</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach(App\Http\Controllers\UtilizadoresController::listUtilizadores() as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->nome}}</td>
                                            <td>{{$user->apelido}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->telefone}}</td>
                                            <td>{{$user->sexo}}</td>
                                            <td>{{$user->tipovendedor}}</td>
                                            <td><a target="_blank" href="/storage/app/{{$user->foto_perfil}}"><img src="/storage/app/{{$user->foto_perfil}}" class="rounded-circle z-depth-2" style="height: 50px;width: 50px;padding: 5px;"> </a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <em class="fas fa-table mr-1"></em>
                            Lista dos anúncios
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th id=2>Id</th>
                                            <th id=2>Id Utilizador</th>
                                            <th id=2>Marca</th>
                                            <th id=2>Modelo</th>
                                            <th id=2>Preço (€)</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th id=2>Id</th>
                                            <th id=2>Id Utilizador</th>
                                            <th id=2>Marca</th>
                                            <th id=2>Modelo</th>
                                            <th id=2>Preço (€)</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach(App\Http\Controllers\AnunciosController::listAnuncios() as $anuncios)
                                        <tr>
                                            <td> {{$anuncios->id_anuncio}} </td>
                                            <td> {{$anuncios->id_utilizador}} </td>

                                            @foreach(App\Http\Controllers\MarcasController::findMarcasById($anuncios->id_marca) as $marca)
                                            <td> {{$marca->nome}} </td>
                                            @endforeach

                                            @foreach(App\Http\Controllers\ModelosController::findModeloById($anuncios->id_modelo) as $modelo)
                                            <td> {{$modelo->nome}} </td>
                                            @endforeach

                                            <td> {{$anuncios->preco}} </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/resources/admintheme/js/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="/resources/admintheme/assets/demo/datatables-demo.js"></script>
</body>

</html>
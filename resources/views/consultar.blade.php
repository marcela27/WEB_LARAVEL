<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema WEB - Consulta</title>
    @vite([
        'resources/js/app.js',
        'resources/css/app.css',
        'node_modules/bootstrap/dist/css/bootstrap.min.css',
        'node_modules/bootstrap/dist/js/bootstrap.bundle.js'
    ])
</head>
<body>
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary col-12 px-3">
                <a class="navbar-brand" href="#">SISTEMA WEB</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Cadastrar</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="agendamento">Consultar</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="row">
            <div class="card mb-3 col-12">
                <div class="card-body">
                    <h5 class="card-title">Consultar - Agendamento de Potenciais Clientes</h5>
                    <p class="card-text">Consulte aqui os agendamentos cadastrados.</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Origem</th>
                                <th scope="col">Data do Contato</th>
                                <th scope="col">Observação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agendamentos as $agendamento)
                                <tr>
                                    <th scope="row">{{ $agendamento->id }}</th>
                                    <td>{{ $agendamento->nome }}</td>
                                    <td>{{ $agendamento->telefone }}</td>
                                    <td>{{ $agendamento->origem }}</td>
                                    <td>{{ (new DateTime($agendamento->data_contato))->format('d/m/Y') }}</td>
                                    <td>{{ $agendamento->observacao }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
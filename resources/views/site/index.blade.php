<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="shortcut icon" href="{!! asset('img/favicon-laravel.png') !!}" type="image/x-icon">
    <link rel="stylesheet" href="{!! url(mix('site/css/style.css')) !!}">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <title>Laravel CRUD</title>
</head>
<body>
    <div class="container mt-4 py-3">
        <h1 class="text-center text-light" style="opacity: 0;">Escolha um projeto:</h1>
        <hr class="bg-light my-4">
        <div class="row mt-3 text-center">
            <div class="col-md-6">
                <h2 class="my-4 text-light" style="opacity: 0;">
                  <i class="fa fa-clipboard-list"></i> first-laravel-crud</h2>
                <div class="row justify-content-center mt-3">
                    <div class="card" style="width: 18rem; opacity: 0;">
                        <div class="card-body">
                          <h5 class="card-title">Meu primeiro sistema web utilizando o Laravel</h5>
                          <h6 class="card-subtitle mb-2 text-muted">O projeto consiste em criar 4 tabelas relacionadas, sendo uma delas uma tabela pivot.</h6>
                          <p class="card-text">Você pode acessar o repositório para obter mais detalhes. Ou você pode acessar a aplicação e realizar testes.</p>
                          <a href="https://github.com/SamuelNunesDev/first-laravel-crud" target="_blank" class="card-link">
                            <i class="fa fa-code-branch"></i> Repositório
                          </a>
                          <a href="https://first-laravel-crud01.herokuapp.com/bonds" class="card-link">
                            <i class="fa fa-server mr-1"></i> Aplicação
                          </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="my-4 text-light" style="opacity: 0;">
                  <i class="fa fa-clipboard-list"></i> laravel-crud</h2>
                <div class="row justify-content-center mt-3">
                    <div class="card" style="width: 18rem; opacity: 0;">
                        <div class="card-body">
                          <h5 class="card-title">Segunda versão do "primeiro projeto"</h5>
                          <h6 class="card-subtitle mb-2 text-muted">A segunda versão foi desenvolvida 4 meses após a primeira, o intuito é comparar a estrutura do código e a usabilidade do sistema.</h6>
                          <p class="card-text">Segue os links do repositório e da aplicação, respectivamente.</p>
                          <a href="https://github.com/SamuelNunesDev/laravel-crud" target="_blank" class="card-link">
                            <i class="fa fa-code-branch"></i> Repositório
                          </a>
                          <a href="{!! route('bonds.index') !!}" class="card-link">
                            <i class="fa fa-server mr-1"></i> Aplicação
                          </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="bg-light mt-5">
    </div>
    <script src="{!! url(mix('site/js/script.js')) !!}"></script>
</body>
</html>
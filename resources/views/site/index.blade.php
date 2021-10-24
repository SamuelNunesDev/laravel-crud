<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{!! asset('img/favicon-laravel.png') !!}" type="image/x-icon">
    <link rel="stylesheet" href="{!! url(mix('site/css/style.css')) !!}">
    <title>Laravel CRUD</title>
</head>
<body class="bg-success">
    <div class="container">
        <h1 class="text-center text-light mt-5" style="opacity: 0;">Escolha um projeto:</h1>
        <hr>
        <div class="row mt-3 text-center">
            <div class="col-md-6">
                <h2 class="my-3 text-light" style="opacity: 0;">first-laravel-crud</h2>
                <div class="row justify-content-center mt-3">
                    <div class="card" style="width: 18rem; opacity: 0;">
                        <div class="card-body">
                          <h5 class="card-title">Meu primeiro sistema web utilizando o Laravel</h5>
                          <h6 class="card-subtitle mb-2 text-muted">A idéia do projeto é criar 4 tabelas relacionadas, sendo uma delas uma tabela pivot.</h6>
                          <p class="card-text">Você pode acessar o repositório para obter mais detalhes. Ou você pode acessar a aplicação e realizar testes.</p>
                          <a href="https://github.com/SamuelNunesDev/first-laravel-crud" target="_blank" class="card-link">Repositório</a>
                          <a href="https://first-laravel-crud01.herokuapp.com/bonds" class="card-link">Aplicação</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="my-3 text-light" style="opacity: 0;">laravel-crud</h2>
                <div class="row justify-content-center mt-3">
                    <div class="card" style="width: 18rem; opacity: 0;">
                        <div class="card-body">
                          <h5 class="card-title">Segunda versão do "primeiro projeto"</h5>
                          <h6 class="card-subtitle mb-2 text-muted">A segunda versão foi desenvolvida 4 meses após a primeira, o intuito é comparar a estrutura do código e a usabilidade do sistema.</h6>
                          <p class="card-text">Segue os links do repositório e da aplicação, respectivamente.</p>
                          <a href="https://github.com/SamuelNunesDev/laravel-crud" target="_blank" class="card-link">Repositório</a>
                          <a href="#" class="card-link">Aplicação</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <script src="{!! url(mix('site/js/script.js')) !!}"></script>
</body>
</html>
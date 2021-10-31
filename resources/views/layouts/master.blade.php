<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="shortcut icon" href="{!! asset('img/favicon-laravel.png') !!}" type="image/x-icon">
    <link rel="stylesheet" href="{!! url(mix('layouts/css/style.css')) !!}">

    @yield('styles')

    <title>{!! $title !!} CRUD</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-dark py-0 px-0 shadow">
    <a class="navbar-brand col-3 text-center px-4" href="#" id="brand-logo">
      <div class="row">
        <div class="col mt-2">
          <img class="pb-3" src="{!! asset('layouts/img/laravel-logo.png') !!}" width="50px" height="50px" alt="logo do laravel">
          <span class="pl-2 font-title text-danger">{!! $title !!}</span> 
        </div>
      </div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto text-center">
        <li class="nav-item">
          <a class="nav-link d-block py-2 px-4 btn text-secondary" id="nav-links" href="{!! route('site.index') !!}">
            <i class="fa fa-home"></i> Home 
          </a>
        </li>
        <li class="nav-item">
          <a id="nav-link-vinculos" class="nav-link d-block py-2 px-4 btn {!! $title == 'Vinculos' ? 'text-danger' : 'text-secondary' !!}" href="{!! route('bonds.index') !!}">
            <i class="fa fa-link"></i> Vinculos
          </a>
        </li>
        <li class="nav-item">
          <a id="nav-link-funcionarios" class="nav-link d-block py-2 px-4 btn {!! $title == 'Funcionarios' ? 'text-danger' : 'text-secondary' !!}" href="{!! route('employees.index') !!}">
            <i class="fa fa-user"></i> Funcionarios
          </a>
        </li>
        <li class="nav-item">
          <a id="nav-link-cargos" class="nav-link d-block py-2 px-4 btn {!! $title == 'Cargos' ? 'text-danger' : 'text-secondary' !!}" href="{!! route('positions.index') !!}">
            <i class="fa fa-briefcase"></i> 
            Cargos
          </a>
        </li>
        <li class="nav-item">
          <a id="nav-link-empresas" class="nav-link d-block py-2 px-4 btn {!! $title == 'Empresas' ? 'text-danger' : 'text-secondary' !!}" href="{!! route('companies.index') !!}">
            <i class="fa fa-building"></i> Empresas
          </a>
        </li>
      </ul>
    </div>
  </nav>
  
  @include('layouts.components.alert')

  <main class="container bg-light rounded shadow py-4">
    <h1 class="text-center mb-3">
      <i class="fa fa-table"></i> Tabela {!! $title !!}
    </h1>
    <hr>
    
    @yield('content')

  </main>
  <script src="{!! url(mix('layouts/js/script.js')) !!}"></script>
  
  @yield('scripts')

</body>
</html>

<?php

use App\Http\Controllers\CargoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\VinculoController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('site.index');
});

Route::resource('funcionarios', FuncionarioController::class)->parameters(['funcionarios' => 'employee'])->names('employees');

Route::resource('cargos', CargoController::class)->parameters(['cargos' => 'position'])->names('positions');

Route::resource('empresas', EmpresaController::class)->parameters(['empresas' => 'company'])->names('companies');

Route::resource('vinculos', VinculoController::class)->parameters(['vinculos' => 'bond'])->names('bonds');
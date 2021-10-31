<?php

use App\Http\Controllers\PositionController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\BondController;
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
})->name('site.index');

// Funcionarios
Route::resource('funcionarios', EmployeeController::class)->parameters(['funcionarios' => 'employee'])->names('employees');
Route::post('ativa-funcionario/{employee}', 'App\Http\Controllers\EmployeeController@activateEmployee');

// Cargos
Route::resource('cargos', PositionController::class)->parameters(['cargos' => 'position'])->names('positions');
Route::post('ativa-cargo/{position}', 'App\Http\Controllers\PositionController@activatePosition');

// Empresas
Route::resource('empresas', CompanyController::class)->parameters(['empresas' => 'company'])->names('companies');
Route::post('ativa-empresa/{company}', 'App\Http\Controllers\CompanyController@activateCompany');

// Vinculos
Route::resource('vinculos', BondController::class)->parameters(['vinculos' => 'bond'])->names('bonds');
Route::get('info-vinculo/{bond}', 'App\Http\Controllers\BondController@returnBondInfo');
Route::post('ativa-vinculo/{bond}', 'App\Http\Controllers\BondController@activateBond');


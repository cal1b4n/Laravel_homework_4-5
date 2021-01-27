<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
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
    return redirect('/companies');
});

Route::resource('companies', CompaniesController::class, ['except' => ['show']]);
Route::resource('employees', EmployeesController::class, ['except' => ['show']]);
// AJAX LINKS
ROUte::get('/companies-list', '\App\Http\Controllers\CompaniesController@GetAllCompaniesJson');
ROUte::get('/employees-list', '\App\Http\Controllers\EmployeesController@GetAllEmployeesJson');

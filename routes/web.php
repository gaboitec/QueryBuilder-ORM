<?php

use Illuminate\Support\Facades\Route;
//Usar el controllador donde se ingresan los registros
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

//ruta para insertar los registros
Route::get('/insertar-registros', [UserController::class, 'insertarRegistros']);

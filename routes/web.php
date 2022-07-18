<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\SupplierController;
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

//No voy a emilinar la vista welcome para que tengan un ejemplo
Route::get('/ejemplo', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('index');
});

Route::resource('gastos', BillController::class);
Route::resource('chofer', DriverController::class);
Route::resource('cliente', ClientController::class);
Route::resource('proveedor', SupplierController::class);
Route::resource('vehiculo', VehicleController::class);
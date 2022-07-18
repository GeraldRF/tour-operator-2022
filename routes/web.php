<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\BillReportController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommisionReportController;
use App\Http\Controllers\ConfirmationEmailSentController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ServiceReportController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReservationController;
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
Route::resource('servicio', ServiceController::class);
Route::resource('reservacion', ReservationController::class);
Route::resource('reporte-gastos', BillReportController::class);
Route::resource('reporte-servicios', ServiceReportController::class);
Route::resource('reporte-comisiones', CommisionReportController::class);
Route::post('enviar-correo-confirmacion', [ConfirmationEmailSentController::class, 'store']);
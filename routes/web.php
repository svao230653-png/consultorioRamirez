<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\BackupController;



Route::get('/', function () {
    $apiKey = config('services.google_maps.key');

    $latitud = 18.9454243;
    $longitud = -99.2301193;
    $direccion = 'Herradura de Plata 35, Cuernavaca, Morelos';

    return view('panel-general', compact('apiKey', 'latitud', 'longitud', 'direccion'));
})->name('inicio');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/registro', [AuthController::class, 'registerForm'])->name('registro');
Route::post('/registro', [AuthController::class, 'register'])->name('registro.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/ubicacion', [UbicacionController::class, 'index'])->name('ubicacion');



Route::middleware(['sesion'])->group(function () {

    Route::get('/panel', [AuthController::class, 'panel'])->name('panel');

   
    Route::get('/panel/admin', function () {
        return view('paneles.admin');
    })->name('panel.admin');

    Route::get('/panel/asistente', function () {
        return view('paneles.asistente');
    })->name('panel.asistente');

    Route::get('/panel/doctor', function () {
        return view('paneles.doctor');
    })->name('panel.doctor');

   
    Route::resource('pacientes', PacienteController::class);
    Route::resource('citas', CitaController::class);
    
   Route::middleware(['admin'])->group(function () {

    Route::resource('usuarios', UserController::class);
    Route::post('/usuarios/{id}/enviar-aviso',[UserController::class, 'enviarAviso'])->name('usuarios.enviarAviso');

    Route::get('/admin/backup', [BackupController::class, 'index']);
    Route::get('/admin/backup/create', [BackupController::class, 'backup']);
    Route::post('/admin/backup/restore', [BackupController::class, 'restore']);
});
});
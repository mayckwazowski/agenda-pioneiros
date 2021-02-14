<?php
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ExtraController;
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

Route::get('/', [AgendaController::class, 'index']);
Route::post('/confirmacao', [AgendaController::class, 'store']);
Route::get('/vagas-extras', [ExtraController::class, "vagas"]);
Route::get('/lista-agendamentos', [ExtraController::class, "listaAgendamentos"]);

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TarefaController;

use App\Mail\MessagemTesteMail;
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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::resource('tarefa', TarefaController::class)->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('tarefa', TarefaController::class);

Route::get('messagem-teste', function(){
    //return new MessagemTesteMail();
    Mail::to('felipesilva40026922@gmail.com')->send( new MessagemTesteMail);
    return 'E-mail enviado com sucesso!';
});


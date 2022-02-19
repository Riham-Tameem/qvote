<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\VoteController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




//Route::get('/index', function () {
//    return view('dashboard.main');
//});
//Route::get('/login', function () {
//    return view('dashboard.auth.admin-login');
//});

//Route::get('/votes', [App\Http\Controllers\Admin\VoteController::class, 'index'])->name('index');
//Route::get('/createVote', [App\Http\Controllers\Admin\VoteController::class, 'create']);


Route::middleware('auth')->group( function () {
Route::post('/saveVote', [App\Http\Controllers\Admin\VoteController::class, 'add']);
Route::get('/options/{id}/index', [OptionController::class, 'index'])->name('options.index');
Route::get('/createOption', [OptionController::class, 'create'])->name('options.create');
Route::post('/save', [OptionController::class, 'save'])->name('options.store');
Route::get('/options/{id}/edit', [OptionController::class, 'edit'])->name('options.edit');
Route::put('/options/{id}', [OptionController::class, 'update'])->name('options.update');
Route::delete('options/{id}/delete',[OptionController::class,'delete'])->name('options.delete');
Route::delete('vote/delete/{id}',[VoteController::class,'destroy'])->name('vote.delete');
Route::resource('votes',VoteController::class);
});
//Route::get('/crate/vote', [VoteController::class, 'create'])->name('vote.create');
/*
Route::get('/create/vote', function () {
    return view('dashboard.vote.create');
});
*/

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

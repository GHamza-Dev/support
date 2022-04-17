<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TicketController;
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

Route::prefix('admin')->group(function(){
    Route::get('/login',[AdminController::class,'index'])->name('login_form');
    Route::post('/login/owner',[AdminController::class,'login'])->name('admin.login');
    Route::get('/dashboard',[AdminController::class,'dashboard'])
                ->name('admin.dashboard')->middleware('admin');
    Route::get('/logout',[AdminController::class,'logout'])
                ->name('admin.logout')->middleware('admin');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// --> User: ticket

Route::prefix('ticket')->group(function(){
    Route::get('/create',[TicketController::class,'create'])->name('create.ticket');
});

require __DIR__.'/auth.php';

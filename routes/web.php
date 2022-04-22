<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

// --> User: ticket

Route::prefix('ticket')->group(function(){
    Route::get('/index',[TicketController::class,'index'])->middleware('auth')->name('ticket.all');
    Route::post('/index',[TicketController::class,'index'])->middleware(['auth'])->name('search.ticket');
    Route::get('/create',[TicketController::class,'create'])->middleware(['auth'])->name('create.ticket');
    Route::get('/show/{id}',[TicketController::class,'show'])->middleware(['auth'])->name('show.ticket');
    Route::post('/store',[TicketController::class,'store'])->middleware(['auth'])->name('store.ticket');
    Route::get('/solve/{id}',[TicketController::class,'solve'])->middleware(['auth'])->name('solve.ticket');
    Route::get('/close/{id}',[TicketController::class,'close'])->middleware(['auth'])->name('close.ticket');
    Route::get('/all',[TicketController::class,'getAllTickets'])->middleware(['auth'])->name('admin.tickets');
    Route::post('/all',[TicketController::class,'getAllTickets'])->middleware(['auth'])->name('admin.search');
});

// --> Answer:

Route::prefix('answer')->group(function(){
    Route::post('/store',[AnswerController::class,'store'])->middleware(['auth'])->name('add.answer');
});

// --> Service:

Route::prefix('service')->group(function(){
    Route::get('/index',[ServiceController::class,'index'])->middleware(['auth'])->name('services.all');
    Route::post('/store',[ServiceController::class,'store'])->middleware(['auth'])->name('services.add');
    Route::get('/remove/{id}',[ServiceController::class,'remove'])->middleware(['auth'])->name('services.remove');
});

// --> User:

Route::prefix('user')->group(function(){
    Route::get('/index',[UserController::class,'index'])->middleware(['auth'])->name('users.all');
    Route::get('/destroy/{id}',[UserController::class,'destroy'])->middleware(['auth'])->name('users.remove');
});

// --> User: Logout

Route::get('/logout',function(Request $request){
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
})->name('user.logout');

require __DIR__.'/auth.php';

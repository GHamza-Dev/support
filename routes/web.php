<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AnswerController;
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

Route::prefix('admin')->group(function(){
    Route::get('/login',[AdminController::class,'index'])->name('login_form');
    Route::post('/login/owner',[AdminController::class,'login'])->name('admin.login');
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout',[AdminController::class,'logout'])->name('admin.logout')->middleware('admin');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// --> User: ticket

Route::prefix('ticket')->group(function(){
    Route::get('/index',[TicketController::class,'index'])->middleware(['auth'])->name('ticket.all');
    Route::get('/create',[TicketController::class,'create'])->middleware(['auth'])->name('create.ticket');
    Route::get('/show/{id}',[TicketController::class,'show'])->middleware(['auth'])->name('show.ticket');
    Route::post('/store',[TicketController::class,'store'])->middleware(['auth'])->name('store.ticket');
    Route::get('/solve/{id}',[TicketController::class,'solve'])->middleware(['auth'])->name('solve.ticket');
    Route::get('/close/{id}',[TicketController::class,'close'])->middleware(['auth'])->name('close.ticket');
    Route::post('/search',[TicketController::class,'search'])->middleware(['auth'])->name('search.ticket');
});

// --> Answer:

Route::prefix('answer')->group(function(){
    Route::post('/store',[AnswerController::class,'store'])->middleware(['auth'])->name('add.answer');
});

// --> User: Logout

Route::get('/logout',function(Request $request){
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
})->name('user.logout');

require __DIR__.'/auth.php';

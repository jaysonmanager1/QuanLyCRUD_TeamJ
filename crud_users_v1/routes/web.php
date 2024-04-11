<?php

use App\Http\Controllers\CrudUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('dashboard', [CrudUserController::class, 'dashboard']);

Route::get('login', [CrudUserController::class, 'login'])->name('login');

Route::get('signout', [CrudUserController::class, 'signOut'])->name('signout');

Route::get('registration', [CrudUserController::class, 'registration'])->name('user.registration');

Route::get('/', function () {
    return view('login');
});

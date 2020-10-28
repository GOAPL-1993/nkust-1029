<?php

use App\Http\Controllers\MainController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", [MainController::class, 'index']);
Route::get("/member-only/", [MainController::class, 'member'])->middleware("auth");
Route::get("/logout/", [MainController::class, 'logout']);
Route::get('login/github', [MainController::class, 'redirectToProvider']);
Route::get('login/github/callback', [MainController::class, 'handleProviderCallback']);
Route::get('/test/', function () {
    return "Hello test";
})->middleware('auth.basic');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

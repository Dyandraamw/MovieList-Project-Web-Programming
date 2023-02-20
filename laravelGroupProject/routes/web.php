<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieDataController;
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
//     return view('login');
// });
Route::get('/', [MovieDataController::class, 'home']);
Route::get('/showMovie', [MovieDataController::class, 'showMovie']);
Route::get('/admin/addActor', [ActorController::class, 'addActor'])->middleware('security');
Route::post('/admin/addActor', [ActorController::class, 'storeActor'])->middleware('security');
Route::get('/admin/addMovie', [MovieDataController::class, 'addMovie'])->middleware('security');
Route::post('/admin/addMovie', [MovieDataController::class, 'storeMovie'])->middleware('security');
Route::get('/actors', [ActorController::class, 'showActors']);

Route::get('/actorDetail/{id}', [ActorController::class, 'showDetail']);
Route::get('/movieDetail/{id}', [MovieDataController::class, 'showDetail']);


Route::get('/editActor/{id}', [ActorController::class, 'editActor'])->name('editActor')->middleware('security');
Route::post('/editform', [ActorController::class, 'editform'])->name('editform')->middleware('security');

Route::get('/editMovie/{id}', [MovieDataController::class, 'editMovie'])->name('editMovie')->middleware('security');
Route::post('/editformM', [MovieDataController::class, 'editform'])->name('editformM')->middleware('security');



Route::get('/login', [AuthController::class, 'loginPage']);
Route::post('/register', [AuthController::class, 'regisAction']);
Route::get('/register', [AuthController::class, 'registerPage']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::post('/editformP', [AuthController::class, 'editformP'])->name('editformP');
Route::get('/editProfile', [AuthController::class, 'editProfile'])->name('editProfile');

Route::delete('/deleteActor/{id}', [ActorController::class, 'deleteActor'])->name('deleteActor')->middleware('security');
Route::delete('/deleteMovie/{id}', [MovieDataController::class, 'deleteMovie'])->name('deleteMovie')->middleware('security');

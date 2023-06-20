<?php

use App\Http\Controllers\TrucksController;
use App\Http\Controllers\TruckSubunitsController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [TrucksController::class, 'index']);
// Route::get('/newTruck', [TrucksController::class, 'newTruck']);
// Route::post('/newTruck', [TrucksController::class, 'store']);
// // Route::delete('/{id}', [TrucksController::class, 'destroy']);
// Route::get('/editTruck', [TrucksController::class, 'edit']);
// Route::post('/editTruck/{id}', [TrucksController::class, 'update'])->where('id', '[0-9]+');

Route::get('/', [TrucksController::class, 'index']);
Route::get('/newTruck', [TrucksController::class, 'newTruck']);
Route::post('/newTruck', [TrucksController::class, 'store']);
Route::get('/editTruck/{id}', [TrucksController::class, 'edit']);
Route::put('updateTruck/{id}', [TrucksController::class, 'update']);
Route::get('deleteTruck/{id}', [TrucksController::class, 'destroy']);
// Route::get('singleTruck/{id}', [TrucksController::class, 'show']);
Route::get('/newSubunit', [TruckSubunitsController::class, 'create']);
Route::post('/newSubunit', [TruckSubunitsController::class, 'store']);




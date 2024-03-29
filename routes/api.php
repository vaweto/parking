<?php

use App\Http\Controllers\Api\V1\Auth;
use App\Http\Controllers\Api\V1\ParkingZoneController;
use App\Http\Controllers\Api\V1\TicketController;
use App\Http\Controllers\Api\V1\VehicleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth/register', Auth\RegisterController::class);
Route::post('auth/login', Auth\LoginController::class);

Route::middleware('auth:sanctum')->group(function () {
    #Profile
    Route::get('profile', [Auth\ProfileController::class, 'show']);
    Route::put('profile', [Auth\ProfileController::class, 'update']);
    Route::put('password', Auth\UpdatePasswordController::class);
    Route::post('auth/logout', Auth\LogoutController::class);

    #Vehicle
    Route::apiResource('vehicles', VehicleController::class);

    #ParkingZones
    Route::get('/parking_zones', [ParkingZoneController::class, 'index']);

    #Ticket
    Route::get('/tickets', [TicketController::class, 'index']);
    Route::get('/tickets/{ticket}', [TicketController::class, 'show']);
    Route::post('/tickets', [TicketController::class, 'store']);
    Route::put('/tickets/{ticket}', [TicketController::class, 'update']);

    Route::put('/tickets/{ticket}/stop', [TicketController::class, 'stop']);
});



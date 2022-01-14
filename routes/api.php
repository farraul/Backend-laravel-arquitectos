<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArchitectController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



//Registro
Route::post('newUser', [AuthController::class, "userRegister"]);
//login
Route::post('loginUser', [AuthController::class, "userLogin"]);
//Users

Route::middleware('auth:api')->group(function(){

Route::get('Users', [UserController::class, "showAllUsers"]);
Route::get('User/{id}', [UserController::class, "UsersByID"]);
Route::put('User/{id}', [UserController::class, "UpdateUsers"]);
Route::put('UserMoney/{id}', [UserController::class, "UpdateUsersMoney"]);
Route::delete('User/{id}', [UserController::class, "DeleteUsers"]);

//Leads
Route::post('newLead', [LeadController::class, "addLead"]);
Route::get('Lead/{id}', [LeadController::class, "LeadsByID"]);
Route::get('Leads', [LeadController::class, "showAllLeads"]);
Route::get('Leads_filter', [LeadController::class, "showAllLeads_with_filter"]);
Route::put('Lead/{id}', [LeadController::class, "UpdateLeads"]);
Route::delete('Lead/{id}', [LeadController::class, "DeleteLeads"]);


//architect
Route::post('newArchitect', [ArchitectController::class, "addArchitect"]);
Route::get('Architect/{id}', [ArchitectController::class, "ArchitectByID"]);
Route::get('Architect', [ArchitectController::class, "showAllArchitect"]);
Route::put('Architect/{id}', [ArchitectController::class, "UpdateArchitect"]);
Route::delete('Architect/{id}', [ArchitectController::class, "DeleteArchitect"]);

//reserve
Route::post('newReserve', [ReserveController::class, "addReserve"]);
Route::get('Reserves', [ReserveController::class, "showAllReserves"]);
Route::get('Reserve/{id}', [ReserveController::class, "ReserveByID"]);
Route::delete('Reserve/{id}', [ReserveController::class, "DeleteReserve"]);

Route::post('Reservesunion', [ReserveController::class, "Reserveunion"]);





});

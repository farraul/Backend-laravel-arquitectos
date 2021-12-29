<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArchitectController;
use App\Http\Controllers\LeadController;
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

Route::get('Users', [UserController::class, "showAllUsers"]);
Route::get('User/{id}', [UserController::class, "UsersByID"]);
Route::put('User/{id}', [UserController::class, "UpdateUsers"]);
Route::delete('User/{id}', [UserController::class, "DeleteUsers"]);

//Leads
Route::post('newLead', [LeadController::class, "addLead"]);
Route::get('Lead/{id}', [LeadController::class, "LeadsByID"]);
Route::get('Leads', [LeadController::class, "showAllLeads"]);
Route::put('Lead/{id}', [LeadController::class, "UpdateLeads"]);
Route::delete('Lead/{id}', [LeadController::class, "DeleteLeads"]);





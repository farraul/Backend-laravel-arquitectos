<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
https://api-laravel-arquitectos.herokuapp.com/
</p>

<div align="center">
    
| Tecnologias |Seguridad|   BDDD|  Servidor |
| :---     |   :---   | :---     |  :---  |
| Laravel  | Passport | Mysql    | Heroku |
|PHP       | 
|Composer  |
|PHP       |  
    
</div>




##  ⏺ Relaciones entre las tablas de la BBDD

<br>

<div align="center">
    
![image](https://user-images.githubusercontent.com/28491001/149351860-2cf1d2b8-0ed7-4d66-bfed-fba08324bf15.png)
    
</div>

##  ⏺ Endpoints de la API


### Registro
Route::post('newUser', [AuthController::class, "userRegister"]);
### Login
Route::post('loginUser', [AuthController::class, "userLogin"]);


### Users

Route::get('Users', [UserController::class, "showAllUsers"]);

Route::get('User/{id}', [UserController::class, "UsersByID"]);

Route::put('User/{id}', [UserController::class, "UpdateUsers"]);

Route::put('UserMoney/{id}', [UserController::class, "UpdateUsersMoney"]);

Route::delete('User/{id}', [UserController::class, "DeleteUsers"]);

### Leads
Route::post('newLead', [LeadController::class, "addLead"]);

Route::get('Lead/{id}', [LeadController::class, "LeadsByID"]);

Route::get('Leads', [LeadController::class, "showAllLeads"]);

Route::get('Leads_filter', [LeadController::class, "showAllLeads_with_filter"]);

Route::put('Lead/{id}', [LeadController::class, "UpdateLeads"]);

Route::delete('Lead/{id}', [LeadController::class, "DeleteLeads"]);


### Architectos
Route::post('newArchitect', [ArchitectController::class, "addArchitect"]);

Route::get('Architect/{id}', [ArchitectController::class, "ArchitectByID"]);

Route::get('Architect', [ArchitectController::class, "showAllArchitect"]);

Route::put('Architect/{id}', [ArchitectController::class, "UpdateArchitect"]);

Route::delete('Architect/{id}', [ArchitectController::class, "DeleteArchitect"]);

### Reservas
Route::post('newReserve', [ReserveController::class, "addReserve"]);

Route::get('Reserves', [ReserveController::class, "showAllReserves"]);

Route::get('Reserve/{id}', [ReserveController::class, "ReserveByID"]);

Route::delete('Reserve/{id}', [ReserveController::class, "DeleteReserve"]);

Route::post('Reservesunion', [ReserveController::class, "Reserveunion"]);

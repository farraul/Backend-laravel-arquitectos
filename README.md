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

## ⏺ Comandos

#### Comprobar versión de php:
php --version
#### Comprobar versión composer:
php --version
#### Crear proyecto laravel:
composer create-project laravel/laravel mi-proyecto-laravel
#### Encender servidor:
php artisan serve
#### Crear controlador:
php artisan make:controller "nombre controlador"
#### Crear modelo:
php artisan make:model "nombre modelo"
#### Crear migración:
php artisan make:migration "nombre migración"
  #### Para identificar el proyecto con una key:
  php artisan key:generate
  #### Para migrar la base de datos:
   php artisan migrate     
   Al migrar hay que hacer el paso de abajo ya que en la BBDD se borraron las Keys
   
  #### Para instalar las keys del passport:
  php artisan --force passport_install 

##  ⏺ Endpoints de la API middleware

Dentro del archivo Api.php (dentro de la carpeta routes) añadiremos:

#### Route::middleware('auth:api')->group(function(){
(Aquí irán las rutas que queremos que pasen por el middleware)
#### }

## ⏺ Procesos
#### Crear archivo procfile y añadir línea:

web: vendor/bin/heroku-php-apache2 public/

* En el archivo app-service-providers-appserviceprovider.php añadir varias líneas en la función register:

 public function register(){
    
        if (env('REDIRECT_HTTPS')) {
        
            $this->app['request']->server->set('HTTPS', true);
            
        }
        
    }
    
    public function boot(UrlGenerator $url){
    
       if (env('REDIRECT_HTTPS'))
       
       {
       
           $url->formatScheme('https://');
           
       }
       
       Schema::defaultStringLength(191);
       
    }
    

  #### Quitamos de git ignore la linea 4:
 Storage key...
  
 ## ⏺ Heroku
 Create new app
 ### Crear base de datos
 En resources -> Add-ons -> ClearDB Mysql
 
 Deploy -> Git Hub -> Automatic deploys from  main are enabled -> seleccionamos rama
 
 Settings -> Config Vars -> Reveal Config Vars -> CLEARDB_DATABASE_URL (tendremos todos los datos)
 
 Settings -> Config Vars -> Reveal Config Vars -> CLEARDB_DATABASE_URL -> APP_DEBUG = true (para ver todos los errores)
 ![bbdd](https://user-images.githubusercontent.com/28491001/149358868-fd2a51a4-d76e-4193-b718-8193471df7e6.png)

 
    

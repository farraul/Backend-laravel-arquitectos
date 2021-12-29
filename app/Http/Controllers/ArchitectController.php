<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Architect;
class ArchitectController extends Controller
{
    //
    public function showAllArchitect(){

        try {
            
        return Architect::all();

        } catch(QueryException $error) {
            return $error;
        }
    }
    ////////////////Crear Architects////////////////
    public function addArchitect(Request $request){//sin id y sin fecha
        $web_site = $request->input('web_site');
        $description_experience = $request->input('description_experience');
        $password = $request->input('password');

    

        try {
            return Architect::create(
                [
                    'web_site' => $web_site,
                    'description_experience' => $description_experience,
                    'password' => $password,
                ]
                );

        } catch (QueryException $error) {
            $codigoError = $error->errorInfo[1];

            
                return response()->json([
                    'error' => $codigoError
                ]);
            
        }
        
    }
   ////////////////Modificar Architects////////////////
    public function UpdateArchitect (Request $request,$id){

        $web_site = $request->input('web_site');
        $description_experience = $request->input('description_experience');
        $password = $request->input('password');


   

        try {

            $Architect = Architect::where('id', '=', $id)
            ->update(
                [
                    'web_site' => $web_site,
                    'description_experience' => $description_experience,

                ]
                );
                return Architect::all()
                ->where('id', "=", $id);

        } catch (QueryException $error) {
            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }

        }
    }
    ////////////////Busqueda por ID Architects ////////////////

    public function ArchitectByID($id){
        try {
            $Architect = Architect::all()
            ->where('id', "=", $id);
            return $Architect;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
        
    }

    ////////////////Borrar Architects ////////////////
    public function DeleteArchitect($id){

        

        try {
    ////////////////BUSCA EL PLAYER POR ID. SI EXISTE, BORRA EL PLAYER. SI NO, SACA MENSAJE DE ERROR////////////////
            $arrayArchitect = Architect::all()
            ->where('id', '=', $id);

            $Architect = Architect::where('id', '=', $id);
            
            if (count($arrayArchitect) == 0) {
                return response()->json([
                    "data" => $arrayArchitect,
                    "message" => "No se ha encontrado el Architect"
                ]);
            }else{
                $Architect->delete();
                return response()->json([
                    "data" => $arrayArchitect,
                    "message" => "Architect borrado correctamente"
                ]);
            }

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
    }
}
    
// public function showProfile(Request $request){

//     $id = $request->input('id');

//     try {

//         return Architect::all()->where('id', '=', $id)
//         ->makeHidden(['password'])->keyBy('id');

//     } catch (QueryException $error) {
//         return $error;
//     }
// }

// public function registerUser(Request $request){

//     $validatedData = $request->validate([
//         'email' => 'required|email',
//         'nombre' => 'required|string',
//         'password' => 'required|min:8',
//         'tipo' => 'required',
//         'raza' => 'required',
//         'edad' => 'required',
//         'localidad' => 'required|string',
        
//     ], [
//         'name.required' => 'Name is required',
//         'password.required' => 'Password is required',
//         'email.required' => 'Email is required'
//     ]);
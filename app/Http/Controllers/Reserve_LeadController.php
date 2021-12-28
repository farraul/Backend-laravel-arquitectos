<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Reserve_Lead;
class Reserve_Lead_Controller extends Controller
{
    //
    public function showAllReserve_Lead(){

        try {
            
        return User::all();

        } catch(QueryException $error) {
            return $error;
        }
    }
    ////////////////Crear Reserve_Leads////////////////
    public function addReserve_Leads(Request $request){//sin id y sin fecha
        // $name = $request->input('name');
        
        try {

            return User::create(
                [
                    // 'name' => $name,
               

                ]
                );

        } catch (QueryException $error) {
            $codigoError = $error->errorInfo[1];

            
                return response()->json([
                    'error' => $codigoError
                ]);
            
        }
        
    }
   ////////////////Modificar Reserve_Leads////////////////
    public function UpdateReserve_Leads (Request $request,$id){

        // $name = $request->input('name');



        try {

            $Reserve_Lead = User::where('id', '=', $id)
            ->update(
                [
                // 'name' => $name,
                ]);
                return User::all()
                ->where('id', "=", $id);

        } catch (QueryException $error) {
            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }

        }
    }
    ////////////////Busqueda por ID Reserve_Leads ////////////////

    public function Reserve_LeadsByID($id){


        try {
            $Reserve_Lead = User::all()
            ->where('id', "=", $id);
            return $Reserve_Lead;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
        
    }

    ////////////////Borrar Reserve_Leads ////////////////
    public function DeleteReserve_Leads($id){

        

        try {
    ////////////////BUSCA EL PLAYER POR ID. SI EXISTE, BORRA EL PLAYER. SI NO, SACA MENSAJE DE ERROR////////////////
            $arrayReserve_Lead = User::all()
            ->where('id', '=', $id);

            $Reserve_Lead = User::where('id', '=', $id);
            
            if (count($arrayReserve_Lead) == 0) {
                return response()->json([
                    "data" => $arrayReserve_Lead,
                    "message" => "No se ha encontrado el Reserve_Lead"
                ]);
            }else{
                $Reserve_Lead->delete();
                return response()->json([
                    "data" => $arrayReserve_Lead,
                    "message" => "Reserve_Lead borrado correctamente"
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

//         return Reserve_Lead::all()->where('id', '=', $id)
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
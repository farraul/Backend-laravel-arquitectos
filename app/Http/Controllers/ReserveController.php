<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Reserve;
class ReserveController extends Controller
{
    //
    public function showAllReserves(){

        try {
            
        return Reserve::all();

        } catch(QueryException $error) {
            return $error;
        }
    }
    ////////////////Crear Reserve_Leads////////////////
    public function addReserve(Request $request){//sin id y sin fecha
        $id_lead = $request->input ('id_lead');
        $id_architect = $request->input ('id_architect');
        $hola = $request->input ('hola');
        
        try {
            return Reserve::create(
                [
                    'hola' => $hola,
                    'id_lead' => $id_architect,
                    'id_lead' => $id_architect,
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

    public function ReserveByID($id){


        try {
            $Reserve = Reserve::all()
            ->where('id', "=", $id);
            return $Reserve;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        } 
    }

    ////////////////Borrar Reserve_Leads ////////////////
    public function DeleteReserve($id){

        try {
            $arrayReserve = Reserve::all()
            ->where('id', '=', $id);

            $Reserve = Reserve::where('id', '=', $id);
            
            if (count($arrayReserve) == 0) {
                return response()->json([
                    "data" => $arrayReserve,
                    "message" => "No se ha encontrado el Reserve_Lead"
                ]);
            }else{
                $Reserve->delete();
                return response()->json([
                    "data" => $arrayReserve ,
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
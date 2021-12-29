<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Lead;
class LeadController extends Controller
{
    //
    public function showAllLeads(){

        try {
            
        return Lead::all();

        } catch(QueryException $error) {
            return $error;
        }
    }
    ////////////////Crear Leads////////////////
    public function addLead(Request $request){//sin id y sin fecha
        $u_title_order_client = $request->input('u_title_order_client');
        $u_description_order_client = $request->input('u_description_order_client');
        $u_city = $request->input('u_city');
        $u_date_to_work = $request->input('u_date_to_work');

     
        try {

            return Lead::create(
                [
                    'u_title_order_client' => $u_title_order_client,
                    'u_description_order_client' => $u_description_order_client,
                    'u_city' => $u_city,
                    'u_date_to_work' => $u_date_to_work,
                ]
                );

        } catch (QueryException $error) {
            $codigoError = $error->errorInfo[1];
            
                return response()->json([
                    'error' => $codigoError
                ]);
            
        }
        
    }
   ////////////////Modificar Lead////////////////
    public function UpdateLeads (Request $request,$id){

        $u_title_order_client = $request->input('u_title_order_client');
        $u_description_order_client = $request->input('u_description_order_client');
        $u_city = $request->input('u_city');
        $u_date_to_work = $request->input('u_date_to_work');



        try {

            $Usuario = Lead::where('id', '=', $id)
            ->update(
                [
                    'u_title_order_client' => $u_title_order_client,
                    'u_description_order_client' => $u_description_order_client,
                    'u_city' => $u_city,
                    'u_date_to_work' => $u_date_to_work,

        
                ]
                );
                return Lead::all()
                ->where('id', "=", $id);

        } catch (QueryException $error) {
            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }

        }
    }
    ////////////////Busqueda por ID Architect ////////////////

    public function LeadsByID($id){

        try {
            $Lead = Lead::all()
            ->where('id', "=", $id);
            return $Lead;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }  
    }

    ////////////////Borrar Architect ////////////////
    public function DeleteLeads($id){
        
        try {
            $arrayLead = Lead::all()
            ->where('id', '=', $id);

            $Lead = Lead::where('id', '=', $id);
            
            if (count($arrayLead) == 0) {
                return response()->json([
                    "data" => $arrayLead,
                    "message" => "No se ha encontrado el Usuario"
                ]);
            }else{
                $Lead->delete();
                return response()->json([
                    "data" => $arrayLead,
                    "message" => "Usuario borrado correctamente"
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

//         return Usuario::all()->where('id', '=', $id)
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
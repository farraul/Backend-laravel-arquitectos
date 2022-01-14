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



    ///// show all leadscf filter///

    public function showAllLeads_with_filter(Request $request){
        $id_architect = $request->input ('id_architect');
        try {
        $findLeadNotReservedUser = Lead::with('reserves')
        ->whereNotIn('id' ,function($q) use ($id_architect) {
            $q->from('reserves')->select('id_lead')
                ->where('id_architect','=', $id_architect);
        })->get();
        
        return response()->json($findLeadNotReservedUser,200);
        //     $resultado =Lead::join("reserves", "reserves.id_lead", "=", "leads.id")
        //     ->join("users", "users.id", "=", "leads.id_user")
        //     ->join("architects", "architects.id", "=", "reserves.id_architect")
        //     ->where("architects.id", "=", $id_architect)


        //     ->select("users.*", "leads.*")
        //     ->get();
        //    return $resultado;

//ya aqui le voy a hacer 

        //     $resultado =Lead::join("reserves", "reserves.id_lead", "=", "leads.id")
        //     ->join("architects", "architects.id", "=", "reserves.id_architect") 
        //    //->distinct()
        //     ->where("reserves.id_architect", "=", $id_architect)


        //     ->select( "leads.*")
        //     ->get();
        //     return $resultado;

            //$resultado=select * from leads where i


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
         $id_user = $request->input ('id_user');


     
        try {

            return Lead::create(
                [
                    'u_title_order_client' => $u_title_order_client,
                    'u_description_order_client' => $u_description_order_client,
                    'u_city' => $u_city,
                    'u_date_to_work' => $u_date_to_work,
                    'id_user' => $id_user,

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
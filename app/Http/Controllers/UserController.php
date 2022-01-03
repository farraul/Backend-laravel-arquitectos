<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\User;
class UserController extends Controller
{
    //
    public function showAllUsers(){

        try {
            
        return User::all();

        } catch(QueryException $error) {
            return $error;
        }
    }
   ////////////////Crear Users////////////////
    public function addUsers(Request $request){//sin id y sin fecha
        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
        $telf = $request->input('telf');

        $gender = $request->input('select_gender');
        $c_a = $request->input('select_community');
        $rol = $request->input('rol');

        try {

            return User::create(
                [
                    'name' => $name,
                    'username' => $username,
                    'email' => $email,
                    'telf' => $telf,

                    'gender' => $gender,
                    'c.a' => $c_a,
                    'role' => $rol,

                ]
                );

        } catch (QueryException $error) {
            $codigoError = $error->errorInfo[1];

            
                return response()->json([
                    'error' => $codigoError
                ]);
            
        }
        
    }
   ////////////////Modificar Users////////////////
    public function UpdateUsers (Request $request,$id){

        $name = $request->input('name');
        $username = $request->input('username');
        $telf = $request->input('telf');

        $gender = $request->input('gender');
        $c_a = $request->input('c_a');
        $rol =  $request->input('rol');
        $id_architect =  $request->input('id_architect');
        $money =  $request->input('money');



        try {

            $User = User::where('id', '=', $id)
            ->update(
                [
                    'name' => $name,
                    'username' => $username,

                    'telf' => $telf,
                    'c_a' => $c_a,
                    'gender' => $gender,
                    'rol' => $rol,
                    'money' =>$money,                ]
                );
                return User::all()
                ->where('id', "=", $id);

        } catch (QueryException $error) {
            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }

        }
    }

     ////////////////Modificar money////////////////
     public function UpdateUsersMoney (Request $request,$id){

        $money =  $request->input('money');

        try {

            $User = User::where('id', '=', $id)
            ->update(
                [
                   
                    'money' =>$money,                ]
                );
                return User::all()
                ->where('id', "=", $id);

        } catch (QueryException $error) {
            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }

        }
    }
    ////////////////Busqueda por ID Users ////////////////

    public function UsersByID($id){


        try {
            $User = User::all()
            ->where('id', "=", $id);
            return $User;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
        
    }

    ////////////////Borrar Users ////////////////
    public function DeleteUsers($id){

        try {
            $arrayUser = User::all()
            ->where('id', '=', $id);

            $User = User::where('id', '=', $id);
            
            if (count($arrayUser) == 0) {
                return response()->json([
                    "data" => $arrayUser,
                    "message" => "No se ha encontrado el User"
                ]);
            }else{
                $User->delete();
                return response()->json([
                    "data" => $arrayUser,
                    "message" => "User borrado correctamente"
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

//         return User::all()->where('id', '=', $id)
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
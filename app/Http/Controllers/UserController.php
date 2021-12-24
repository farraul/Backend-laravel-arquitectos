<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\User;
class UserController extends Controller
{
    //
    public function showAllUsuario(){

        try {
            
        return User::all();

        } catch(QueryException $error) {
            return $error;
        }
    }
    ////////////////Crear Usuarios////////////////
    public function addUsuarios(Request $request){//sin id y sin fecha
        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
        $telf = $request->input('telf');

        $gender = $request->input('select_gender');
        $c_a = $request->input('select_community');
        $rol = request->input('rol');

        try {

            return User::create(
                [
                    'name' => $name,
                    'username' => $username,
                    'email' => $email,
                    'telf' => $telf,

                    'gender' => $gender,
                    'c.a' => $c_a,
                    'role' => $role,

                ]
                );

        } catch (QueryException $error) {
            $codigoError = $error->errorInfo[1];

            
                return response()->json([
                    'error' => $codigoError
                ]);
            
        }
        
    }
   ////////////////Modificar Usuarios////////////////
    public function UpdateUsuarios (Request $request,$id){

        $name = $request->input('name');
        $username = $request->input('username');
        $email = $request->input('email');
        $telf = $request->input('telf');

        $gender = $request->input('select_gender');
        $c_a = $request->input('select_community');
        $rol = request->input('rol');


        try {

            $Usuario = User::where('id', '=', $id)
            ->update(
                [
                    'name' => $name,
                    'username' => $username,
                    'email' => $email,
                    'telf' => $telf,

                    'gender' => $gender,
                    'c.a' => $c_a,
                    'role' => $role,
                ]
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
    ////////////////Busqueda por ID Usuarios ////////////////

    public function UsuariosByID($id){


        try {
            $Usuario = User::all()
            ->where('id', "=", $id);
            return $Usuario;

        } catch (QueryException $error) {

            $codigoError = $error->errorInfo[1];
            if($codigoError){
                return "Error $codigoError";
            }
        }
        
    }

    ////////////////Borrar Usuarios ////////////////
    public function DeleteUsuarios($id){

        

        try {
    ////////////////BUSCA EL PLAYER POR ID. SI EXISTE, BORRA EL PLAYER. SI NO, SACA MENSAJE DE ERROR////////////////
            $arrayUsuario = User::all()
            ->where('id', '=', $id);

            $Usuario = User::where('id', '=', $id);
            
            if (count($arrayUsuario) == 0) {
                return response()->json([
                    "data" => $arrayUsuario,
                    "message" => "No se ha encontrado el Usuario"
                ]);
            }else{
                $Usuario->delete();
                return response()->json([
                    "data" => $arrayUsuario,
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
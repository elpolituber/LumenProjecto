<?php

namespace App\Http\Controllers;
Use Exception;
//use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Routing\Controller as BaseController;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        
   
    }
    function get(Request $data)
    {
       $id = $data['id'];
       if ($id == null) {
          return users::get();
       } else {
          return users::findOrFail($id);
       }
    }
    //
    public function post(Request $data)
    {
        try{
            DB::beginTransaction();
            $result = $data->json()->all();
            $user = users::create([
                'nombre'=>$result['nombre'],
                'apellido'=>$result['apellido'],
                'foto'=>$result['foto'],
                'usuario'=>$result['usuario'],
                'email'=>$result['email'],
                'carrera'=>$result['carrera'],
                'password'=>$result['password']
                ]);
                DB::commit();
             } catch (Exception $e) {
                
                return response()->json($e,400);
             }
                return response()->json($board,200);    
        }

    public function mostrarUsuario(Request $data){
      
    }
    public function validarUsuario(Request $data){

    }
    public function editarUsuario(Request $data){

    }
    public function eliminarUsuario(Request $data){

    }
    
    //
}

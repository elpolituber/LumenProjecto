<?php

namespace App\Http\Controllers;
Use Exception;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
       //$id = $data['id'];
       $id=1;
       if ($id == null) {
          return User::get();
       } else {
          return User::findOrFail($id);
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
                'usuario'=>$result['usuario'],
                'email'=>$result['email'],
                'carrera'=>$result['carrera'],
                'password'=>$result['password']
                ]);
                DB::commit();
             } catch (Exception $e) {
                
                return response()->json($e,400);
             }
                return response()->json($user,200);    
        }

    public function validarUsuario(Request $data){
      $result = $data->json()->all();
      $email = DB::table('users')
            ->select('nombre', 'pasword')
            ->where('email',$result['email']);
      if($email->email == $result['email'] && $email->pasword == $result['pasword']){

         return true;

      }else{
         
         return false;
      }
            
    }
    public function eliminarUsuario(Request $data){

    }
    
    //
}

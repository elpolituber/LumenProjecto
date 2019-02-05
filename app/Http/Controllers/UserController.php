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
       $id = $data['id'];
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
            $user = User::create([
                'nombre'=>$result['nombre'],
                'apellido'=>$result['apellido'],
                'usuario'=>$result['usuario'],
                'carrera'=>$result['carrera'],
                'email'=>$result['email'],
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
            ->select('email', 'pasword')
            ->where('email',$result['email']);
      if($email->email == $result['email'] && $mail->pasword == $result['pasword']){

         return true;

      }else{
         
         return false;
      }
            
    }
    public function eliminarUsuario(Request $data){
      $result = $data->json()->all();
       $id = $result['id'];
       return User::destroy($id);
    }
    
    //
}

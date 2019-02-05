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
    
    function put(Request $data){
       try{
          DB::beginTransaction();
          $result = $data->json()->all();
          $user = User::where('id',$result['id'])->update([
             'id'=>$result['id'],
             'nombre'=>$result['nombre'],
             'usuario'=>$result['usuario'],
             'carrera'=>$result['carrera'],
             'email'=>$result['email'],
          ]);
          DB::commit();
       } catch (Exception $e) {
          return response()->json($e,400);
       }
       return response()->json($user,200);
    }
    
    function get(Request $data){
       $id = $data['id'];
       if ($id == null) {
          return User::get();
       } else {
          return User::findOrFail($id);
       }
    }
    //

    public function post(Request $data){
      try{
               DB::beginTransaction();
                  $result = $data->json()->all();
                  $user = new User();
                  //
                  $user->id = $result['id'];
                  $user->nombre = $result['nombre'];
                  $user->apellido = $result['apellido'];
                  $user->usuario = $result['usuario'];
                  $user->carrera = $result['carrera'];
                  $user->email = $result['email'];
                  $user->pasword = $result['pasword'];
                  $user->save();
                  DB::commit();
         }catch (Exception $e) {
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
      //vLIDAR USUARIO

      if(!$result['email'] OR !$result['pasword']){

         $respuesta = array(
            'errror'=> TRUE,
            "mensaje"=> 'L ainformacipn no validdad');
            return $respuesta;
      }
            
      $user = DB::select('');
    }
   public function eliminarUsuario(Request $data){
      $result = $data->json()->all();
       $id = $result['id'];
       return User::destroy($id);
    }
    
    //
}

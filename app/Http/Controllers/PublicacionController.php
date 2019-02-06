<?php

namespace App\Http\Controllers;

use App\User;
use App\Publication;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PublicacionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    
    }
    
    public function crearPublicacion(Request $data){
       try{ 
            DB::beginTransaction();
            $result = $data->json()->all();
            $publication = new Publication();
//            $publication->id = $result['id'];
            $publication->detalle = $result['detalle'];
            $publication->user_id = $result['user_id'];
            $publication->save();
            DB::commit();
     } catch (Exception $e) {
            return response()->json($e,400);
     }
            return response()->json($publication,200);   
    }
    
    public function editarPublicacion(Request $data){
           try{
              DB::beginTransaction();
              $result = $data->json()->all();
              $publication = Publication::where('id',$result['id'])->update([
                 //'id'=>$result['id'],
                 'detalle'=>$result['detalle'],
              ]);
              DB::commit();
           } catch (Exception $e) {
              return response()->json($e,400);
           }
           return response()->json($publication,200);
        }
    
    public function mostrarPublicacion(){
        
        $users = User::join('publications','users.id','=','publications.user_id')->get();
 
        return response()->json($users);
    }
    public function eliminarPublicacion(Request $data){
        $result = $data->json()->all();
        $id = $result['id'];
        return Publication::destroy($id);
    }
    
}

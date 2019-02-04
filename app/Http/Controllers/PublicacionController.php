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
    
    public function crearPublicacion(Request $deta){
        try{
            DB::beginTransaction();
            $result = $data->json()->all();
            $fori=DB::table('users')
                        ->select('id')
                        ->where('email',$result['email']);
            $public = publication::create([
                    'detalle'=>$result['detalle'],
                    'id_user'=>$fori,
            ]);
            DB::commit();
        }catch (Exception $e) {
       
       return response()->json($e,400);
    }
       return response()->json($public,200);   
    }
    
    public function editarPublicacion(Request $data){
    }   
    public function mostrarPublicacion(){
        
        $users = User::join('publications','users.id','=','publications.user_id')->get();
 
        return response()->json($users);
    }
    public function eliminarPublicacion(Request $data){
        
    }
    
}

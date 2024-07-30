<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use Exception;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function consultarProveedor(Request $request){

        $response = [
            'success'=> true,
            'message' => 'ok',
            'data' => []
        ];
        try {
            $query =  new Proveedores();
            if($request->get('id')){
                $query = $query->where('id', '=', $request->get('id'));
            }

            if($request->get('documento')){
                $query = $query->where('documento', '=', $request->get('documento'));
            }


            $response['data'] =$query->get()->toArray();

        } catch (\Exception $e) {
            $response = [
                'success'=> false,
                'message' => 'error',
                'data' => []
            ];
        }
        return json_encode($response);
             
    }

    public function saveProveedor(Request $request){
        $response = [
          'success' => true,
          'message' => 'Se guardo correctamente',
          'data' => []
        ];
    
        try {
    
          $validateCodBarras = Proveedores::where('documento' , $request['documentoProveedorMdl'])->first();
          if($validateCodBarras){
            throw new Exception("ya existe un proveedor con el documento"); 
          }

    
          $dataRequest = [
            'nombre' => strtoupper($request['nombreProveedorMdl']),
            'ciudad' => $request['ubicacionProveedorMdl'],
            'celular' => strtoupper($request['celularProveedorMdl']),
            'documento' => strtoupper($request['documentoProveedorMdl']),
          ];
    
          foreach ($dataRequest as $key => $value) {
            if (empty($value)) {
              throw new Exception("Hay campos vacios -> " . $key);
            }
          }
    
          $producto = Proveedores::create($dataRequest);
          $response['data'] =$producto;
        } catch (\Exception $e) {
          $response = [
            'success' => false,
            'message' =>  $e->getMessage()
          ];
        }
    
        return response()->json($response );
    
      }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\Models\Zapato;
use Exception;
class ZapatosController extends Controller
{
    public function show(){
        return Zapato::all();
    }
    public function delete($id){
        Zapato::destroy($id);
        return response()->json(["message"=>"Eliminacion exitosa"]);
    }
    public function edit (Request $request,$id){
        $validator =Validator::make($request->all(),[
            'marca'=>'requered',
            'modelo'=>'requered',
            'tamaño'=>'requered',
            'tipo'=>'requered',
            'imagen'=>'requered',
            'estado'=>'requered',
            'precio'=>'requered',
        ]);
        $zapato=Zapato::find($id);
        $zapato->marca = $request->marca;
        $zapato->modelo = $request->modelo;
        $zapato->tamaño = $request->tamaño;
        $zapato->tipo = $request->tipo;
        $zapato->imagen = $request->imagen;
        $zapato->estado = $request->estado;
        $zapato->precio = $request->precio;
        $zapato->save();
        return response()->json(["message"=>"Actualizacion exitosa",
        "data" => $zapato->fresh()
            ], 200);
    }
    public function store(Request $request){
        try{
            $zapato=new Zapato;
        $zapato->marca = $request->marca;
        $zapato->modelo = $request->modelo;
        $zapato->tamaño = $request->tamaño;
        $zapato->tipo = $request->tipo;
        $zapato->imagen = $request->imagen;
        $zapato->estado = $request->estado;
        $zapato->precio = $request->precio;

        if (strpos($request->imagen, 'data:image') === 0) {
            $imagen = $request->imagen;
            // Eliminar el prefijo de base64
            $imagen = str_replace('data:image/jpeg;base64,', '', $imagen);
            $imagen = str_replace('data:image/png;base64,', '', $imagen);
            $imagen = str_replace(' ', '+', $imagen); // Asegurar que los espacios sean '+' para la decodificación

            $imageName = 'zapato_' . time() . '.jpg'; // Nombre del archivo con timestamp
            // Guardar la imagen en el almacenamiento público
            Storage::disk('public')->put('zapatos/' . $imageName, base64_decode($imagen));
            $zapato->imagen = 'zapatos/' . $imageName;
        }

        $zapato->save();
        return response()->json(["message"=>"Registro exitosa"]);
        }catch (Exception $e){
            return response()->json(["message"=>"error al crear"]);
        }
    }
}

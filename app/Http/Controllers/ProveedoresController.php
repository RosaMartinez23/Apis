<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    
    public function index()
    {
        return Proveedores::all();
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'Codigo' =>'required',
            'Nombre_Compañia' =>'required',
            'Telefono' =>'required'
        ]);
        $proveedores =  new Proveedores;
        $proveedores->Codigo = $request->Codigo;
        $proveedores->Nombre_Compañia = $request->Nombre_Compañia;
        $proveedores->Telefono = $request->Telefono;
        $proveedores->save();
        
        return $proveedores;
    }

    
    public function show($id)
    {
        $id=Proveedores::find($id);
        return $id;
    }

    
    public function update(Request $request, $id)
    {
        $proveedores = Proveedores::find($id);
        $request->validate([
            //'Codigo' =>'required',
            'Nombre_Compañia' =>'required',
            'Telefono' =>'required'
        ]);
        //$proveedores-> Codigo = $request->Codigo;
        $proveedores->Nombre_Compañia = $request->Nombre_Compañia;
        $proveedores->Telefono = $request->Telefono;
        $proveedores->update();

        return $proveedores;
    }

    
    public function destroy(Proveedores $proveedores)
    {
        $proveedores = Proveedores::find($proveedores);

        if(is_null($proveedores))
        {
            return response()->json(['message' => 'Proveedor no encontrado'], 404);
        }
        $proveedores->delete();
        
        return response()->noContent();
    }
}

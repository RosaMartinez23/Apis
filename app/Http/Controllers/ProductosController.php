<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Proveedores;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        return Productos::all();
    }


    public function store(Request $request)
    {
        $request->validate([
            'Codigo'=> 'required',
            'Nombre' =>'required',
            'Precio_Venta' =>'required',
            'Existencias' =>'required',
            'Codigo_Proveedor' =>'required'

        ]);
        $proveedorExistente = Proveedores::where('Codigo', $request->Codigo_Proveedor)->first();

        if (!$proveedorExistente) {
            return response()->json(['error' => 'El proveedor no existe.'], 404);
         }
        $productos = new Productos;
        $productos->Codigo = $request->Codigo;
        $productos->Nombre = $request->Nombre;
        $productos->Precio_Venta = $request->Precio_Venta;
        $productos->Existencias = $request->Existencias;
        $productos->Codigo_Proveedor = $request->Codigo_Proveedor;
        $productos->save();

        return $productos;
    }
     
    public function show($id)
    {
        
        $productos = Productos::with('proveedores')->find($id);

        if (!$productos) {
            return response()->json(['error' => 'Producto no encontrado.'], 404);
        }

        return $productos;
    }

    public function update(Request $request, $id)
    {
        $productos = Productos::find($id);

        if (!$productos) {
            return response()->json(['error' => 'Producto no encontrado.'], 404);
        }

        $request->validate([
            'Nombre' =>'required',
            'Precio_Venta' =>'required',
            'Existencias' =>'required',
            'Codigo_Proveedor' =>'required'
        ]);
        $productos->Nombre = $request->Nombre;
        $productos->Precio_Venta = $request->Precio_Venta;
        $productos->Existencias = $request->Existencias;
        $productos->Codigo_Proveedor = $request->Codigo_Proveedor;
        $productos->update();

        return $productos;
    }

    public function destroy($productos)
    {
        $productos = Productos::find($productos);

        if(is_null($productos))
        {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
        $productos->delete();
        
        return response()->noContent();
    }
}

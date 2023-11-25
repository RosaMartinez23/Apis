<?php

namespace App\Http\Controllers;

use App\Models\CompraProducto;
use App\Models\Compra;
use App\Models\Productos;
use Illuminate\Http\Request;

class CompraProductoController extends Controller
{
    
    public function index()
    {
        return CompraProducto::all();
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_producto'=>'required',
            'id_compra'=>'required',
            'cantidad'=>'required',
            'precio_compra'=>'required',
        ]);

        $ProductoExistente = Productos::where('Codigo', $request->id_producto)->first();

        if (!$ProductoExistente) {
            return response()->json(['error' => 'El producto no existe.'], 404);
        }
        $CompraExistente = Compra::where('ID', $request->id_compra)->first();

        if (!$CompraExistente) {
            return response()->json(['error' => 'La compra no existe.'], 404);
         }

        $compraProducto = new CompraProducto;
        $compraProducto->id_producto = $request->id_producto;
        $compraProducto->id_compra = $request->id_compra;
        $compraProducto->cantidad = $request->cantidad;
        $compraProducto->precio_compra = $request->precio_compra;

        $compraProducto->save();
        return $compraProducto;
  
    }

    public function show($id_compra_producto)
    {

        $compraProducto = CompraProducto::find($id_compra_producto);

    if (!$compraProducto) {
        return response()->json(['error' => 'Compra no encontrada.'], 404);
    }

    return $compraProducto;
        
    }

    
    public function update(Request $request, $compraProducto)
    {
        $compraProducto=CompraProducto::find($compraProducto);
        if (!$compraProducto) {
            return response()->json(['error' => 'Compra no encontrada.'], 404);
        }
        $request->validate([
            'id_producto'=>'required',
            'id_compra'=>'required',
            'cantidad'=>'required',
            'precio_compra'=>'required',
        ]);
        $compraProducto->id_producto = $request->id_producto;
        $compraProducto->id_compra = $request->id_compra;
        $compraProducto->cantidad = $request->cantidad;
        $compraProducto->precio_compra = $request->precio_compra;
        $compraProducto->update();
        return $compraProducto;
        
    }

    
    public function destroy($compraProducto)
    {
        $compraProducto=CompraProducto::find($compraProducto);
        if (is_null($compraProducto))
        {
            return response()->json(['message' => 'Compra no encontrada'], 404);
        }
        $compraProducto->delete();
        return response()->noContent();

        
    }
}

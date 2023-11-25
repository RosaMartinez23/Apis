<?php

namespace App\Http\Controllers;

use App\Models\tbldetalleventas;
use App\Models\ventas;
use App\Models\productos;
use Illuminate\Http\Request;

class TbldetalleventasController extends Controller
{
    
    public function index()
    {
        return tbldetalleventas::all();
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'Folio_Ventas' =>'required',
            'Codigo_Producto' =>'required',
            'Cantidad' =>'required'
        ]);
        $ventaExistente=Ventas::where('Folio',$request->Folio_Ventas)->first();
        $productoExistente=Productos::where('Codigo',$request->Codigo_Producto)->first();
        if (!$ventaExistente) {
            return response()->json(['error' => 'La venta no existe.'], 404);
         }
         if (!$productoExistente) {
            return response()->json(['error' => 'El producto no existe.'], 404);
         }
         $tbldetalleventas = new tbldetalleventas;
         $tbldetalleventas->Folio_Ventas = $request->Folio_Ventas;
         $tbldetalleventas->Codigo_Producto = $request->Codigo_Producto;
         $tbldetalleventas->Cantidad = $request->Cantidad;
         $tbldetalleventas->save();
         return $tbldetalleventas;
    }

    
    public function show($tbldetalleventas)
    {
        $tbldetalleventas=tbldetalleventas::with('ventas')->find($tbldetalleventas);
        if (!$tbldetalleventas) {
            return response()->json(['error' => 'Detalle de venta no encontrado.'], 404);
        }
        return $tbldetalleventas;
        
    }

    
    public function update(Request $request,  $tbldetalleventas)
    {
        $tbldetalleventas=tbldetalleventas::find($tbldetalleventas);
        if (!$tbldetalleventas) {
            return response()->json(['error' => 'Detalle de venta no encontrado.'], 404);
        }
        $request->validate([
            'Folio_Ventas' =>'required',
            'Codigo_Producto' =>'required',
            'Cantidad' =>'required'
        ]);
        $tbldetalleventas->Folio_Ventas = $request->Folio_Ventas;
        $tbldetalleventas->Codigo_Producto = $request->Codigo_Producto;
        $tbldetalleventas->Cantidad = $request->Cantidad;
        $tbldetalleventas->update();
        return $tbldetalleventas;

        
    }

    
    public function destroy( $tbldetalleventas)
    {
        $tbldetalleventas=tbldetalleventas::find($tbldetalleventas);
        if(is_null($tbldetalleventas))
        {
            return response()->json(['message' => 'Detalle de venta no encontrado'], 404);
        }
        $tbldetalleventas->delete();
        
        return response()->noContent();
    }
}

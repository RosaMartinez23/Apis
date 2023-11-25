<?php

namespace App\Http\Controllers;

use App\Models\Ventas;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    
    public function index()
    {
        return Ventas::all();
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'Fecha' =>'required',
            'Monto_Total' =>'required',
            'id_usuario' =>'required'

        ]);
        $ventasExistentes =Usuarios::where('id', $request->id_usuario)->first();
        if (!$ventasExistentes) {
            return response()->json(['error' => 'El usuario no existe.'], 404);
         }
        $ventas = new Ventas;
        $ventas->Fecha = $request->Fecha;
        $ventas->Monto_Total = $request->Monto_Total;
        $ventas->id_usuario = $request->id_usuario;
        $ventas->save();

        return $ventas;
       
    }

    
    public function show($ventas)
    {
        $ventas=Ventas::with('usuarios')->find($ventas);
        if (!$ventas) {
            return response()->json(['error' => 'Venta no encontrada.'], 404);
        }
        return $ventas;

    }

    public function update(Request $request, $ventas)
    {
        $ventas = Ventas::find($ventas);

        if (!$ventas) {
            return response()->json(['error' => 'Venta no encontrada.'], 404);
        }

        $request->validate([
            'Fecha' =>'required',
            'Monto_Total' =>'required',
            'id_usuario' =>'required'
        ]);
        $ventas->Fecha = $request->Fecha;
        $ventas->Monto_Total = $request->Monto_Total;
        $ventas->id_usuario = $request->id_usuario;
        $ventas->update();

        return $ventas;
    
    }

    
    public function destroy($ventas)
    {
        $ventas=Ventas::find($ventas);
        if (is_null($ventas)) 
        {
            return response()->json(['message' => 'Venta no encontrada'], 404);
        }
        $ventas->delete();
        return response()->noContent();


        
    }
}

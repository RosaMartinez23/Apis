<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    
    public function index()
    {
        return Compra::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'Total' =>'required',
            'Fecha' =>'required'
        ]);
        $compra =  new Compra;
        $compra->Total = $request->Total;
        $compra->Fecha = $request->Fecha;
        $compra->save();
        
        return $compra;
    }

    public function show($id)
    {
        $id = Compra::find($id);
        return $id;
    }

    public function update(Request $request, $id)
    {
        $compra = Compra::find($id);
        $request->validate([
            'Total' =>'required',
            'Fecha' =>'required'
        ]);
        $compra->Total = $request->Total;
        $compra->Fecha = $request->Fecha;
        $compra->update();

        return $compra;
    }

    
    public function destroy(Compra $compra)
    {
        $compra = Compra::find($compra);

        if(is_null($compra))
        {
            return response()->json(['message' => 'Compra no encontrada'], 404);
        }
        $compra->delete();
        
        return response()->noContent();
    }
}

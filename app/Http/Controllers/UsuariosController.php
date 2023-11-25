<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    
    public function index()
    {
        return Usuarios::all();
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required',
            'Apellido' =>'required',
            'Email' =>'required',
            'Telefono' => 'required',
            'Rol' =>'required',
            'Contraseña' =>'required'
        ]);
        $usuarios =  new Usuarios;
        $usuarios->Nombre = $request->Nombre;
        $usuarios->Apellido = $request->Apellido;
        $usuarios->Email = $request->Email;
        $usuarios->Telefono = $request->Telefono;
        $usuarios->Rol = $request->Rol;
        $usuarios->Contraseña = $request->Contraseña;
        $usuarios->save();
        
        return $usuarios;
    }

    
    public function show($id)
    {
        $id= Usuarios::find($id);
        return $id;
    }

    
    public function update(Request $request, $id)
    {
        $usuarios= Usuarios::find($id);
        $request->validate([
            'Nombre' => 'required',
            'Apellido' =>'required',
            'Email' =>'required',
            'Telefono' => 'required',
            'Rol' =>'required',
            'Contraseña' =>'required'
        ]);
        $usuarios->Nombre = $request->Nombre;
        $usuarios->Apellido = $request->Apellido;
        $usuarios->Email = $request->Email;
        $usuarios->Telefono = $request->Telefono;
        $usuarios->Rol = $request->Rol;
        $usuarios->Contraseña = $request->Contraseña;
        $usuarios->update();
        
        return $usuarios;
    }

    
    public function destroy($usuarios)
    {
        $usuarios= Usuarios::find($usuarios);

        if(is_null($usuarios))
        {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
        $usuarios->delete();
        
        return response()->noContent();
    }
}

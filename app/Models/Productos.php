<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $primaryKey = 'Codigo'; 

    public function proveedores()
    {
        return $this->belongsTo(Proveedores::class, 'Codigo_Proveedor', 'Codigo');
    }
}

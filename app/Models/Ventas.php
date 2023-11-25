<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;
    protected $primaryKey = 'Folio'; 
    
    public function usuarios()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuario', 'id');
    }
}

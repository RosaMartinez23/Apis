<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbldetalleventas extends Model
{
    use HasFactory;
    protected $primaryKey = 'id'; 

    public function ventas()
    {
        return $this->belongsTo(Ventas::class, 'Folio_Ventas', 'Folio');
    }
}

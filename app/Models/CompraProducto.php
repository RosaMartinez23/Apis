<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraProducto extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_compra_producto';

    public function productos()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function compra()
    {
        return $this->belongsTo(Compra::class, 'id_compra');
    }
}

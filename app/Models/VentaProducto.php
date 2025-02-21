<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaProducto extends Model
{
    use HasFactory;
    protected $table='ventaproducto';
    protected $primaryKey='id';
    protected $fillable=['cantidad','ID_Producto','ID_Venta'];
    protected $guarded=[];
    public $timestamps=false;

    public function Producto(){
        return $this->hasMany(Productos::class, 'id', 'ID_Producto');
    }
    public function Venta(){
        return $this->belongsTo(Venta::class, 'ID_Venta','id');
    }

}
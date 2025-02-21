<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosVentas extends Model
{
    use HasFactory;
    protected $table='productosventas';
    protected $primaryKey='id';
    protected $fillable=['cantidad', 'precio', 'ID_Producto', 'ID_Venta'];
    protected $guarded=[];
    public $timestamps=false;

    public function Producto(){
        return $this->hasOne(Productos::class,'id', 'ID_Producto');
    }

    public function Venta(){
        return $this->hasOne(Ventas::class,'id', 'ID_Venta');
    }
}

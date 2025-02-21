<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenProductos extends Model
{
    use HasFactory;
    protected $table='ordenproductos';
    protected $primaryKey='id';
    protected $fillable=['cantidad', 'detalleAdicional','ID_Orden','ID_Producto'];
    protected $guarded=[];
    public $timestamps=false;

    public function Orden(){
        return $this->hasMany(Orden::class, 'ID_Orden', 'id');
    }
    public function Producto(){
        return $this->belongsTo(Productos::class, 'ID_Producto','id');
    }
}

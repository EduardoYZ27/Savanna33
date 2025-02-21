<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $table='productos';
    protected $primaryKey='id';
    protected $fillable=['nombre', 'precio', 'ID_Categoria'];
    protected $guarded=[];
    public $timestamps=false;


    public function unidadMedida(){
        return $this->belongsTo(UnidadMedidas::class, 'ID_UnidadMedida');
    }

    public function insumosProductos()
    {
        return $this->hasMany(InsumosProductos::class, 'ID_Producto', 'id');
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'ID_Categoria');
    }

    public function insumo(){
        return $this->belongsTo(Insumos::class, 'ID_Insumo');
    }
}
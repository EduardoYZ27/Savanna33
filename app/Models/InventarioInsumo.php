<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarioInsumo extends Model
{
    use HasFactory;
    protected $table='inventarioinsumos';
    protected $primaryKey='id';
    protected $fillable=['cantidadSistema','cantidadFisica','ID_UnidadMedida','ajuste','observaciones','ID_Insumo','ID_Inventario'];
    protected $guarded=[];
    public $timestamps=false;

    public function unidadMedida(){
        return $this->belongsTo(UnidadMedidas::class,'ID_UnidadMedida','id');
    }
    public function Inventario(){
        return $this->hasOne(Inventario::class,'id', 'ID_Inventario');
    }
    public function Insumos(){
        return $this->hasOne(Insumos::class,'id', 'ID_Insumo');
    } 
}

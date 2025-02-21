<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsumosCompras extends Model
{
    use HasFactory;
    protected $table='insumoscompras';
    protected $primaryKey='id';
    protected $fillable=['cantidad','costo','ID_Insumo', 'ID_UnidadMedida','ID_Compra'];
    protected $guarded=[];
    public $timestamps=false;

    public function Insumos(){
        return $this->belongsTo(Insumos::class,'ID_Insumo');
    } 
    public function UnidadMedidas(){
        return $this->belongsTo(UnidadMedidas::class,'ID_UnidadMedida');
    } 

    public function Compras(){
        return $this->belongsTo(Compras::class,'ID_Compra');
    } 
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumos extends Model
{
    use HasFactory;
    protected $table='insumos';
    protected $primaryKey='id';
    protected $fillable=['nombre','descripcion','ID_UnidadMedida','estado'];
    protected $guarded=[];
    public $timestamps=false;

    public function unidadMedida(){
        return $this->belongsTo(UnidadMedidas::class,'ID_UnidadMedida');
    } 

    
}

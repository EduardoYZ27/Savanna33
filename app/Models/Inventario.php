<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $table='inventario';
    protected $primaryKey='id';
    protected $fillable=['fechaCaducidad','ID_InsumoCompra'];
    protected $guarded=[];
    public $timestamps=false;

    public function InsumosCompras(){
        return $this->hasOne(InsumosCompras::class,'id', 'ID_InsumoCompra');
    } 
}

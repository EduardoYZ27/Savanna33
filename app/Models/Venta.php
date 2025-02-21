<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table='venta';
    protected $primaryKey='id';
    protected $fillable=['NoConsumo','precioVenta', 'fecha'];
    protected $guarded=[];
    public $timestamps=false;
    
}

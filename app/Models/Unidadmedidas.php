<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadMedidas extends Model
{
    use HasFactory;
    protected $table='unidadmedidas';
    protected $primaryKey='id';
    protected $fillable=['nombre'];
    protected $guarded=[];
    public $timestamps=false;
}

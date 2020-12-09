<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    // use HasFactory;

    protected $table = 'Medicamento';
    protected $primaryKey = 'Cod_M';
    public $timestamps = false;
    protected $fillable = ['Cod_M', 'Nombre', 'Cantidad'];
}

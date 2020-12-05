<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    // use HasFactory;

    protected $table = 'Medico';
    protected $primaryKey = 'Cedula';
    public $timestamps = false;
    protected $fillable = ['Cedula', 'Nombre', 'Campus'];
}

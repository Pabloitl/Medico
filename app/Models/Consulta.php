<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    // use HasFactory;

    protected $table = 'Alergia';
    protected $primaryKey = 'No_Consulta';
    public $timestamps = false;
    protected $fillable = ['No_Consulta', 'No_Control', 'Cedula', 'Fecha_consulta', 'Diagnostico', 'Tipo_Afeccion'];
}

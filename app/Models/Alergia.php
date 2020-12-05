<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alergia extends Model
{
    // use HasFactory;

    protected $table = 'Alergia';
    // protected $primaryKey = ['No_Control', 'Cod_M'];
    public $timestamps = false;
    protected $fillable = ['No_Control', 'Cod_M'];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_tarea';
    public $incrementing = false;
	public $timestamps = false;

    protected $fillable = [
        'nombre_tarea'
    ];

}

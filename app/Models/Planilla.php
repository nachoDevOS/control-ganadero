<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planilla extends Model
{
    use HasFactory;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'categoria_id',
        'marca_id',
        'raza_id',
        'color_id',
        'nro_lomo',
        'nro_carimbo',
        'sexo',
        'estado',
        'observaciones',
        'registro',
        'deleted_at'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id')->withTrashed();
    }
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id')->withTrashed();
    }
    public function raza()
    {
        return $this->belongsTo(Raza::class, 'raza_id')->withTrashed();
    }
    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id')->withTrashed();
    }

}

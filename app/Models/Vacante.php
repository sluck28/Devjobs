<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    //pára mostrar la fecha empezando por el dia se usa casts
    protected $casts = [ 'ultimo_dia'=>'date'];

    protected $fillable=[
        'titulo',
        'salario_id',
        'categoria_id',
        'empresa',
        'ultimo_dia',
        'descripcion',
        'imagen',
        'user_id'
    ];

    //para acceder a nuestras tablas de categoria y salarios
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);        
    }

    function salario()
    {
    return $this->belongsTo(Salario::class);
    }

    function candidatos() 
    {
            return $this->hasMany(Candidato::class);
    }
    //para saber a que reclutador pertenece la vacante
    function reclutador() 
    {
        return $this->belongsTo(User::class,'user_id');    
    }
}

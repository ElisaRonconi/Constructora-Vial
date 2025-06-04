<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

     protected $fillable = [   //seguridad para evitar modificar campos como por ejemplo is_admin en caso de que exista
        
        'name',
    ];

    // Relaciones
    public function works()
    {
        return $this->hasMany(Work::class, 'id_province'); 
    }
    
}

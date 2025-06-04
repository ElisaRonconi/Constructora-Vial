<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [   //seguridad para evitar modificar campos como por ejemplo is_admin en caso de que exista
        'name',
        'id_province',
        'date_start',
        'date_end',
    ];

    // Relaciones
    public function assignment()
    {
        return $this->hasMany(Assignment::class, 'id_work', 'id'); 
    }
    
    public function province()
{
    return $this->belongsTo(Province::class, 'id_province');
}
}

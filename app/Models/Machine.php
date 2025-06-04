<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    protected $primaryKey = 'serial';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [   //seguridad para evitar modificar campos como por ejemplo is_admin en caso de que exista
        'serial',
        'type',
        'brand_model',
    ];

    // Relaciones
   public function assignments()
{
    return $this->hasMany(Assignment::class, 'serial_machine', 'serial');
}
    
    public function asignacionActiva(){
        return $this->hasOne(Assignment::class,
        'serial_machine',
        'serial')->whereNull('data_end');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
   
    protected $fillable = [   //seguridad para evitar modificar campos como por ejemplo is_admin en caso de que exista
        'serial_machine',
        'id_work',
        'date_start',
        'date_end',
        'kilometers',
        'id_reason',
    ];

    // Relaciones

    public function machine()
{
    return $this->belongsTo(Machine::class, 'serial_machine', 'serial');
}

    public function work()
{
    return $this->belongsTo(Work::class, 'id_work');
}

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $fillable = ['assignment_id', 'message'];
    
public function assignment()
{
    return $this->belongsTo(Assignment::class, 'assignment_id');
}


}

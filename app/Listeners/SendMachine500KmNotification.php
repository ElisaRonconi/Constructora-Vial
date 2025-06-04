<?php

namespace App\Listeners;

use App\Events\Machine500Km;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Alert;
use Illuminate\Support\Facades\Mail;

class SendMachine500KmNotification
{
    public function handle(Machine500Km $event)

{
    $assignment = $event->assignment;

    // Evitar duplicados (opcional)
    //$alreadyAlerted = Alert::where('assignment_id', $assignment->id)->exists();
    //if ($alreadyAlerted) return;

  
    
    Alert::create([
        'assignment_id' => $assignment->id,
        'message' => 'La máquina superó los 500 km y necesita mantenimiento.',
    ]);

    
    Mail::to('taller@constructora.com')->send(new MachineLimitReached($assignment));
}


}

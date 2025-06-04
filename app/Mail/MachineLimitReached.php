<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Assignment;


class MachineLimitReached extends Mailable
{
    use Queueable, SerializesModels;

    public $assignment;

public function __construct(Assignment $assignment)
{
    $this->assignment = $assignment;
}

public function build()
{
    return $this->subject('Mantenimiento requerido')
                ->view('emails.maintenance');
}
}

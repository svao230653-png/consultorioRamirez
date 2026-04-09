<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AvisoSistemaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;
    public $mensajeCorreo;

    public function __construct($usuario, $mensajeCorreo)
    {
        $this->usuario = $usuario;
        $this->mensajeCorreo = $mensajeCorreo;
    }

    public function build()
    {
        return $this->subject('Aviso del sistema | Consultorio Dental Ramírez')
                    ->view('emails.aviso_sistema');
    }
}
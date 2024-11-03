<?php
namespace App\Mail;

use App\Models\Devis;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DevisCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $devis;

    public function __construct(Devis $devis)
    {
        $this->devis = $devis;
    }

    public function build()
    {
        return $this->subject('Nouveau devis')
                    ->markdown('emails.devis.created')
                    ->attach(storage_path('app/public/' . $this->devis->file_path), [
                        'as' => 'devis.pdf',
                        'mime' => 'application/pdf',
                    ]);
    }
}

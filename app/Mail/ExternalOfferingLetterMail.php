<?php

namespace App\Mail;

use App\Models\ExternalOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExternalOfferingLetterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $order;
    public function __construct(ExternalOrder $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Surat Penawaran Order Pengujian dan Kalibrasi Alat Kesehatan')
                    ->view('mail.external_offering_letter_mail')
                    ->with(['order' => $this->order])
                    ->attach(public_path('temp_files/'.$this->order->id.$this->order->user->id.'.pdf'), array(
                        'as' => 'Surat Penawaran.pdf', 
                        'mime' => 'application/pdf')
                    );
    }
}

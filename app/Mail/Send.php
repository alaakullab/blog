<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Order;
class Send extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $desc;
    protected $title;
    public function __construct( $desc , $title)
    {
        $this->desc = $desc;
        $this->title = $title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.news.email')
            ->from(setting('mail'))
            ->subject($this->title)->with([
            'desc'=>$this->desc,
            'title'=>$this->title
        ]);
    }
}

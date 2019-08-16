<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ArticleAlertMail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject;
    public $articleData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $articleData)
    {
        $this->subject = $subject;
        $this->articleData = $articleData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.article_notification', $this->articleData)
            ->subject($this->subject)
            ->from('article_alert@uvlsports.com', 'UVL SPORTS');
    }
}

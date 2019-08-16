<?php

namespace App\Listeners;

use App\Events\NewArticleSubmitted;
use App\Mail\ArticleAlertMail;
use Illuminate\Support\Facades\Mail;

class SendEmailAlert
{

    /**
     * Handle the event.
     *
     * @param  NewArticleSubmitted $event
     * @return void
     */
    public function handle(NewArticleSubmitted $event)
    {
        $adminEmails = $event->adminEmails;
        $articleData = $event->articleData;
        $author = $articleData['author'];
        $subject = "$author submitted an article for review";
        Mail::to($adminEmails)->send(new ArticleAlertMail($subject, $articleData));
    }
}

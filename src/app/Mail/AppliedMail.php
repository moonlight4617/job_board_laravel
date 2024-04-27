<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

final class AppliedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($job, $pages)
    {
        $this->job = $job;
        $this->pages = $pages;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('jobpairで求人応募がありました')->view('emails.applied')->with([
            'job' => $this->job->job_name,
            'page' => $this->pages,
        ]);
    }
}

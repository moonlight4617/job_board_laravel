<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

final class ApplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $job;

    public $pages;

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
        return $this->subject('jobpairで求人応募完了しました')->view('emails.apply')->with([
            'job' => $this->job->job_name,
            'page' => $this->pages,
        ]);
    }
}

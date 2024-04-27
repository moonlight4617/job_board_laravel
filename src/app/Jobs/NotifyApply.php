<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Mail\AppliedMail;
use App\Mail\ApplyMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

final class NotifyApply implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $companyJob;

    public $user;

    public $company;

    public $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $company, $companyJob, $id)
    {
        $this->user = $user;
        $this->company = $company;
        $this->companyJob = $companyJob;
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user->email)->send(new ApplyMail($this->companyJob, route('user.jobs.show', ['job' => $this->id])));
        Mail::to($this->company->email)->send(new AppliedMail($this->companyJob, route('company.jobs.show', ['job' => $this->id])));
    }
}

<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Mail;

class SendEmail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($emial)
    {
        //
        $this->email = $emial;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //

        Mail::raw('队列测试', function($message) {

            $message->to($this->email);
        });


//        Log::info('已发送邮件 - ' . $this->email);
    }
}

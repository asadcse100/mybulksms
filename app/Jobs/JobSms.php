<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Http\Controllers\MessageInfoController;
use Illuminate\Support\Facades\Redis;

class JobSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    //public $timeout = 120;

    public function __construct()
    {
        //
    }

    public function retryUntil()
    {
        return now()->addSeconds(60);
    }

    /**
     * Execute the job.
     *
     * @return void
     */


    public static function handle()
    {
        // $sms = Redis::throttle('key')->allow(5)->every(60)->then(function () {
        $sms = MessageInfoController::send();
		//dd($sms);
        // }, function () {
        //     // Could not obtain lock...
        //     return $this->release(5);
        // });
        return $sms;
        
    }
}

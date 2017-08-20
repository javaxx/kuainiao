<?php

namespace App\Jobs;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $notice;
    private $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(\App\Notice $notice,User $user =null)
    {
        $this->notice = $notice;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->user == null) {
            $users = \App\User::all();
            foreach ($users as $user) {
                $user->addNotice($this->notice);
            }
        }else{
            $this->user->addNotice($this->notice);
        }

    }
}

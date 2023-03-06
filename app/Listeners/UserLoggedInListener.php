<?php

namespace App\Listeners;

use App\Events\UserLoggedInEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Modules\Authentication\Models\UserLoginLog;

class UserLoggedInListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserLoggedInEvent  $event
     * @return void
     */
    public function handle(UserLoggedInEvent $event)
    {
        try {
            $user = $event->userData;
            $browser = $event->browserData;
            $userLoginLog = new UserLoginLog();
            $userLoginLog->user_details = $user;
            $userLoginLog->browser_details = $browser;
            $userLoginLog->created_at = date('Y-m-d H:i:s');
            $userLoginLog->updated_at = date('Y-m-d H:i:s');
            $userLoginLog->save();
        }catch (\Exception $e) {
            $userLoginLog = new UserLoginLog();
            $userLoginLog->error_response = '[Line] => '.$e->getLine().'.[Message] => '.$e->getMessage(). '.[File] => '.$e->getFile();
            $userLoginLog->created_at = date('Y-m-d H:i:s');
            $userLoginLog->updated_at = date('Y-m-d H:i:s');
            $userLoginLog->save();
        }
    }// end -:- handle()
}

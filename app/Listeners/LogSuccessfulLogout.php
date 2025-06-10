<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\LoginLog;

class LogSuccessfulLogout
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Logout $event)
    {
        $logId = session('last_login_log_id');
        if ($logId) {
            LoginLog::where('id', $logId)
                ->update(['logout_at' => now()]);
            session()->forget('last_login_log_id');
        }
    }
}

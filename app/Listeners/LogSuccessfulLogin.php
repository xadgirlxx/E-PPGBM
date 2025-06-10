<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use App\Models\LoginLog;

class LogSuccessfulLogin
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
   public function handle(Login $event)
    {
   Log::info('✅ Listener LogSuccessfulLogin aktif untuk user: ' . $event->user->email);

        $log = LoginLog::create([
            'user_id' => $event->user->id,
            'nama' => $event->user->name,
            'ip_address' => request()->ip(),
            'login_at' => now(),
        ]);

        session(['last_login_log_id' => $log->id]);
    }
}

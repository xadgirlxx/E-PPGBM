<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoginLog;

class LogsController extends Controller
{
           /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $logs = LoginLog::where('user_id', auth()->id())
            ->orderByDesc('login_at')
            ->take(10)
            ->get();

        return view('logs', compact('logs'));
    }
}

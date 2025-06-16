<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function landing() {
        return view('content.guest.landing');
    }
}

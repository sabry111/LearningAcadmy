<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Setting;

class ContactController extends Controller
{
    public function index()
    {

        $data['setting'] = Setting::first();
        return view('front.contact')->with($data);
    }
}

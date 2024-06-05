<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function mail()
    {
        
        return view("send_mail");
    }
    
}

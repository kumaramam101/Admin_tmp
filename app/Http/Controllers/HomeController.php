<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function admin(){
        $p['showHeader'] = true;
        $p['showSidebar'] = true;
        $p['showFooter'] = true;
        $p['body'] = 'dashboard.dashboard';
        return view('layout.index',$p);
    }

}

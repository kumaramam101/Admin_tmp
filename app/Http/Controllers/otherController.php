<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class otherController extends Controller
{
    public function error_404()
    {
        $p['showHeader'] = false;
        $p['showSidebar'] = false;
        $p['showFooter'] = false;
        $p['body'] = 'others.error_404';
        return view('layout.index',$p);
    }
    public function contact()
    {
        $p['showHeader'] = true;
        $p['showSidebar'] = true;
        $p['showFooter'] = true;
        $p['body'] = 'others.contact';
        return view('layout.index',$p);
    }
}

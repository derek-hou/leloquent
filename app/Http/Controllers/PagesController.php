<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $temp = 'Testing!';
        //return view('pages/index');
        //return view('pages/index', compact('temp'));
        return view('pages/index')->with('temp', $temp);
    }

    public function services() {
        $data = array(
            
        );
        return view('pages/services');
    }
}

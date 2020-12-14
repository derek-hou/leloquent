<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $textBody = 'Laravel application utilizing Eloquent.';
        return view('pages/index')->with('textBody', $textBody);     // First argument is the variable used in the template
    }
}

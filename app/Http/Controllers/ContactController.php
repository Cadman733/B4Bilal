<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Show the contact information display page.
     */
    public function show()
    {
        return view('contact');
    }
}
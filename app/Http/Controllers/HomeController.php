<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the home page
     */
    public function index()
    {
        // Redirect to homepage for better UX
        return redirect()->route('homepage');
    }
}

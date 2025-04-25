<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request):View
    {
        return view('contact-us');
    }
}

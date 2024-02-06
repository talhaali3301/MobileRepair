<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PartController extends Controller
{
    public function add()
    {
        return Inertia::render('Parts/Add');
        
    }
}

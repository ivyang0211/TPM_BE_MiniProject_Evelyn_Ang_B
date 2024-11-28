<?php

namespace App\Http\Controllers;

use App\Models\Plane;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $planes = Plane::all();
        return view('welcome', compact('planes'));
    }
}

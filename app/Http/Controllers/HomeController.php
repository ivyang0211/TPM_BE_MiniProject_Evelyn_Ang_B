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

    public function destroy($id)
    {
        // Find plane by ID
        $plane = Plane::where('id', '=', $id);
        $plane->delete();
        
        

        session()->flash("success", "Plane Deleted Successfully");
        usleep(1500);
        

        return redirect()->route('home');
    }
}

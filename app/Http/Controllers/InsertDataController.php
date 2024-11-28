<?php

namespace App\Http\Controllers;

use App\Models\Plane;
use Illuminate\Http\Request;

class InsertDataController extends Controller
{
    public function index()
    {
        return view('create');
    }
    public function insertData(Request $request)
    {
        $now = now();
    
        // Define validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'quantity' => 'required|integer'
        ];
    
        // Validate the request
        $validatedData = $request->validate($rules);
    
        // Create a new Plane record
        Plane::create([
            'name' => $validatedData['name'],
            'type' => $validatedData['type'],
            'brand' => $validatedData['brand'],
            'quantity' => $validatedData['quantity'],
            'created_at' => $now
        ]);
    
        // Redirect to the home route
        return redirect()->route('home');
    }
    

}

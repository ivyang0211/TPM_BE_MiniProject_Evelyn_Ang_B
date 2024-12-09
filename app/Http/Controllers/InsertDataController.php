<?php

namespace App\Http\Controllers;

use App\Models\Plane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Validator;

class InsertDataController extends Controller
{
    public function index()
    {
        return view('create');
    }

    public function runSeeder(Request $request)
    {
        $request->validate([
            'count' => 'required|integer|min:1',
        ]);

        config(['seeder.count' => $request->input('count')]);

        // Run the specific seeder
        Artisan::call('db:seed', [
            '--class' => 'DatabaseSeeder',
            
        ]);

        // Return a response or redirect
        session()->flash('success', 'Seeder has successfully Executed!');
        return redirect()->route('home');
    }
   
    public function insertData(Request $request)
{
    // Define validation rules
    $rules = [
        'name' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
        'quantity' => 'required|integer',
        'imageUpload' => 'required|image|mimes:jpg,jpeg,png,gif'
    ];

    // Validate the request
    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        session()->flash('error', 'Validation Error: ' . $validator->errors()->first());
        return redirect('/create');
    }


    // Handle File Upload
    $file = $request->file('imageUpload');
    if(!$file->move("uploads", $file->getClientOriginalName()))
    {
        session()->flash('error', "Image Failed to Upload");
        return redirect('/create');
    } 

    

    // Create a new Plane record
    Plane::create([
        'name' => $request->input('name'),
        'type' => $request->input('type'),
        'brand' => $request->input('brand'),
        'quantity' => $request->input('quantity'),
        'path' => '/uploads/' . $file->getClientOriginalPath(),
        'created_at' => now(),
    ]);

    // Redirect with success message
    session()->flash('success', 'Plane data has been successfully added!');
    return redirect()->route('home');
}

    

}

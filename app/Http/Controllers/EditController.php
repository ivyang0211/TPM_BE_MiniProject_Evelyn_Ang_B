<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plane;
use Illuminate\Support\Facades\Log;
use Validator;

class EditController extends Controller
{    
    
    public function edit($id) {
        $plane = Plane::findOrFail($id); // Get a single Plane record
    return view('edit', compact('plane'));
    }
    public function update(Request $request, $id) {
        
        $rules = [
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'imageEdit' => 'nullable|image|mimes:jpg,jpeg,png,gif'
        ];        
    
        $validator = Validator::make($request->all(), $rules);
        
        // Validator Handler
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        // File Upload Handling                
        $plane = Plane::where('id', '=', $id);          
        Log::info('Debug: ', ['hasFile' => $request->hasFile('imageEdit')]);
        if(!$request->hasFile('imageEdit')) {              
            $imageLink = $plane->value('path');
        } else {
            $file = $request->file('imageEdit');        
            $file->move('uploads', $file->getClientOriginalName());
            $imageLink = '/uploads/' . $file->getClientOriginalPath() ;
        }

        // Update     
        $plane->update(
            [
                'name' => $request->input('name'),
                'type' => $request->input('type'),
                'brand' => $request->input('brand'),
                'quantity' => $request->input('quantity'),
                'path' =>  $imageLink
            ]
        );
    
        // State Update
        return redirect()->route('home')->with('success', 'Plane updated successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(): View
    {
        return view('image');
    }

 public function imageUpload(Request $request): RedirectResponse
{
    $request->validate([
        'image.*' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:5120',
    ]);

    if ($request->hasFile('image')) {
        $imageNames = [];
    
        foreach ($request->file('image') as $value) {
            $originalName = $value->getClientOriginalName();
            $imageName = time() . '_' . $originalName;
            
            $imageNames[] = $imageName;
    
            $value->move(public_path('storage'), $imageName);
        }
    
        $imageNamesStr = implode(', ', $imageNames);
    
        return redirect()->back()->withSuccess('Success.')->with('image', $imageNamesStr);
    }
    

    return redirect()->back()->withErrors('Not found.');
}
}

<?php

namespace App\Http\Controllers;

use App\Models\ImageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function index()
    {
        $data = DB::table('images')->get();
        return view('list', ['images' => $data]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust the validation rules as needed
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Save to storage
            $path = $image->storeAs('public/images', $imageName);

            // Save to database
            ImageModel::create([
                'name' => $imageName,
                'path' => str_replace('public', 'storage', $path), // Adjust as per your storage configuration
                'desc' => $request->input('desc'), // assuming you have a field named 'desc' in your form
            ]);

            return redirect()->back()->with('success', 'Image uploaded successfully.');
        }

        return redirect()->back()->with('error', 'Failed to upload image.');
    }
}

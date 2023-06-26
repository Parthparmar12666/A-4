<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('uploads'), $imageName);

        $imageModel = new Image();
        $imageModel->filename = $imageName;
        $imageModel->filepath = '/uploads/' . $imageName;
        $imageModel->save();

        return response()->json([
            'message' => 'Image uploaded successfully',
            'image' => $imageModel,
        ], 201);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $category = Category::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
            ]);

            if (!$request->hasFile('file')) {
                return redirect()->back()->with('error', 'No file uploaded.');
            } else {

                $file = $request->file('file');

                // Check if the file upload was successful
                if (!$file->isValid()) {
                    return redirect()->back()->with('error', 'File upload failed. Error Code: ' . $file->getError());
                }

                // Check for double dots in filename
                if (substr_count($file->getClientOriginalName(), '.') > 1) {
                    return redirect()->back()->with('error', 'Invalid file name: Double dot detected.');
                }

                // Get MIME type
                $finfo = new \finfo(FILEINFO_MIME_TYPE);
                $mime_type = $finfo->file($file->getPathname());

                // Fix for application/octet-stream
                if ($mime_type == "application/octet-stream") {
                    $mime_type = $file->getMimeType();
                }

                // Allowed MIME types
                $allowedMimeTypes = ["image/png", "image/jpeg", "application/octet-stream"];

                if (!in_array($mime_type, $allowedMimeTypes)) {
                    return redirect()->back()->with('error', 'Invalid file type: Only JPG and PNG are allowed.');
                }

                // Allowed extensions
                $allowedExtensions = ["jpg", "jpeg", "png"];
                $extension = strtolower($file->getClientOriginalExtension());

                if (!in_array($extension, $allowedExtensions)) {
                    return redirect()->back()->with('error', 'Invalid file extension.');
                }

                // Generate unique filename
                $fileName = time() . '.' . $extension;

                // Move file to storage
                $file->move(public_path('uploads/categoryfiles'), $fileName);

                // Get file URL
                $file_path = asset('uploads/categoryfiles/'. $fileName);

                $category->update([
                    'file' => $fileName,
                ]);
            }

            return redirect()->back()->with('success', 'Category is created successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = Category::where('id',$id)->first();
            $category->delete();

            return redirect()->back()->with('success','Category has been deleted.');

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error','Something went wrong');
        }
    }
}

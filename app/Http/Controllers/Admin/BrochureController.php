<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\BrochureFile;
use App\Models\BrochureRequest;
use App\Models\cr;
use Illuminate\Http\Request;

class BrochureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = BrochureRequest::paginate(20);
        return view('backend.brochure.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function upload()
    {
        $brochurefile = BrochureFile::get();
        return view('backend.brochure.upload', compact('brochurefile'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function uploadFile(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);
        try {
            $files = BrochureFile::create([
                'name' => $request->name,
            ]);

            if (!$request->hasFile('file')) {
                return redirect()->back()->with('error', 'No file uploaded.');
            } else {
                // dd('here');
                $file = $request->file('file');

                if (!$file->isValid()) {
                    return redirect()->back()->with('error', 'File upload failed. Error Code: ' . $file->getError());
                }

                if (substr_count($file->getClientOriginalName(), '.') > 1) {
                    return redirect()->back()->with('error', 'Invalid file name: Double dot detected.');
                }

                $finfo = new \finfo(FILEINFO_MIME_TYPE);
                $mime_type = $finfo->file($file->getPathname());

                if ($mime_type == "application/octet-stream") {
                    $mime_type = $file->getMimeType();
                }


                $allowedMimeTypes = ["image/png", "image/jpeg", "image/jpg", "application/pdf"];

                if (!in_array($mime_type, $allowedMimeTypes)) {
                    return redirect()->back()->with('error', 'Invalid file type.');
                }

                // Allowed extensions
                $allowedExtensions = ["jpg", "jpeg", "png", 'pdf'];
                $extension = strtolower($file->getClientOriginalExtension());

                if (!in_array($extension, $allowedExtensions)) {
                    return redirect()->back()->with('error', 'Invalid file extension.');
                }

                // Generate unique filename
                $fileName = time() . '.' . $extension;

                $file->move(public_path('uploads/brochures'), $fileName);
                $file_path = asset('uploads/brochures/' . $fileName);

                // dd($fileName);

                $files->update([
                    'file' => $fileName
                ]);
            }

            return redirect()->back()->with('success', 'File uploaded successfully.');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function changeStatus($id){
        try {

            $brochure = BrochureFile::find($id);
            if($brochure->status == 0){
                $brochure->update([
                    'status' => 1
                ]);
            }else{
                $brochure->update([
                    'status' => 0
                ]);
            }

            return redirect()->back()->with('success', 'Status changed successfully.');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }


}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::get();
        return view('backend.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'file' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        // dd($request->all());

        DB::beginTransaction();
        try {
            if (!$request->hasFile('file')) {
                return redirect()->back()->with('error', 'No file uploaded.');
            }

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
            $file->move(public_path('uploads/banner'), $fileName);

            // Get file URL
            $file_path = asset('uploads/banner/' . $fileName);

            // dd($fileName);

            Banner::create([
                'file' => $fileName
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Banner Image added successfully');
        } catch (\Throwable $th) {
            //throw $th;
            // dd($th->getMessage());
            DB::rollback();
            return redirect()->back()->with('error', 'Something went wrong'.$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $banner = Banner::find($id);
        $banner->delete();
        return redirect()->back()->with('success', 'Banner Image deleted successfully');
    }

    public function changeStatus(Request $request)
    {
        $id = Crypt::decrypt($request->id);
        $banner = Banner::find($id);
        if($banner->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        $banner->status = $status;
        $banner->save();
        return redirect()->back()->with('success', 'Banner Image status changed successfully');
    }
}

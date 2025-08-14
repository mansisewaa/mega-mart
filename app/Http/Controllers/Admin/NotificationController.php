<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Section;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Crypt;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::orderBy('list_order')->paginate(30);
        return view('backend.notification.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::where('status', 1)->get();
        return view('backend.notification.create', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' =>  'required',
        ]);
       $notification = Notification::count();
        DB::beginTransaction();
        try {
            $section = implode(',', $request->section);
            $data = Notification::create([
                'title' => $request->title,
                'descrption' => $request->description,
                'section' => $section,
                'new' => $request->new,
                'list_order' => $notification+1 ,
            ]);
            $file = $request->file('file');
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mime_type = $finfo->file($request->file('file'));
            if (substr_count($request->file('file'), '.') > 1) {
                return redirect()->back()->with('error', 'Doube dot in filename');
            }
            $allowedMimeTypes = [
                'application/pdf',
                'application/msword',
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
            ];
            if (!in_array($mime_type, $allowedMimeTypes)) {
                return redirect()->back()->with('error', 'File type not allowed');
            }
            $extension = $file->getClientOriginalExtension();
            if (!in_array(strtolower($extension), ['pdf', 'doc', 'docx'])) {
                return redirect()->back()->with('error', 'File type not allowed');
            }

            $fileName = time() . '.' . $request->file->getClientOriginalExtension();
            Request()->file('file')->move(public_path('uploads/notification/' . $data->id), $fileName);
            $file_path = asset('public/uploads/notification') . '/' . $data->id . '/' . $fileName;

            $data->update([
                'file' => $fileName,
            ]);

            DB::commit();
            return redirect()->route('notification.index')->with('success', 'Notifcation created successfully');
        } catch (\Throwable $th) {
            //throw $th;
            // dd($th);
            DB::rollback();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $id = Crypt::decrypt($id);
        $notification = Notification::where('id', $id)->first();
        return view('backend.notification.view', compact('notification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $notification = Notification::where('id', $id)->first();
        $sections = Section::where('status', 1)->get();
        return view('backend.notification.edit', compact('notification', 'sections'));
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
        $request->validate([
            'title' => 'required',
        ]);

        $id = Crypt::decrypt($id);
        DB::beginTransaction();
        try {
            $notification = Notification::where('id', $id)->first();
            $section = implode(',', $request->section);
            $notification->update([
                'title' => $request->title,
                'descrption' => $request->description,
                'section' => $section,
                'new' => $request->new,
            ]);

            if ($request->has('file')) {
                $file = $request->file('file');
                $finfo = new \finfo(FILEINFO_MIME_TYPE);
                $mime_type = $finfo->file($request->file('file'));
                if (substr_count($request->file('file'), '.') > 1) {
                    return redirect()->back()->with('error', 'Doube dot in filename');
                }
                $allowedMimeTypes = [
                    'application/pdf',
                    'application/msword',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
                ];
                if (!in_array($mime_type, $allowedMimeTypes)) {
                    return redirect()->back()->with('error', 'File type not allowed');
                }
                $extension = $file->getClientOriginalExtension();
                if (!in_array(strtolower($extension), ['pdf', 'doc', 'docx'])) {
                    return redirect()->back()->with('error', 'File type not allowed');
                }

                $fileName = time() . '.' . $request->file->getClientOriginalExtension();
                Request()->file('file')->move(public_path('uploads/notification/' . $notification->id), $fileName);
                $file_path = asset('public/uploads/notification') . '/' . $notification->id . '/' . $fileName;

                $notification->update([
                    'file' => $fileName,
                ]);
            }
            DB::commit();
            return redirect()->route('notification.index')->with('success','Notification has been updated successfully');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error', $th->getMessage());
        }
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
        $notification = Notification::where('id', $id)->first();
        $notification->delete();
        return redirect()->back()->with('success', 'Notification has been deleted successfully');
    }

    public function updateOrder(Request $request)
    {
        try {
            $sortedIDs = $request->input('sortedIDs');
            foreach ($sortedIDs as $index => $notificationId) {
                Notification::where('id', $notificationId)->update(['list_order' => $index + 1]);
            }
            return response()->json(['success' => true,'data' => $sortedIDs]);
        } catch (\Exception $e) {
            \Log::error('Error updating order: ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => 'Error updating order.']);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Image;
use App\Models\SubAlbum;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB, Crypt;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::get();
        return view('backend.album.index', compact('albums'));
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
        //     'title' => 'required',
        //     'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        // ]);
        DB::beginTransaction();
        try {
            $album = new Album();
            $album->name = $request->title;
            $album->slug = Str::slug($request->title);
            //image store
            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/album'), $imageName);
                $album->cover_image = $imageName;
            }
            $album->save();
            DB::commit();
            return redirect()->back()->with('success', 'Album created successfully');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            // dd($th);
            return redirect()->back()->with('error', 'Album creation failed');
        }
    }

    public function subAlbum($id)
    {
        $id = Crypt::decrypt($id);
        $album = Album::where('id', $id)->first();
        $sub_albums = SubAlbum::where('album_id', $id)->get();
        return view('backend.album.sub-album', compact('album', 'sub_albums'));
    }


    public function storeSubAlbum(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $album = Album::where('id', $id)->first();
        // $request->validate([
        //     'title' => 'required',
        //     'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        // ]);
        DB::beginTransaction();
        try {
            $sub_album = new SubAlbum();
            $sub_album->name = $request->title;
            $sub_album->slug = Str::slug($request->title);
            $sub_album->album_id = $album->id;
            //image store
            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/album/subalbum'), $imageName);
                $sub_album->cover_image = $imageName;
            }
            $sub_album->save();

            $album->update([
                'has_subcategory' => 1,
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Sub Album created successfully');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            // dd($th);
            return redirect()->back()->with('error', 'Album creation failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addImage($type, $id)
    {
        $id = Crypt::decrypt($id);
        if ($type == 'album') {
            $album = Album::where('id', $id)->first();
            $images = Image::where('album_id', $id)->get();
        } else {
            $album = SubAlbum::where('id', $id)->first();
            $images = Image::where('subalbum_id', $id)->where('album_id', $album->album_id)->get();
        }

        return view('backend.album.add-image', compact('album', 'images', 'type'));
    }

    public function storeImages(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,mp4|max:50000',

        ]);
        DB::beginTransaction();
        $id = Crypt::decrypt($id);
        if ($request->type == 'album') {
            $album_id = $id;
            $sub_album_id = NULL;
        } else {
            $album_id = SubAlbum::where('id', $id)->first()->album_id;
            $sub_album_id = $id;
        }
        try {
            // dd('reached');
            $data = new Image;
            $data->name = $request->title;
            $data->slug = Str::slug($request->title);
            $data->album_id = $album_id;
            $data->subalbum_id = $sub_album_id;
            if ($request->has('file')) {
                $image = $request->file('file');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/album/'), $imageName);
                $data->image = $imageName;
            } else {
                $data->link = $request->input('link');
            }
            $data->save();
            DB::commit();
            return redirect()->back()->with('success', 'Media added successfully');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            // dd($th);
            return redirect()->back()->with('error', 'Media creation failed');
        }
    }







    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteImage($id)
    {
        $id = Crypt::decrypt($id);
        $image = Image::where('id', $id)->first();
        $image->delete();
        return redirect()->back()->with('success', 'Image deleted successfully');
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
    public function deleteAlbum($id)
    {
        $id = Crypt::decrypt($id);
        $album = Album::where('id', $id)->first();
        $album->delete();
        return redirect()->back()->with('success', 'Album deleted successfully');
    }

    public function deleteSubAlbum($id)
    {
        $id = Crypt::decrypt($id);
        $album = SubAlbum::where('id', $id)->first();
        $album->delete();
        return redirect()->back()->with('success', 'Sub Album deleted successfully');
    }
}

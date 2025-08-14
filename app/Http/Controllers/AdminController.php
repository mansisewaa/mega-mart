<?php

namespace App\Http\Controllers;

use App\Models\ContactData;
use App\Models\Content;
use Illuminate\Http\Request;
use Auth;
use File;
use App\Models\Image;
use App\Models\Menu;
use App\Models\Products;
use DB;

class AdminController extends Controller
{


    public function store_image(Request $request)
    {
        //
        $request->validate([
            'image_name' => 'required',
            //'product_type'=>'required',
            //'price'=>'required',
            'image.*' => 'mimes:jpeg,png,jpg,gif,svg',

        ]);
        //dd($request);

        if ($file = $request->hasFile('image')) {

            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            //$extension = $file->getClientOriginalExtension();
            //$fileName = 'product'.time().rand(100,999).'.'.$extension;
            $destinationPath = public_path() . '/';
            $file->move($destinationPath, $fileName);
        } else {
            $fileName = "";
        }
        $item = new Item;
        $item->cat_id = $request->cat_name;
        $item->product_name = $request->item_name;
        $item->product_description = $request->item_description;
        $item->price = $request->price;
        $item->uom = $request->uom;
        $item->product_image = $fileName;
        $item->user_id = Auth::user()->id;
        $item->save();
        return redirect('/product')->with('success', 'Data Saved');
    }

    public function edit_product($id)
    {
        $data = Item::find($id);
        // dd($data);
        return view('items.edit', compact('id', 'data'));
    }

    public function update_product(Request $request, $id)
    {
        $request->validate([
            'item_name' => 'required',
            'product_image.*' => 'mimes:jpeg,png,jpg,gif,svg',
        ]);

        $item = Item::find($id);

        if (!$item) {
            return redirect('/product')->with('error', 'Item not found');
        }

        // Check if a new image is being uploaded
        if ($request->hasFile('product_image')) {
            // Delete the existing image, if it exists
            if (file_exists(public_path('/products/' . $item->product_image))) {
                File::delete(public_path('/products/' . $item->product_image));
            }

            $file = $request->file('product_image');
            //$extension = $file->getClientOriginalExtension();
            //$fileName = 'product' . time() . rand(100, 999) . '.' . $extension;
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path('/products');
            $file->move($destinationPath, $fileName);

            $item->product_image = $fileName;
        }

        $item->cat_id = $request->cat_name;
        $item->product_name = $request->item_name;
        $item->product_description = $request->item_description;
        $item->price = $request->price;
        $item->uom = $request->uom;
        $item->user_id = Auth::user()->id;
        $item->save();

        return redirect('/product')->with('success', 'Data Updated');
    }

    //customer orders
    public function customer_orders()
    {
        $data = Order::orderBy('id', 'DESC')->get();
        if ($data) {
            foreach ($data as $key => $value) {
                $item = Item::where('id', $value->product_id)->first();
                if ($item) {
                    $data[$key]->product_name = $item->product_name;
                }
            }
            return view('orders.view', compact('data'));
        }
    }

    public function addContent($slug)
    {
        $data = Menu::where('slug', $slug)->first();
        if ($data->slug == 'products-services') {
            $products = Products::get();
            return view('backend.menu.content.view-products', compact('products', 'data'));
        }elseif ($data->slug == 'contact-us') {
            $contactUs = ContactData::first();
            return view('backend.menu.content.addContactUs',compact('contactUs'));
        } else {
            $content = Content::where('menu_id', $data->id)->first();
            if ($content) {
                return view('backend.menu.content.add', compact('data', 'content'));
            } else {
                return view('backend.menu.content.add', compact('data', 'content'));
            }
        }
    }

    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'upload' => 'required | mimes:jpeg,png,jpg,pdf'
        ]);
        if ($validator->fails()) {
            $message = 'File type not allowed';
            $result = "<script>window.parent.CKEDITOR.tools.callFunction('$message')</script>";
        }
        if ($request->hasFile('upload')) {
            // dd($file);
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mime_type = $finfo->file($request->file('upload'));
            $extension = $request->file('upload')->getClientOriginalExtension();
            if ($mime_type != "image/png" && $mime_type != "image/jpeg" && $mime_type != "application/pdf") {
                $message = 'File type not allowed';
                // $result = "<script>window.parent.CKEDITOR.tools.callFunction('$message')</script>";
                $result = "<script>alert('$message')</script>";
            } elseif ($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "pdf") {
                $message = 'File type not allowed';
                // $result = "<script>window.parent.CKEDITOR.tools.callFunction('$message')</script>";
                $result = "<script>alert('$message')</script>";
            } else {
                $filenamewithextension = $request->file('upload')->getClientOriginalName();
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $extension = $request->file('upload')->getClientOriginalExtension();
                $filenametostore = $filename . '_' . time() . '.' . $extension;

                $request->file('upload')->move('public/uploads', $filenametostore);

                $CKEditorFuncNum = $request->input('CKEditorFuncNum');
                $url = asset('public/uploads/' . $filenametostore);
                $message = 'File uploaded successfully';
                $result = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message')</script>";
            }

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $result;
        }
    }


    public function storeContent(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        try {
            $menu = Menu::where('slug', $request->slug)->firstOrFail();
            $content = Content::where('menu_id', $menu->id)->first();

            if ($content) {
                $content->update([
                    'content' => $request->content,
                ]);
                $message = 'Content Updated';
            } else {

                $content = Content::create([
                    'menu_id' => $menu->id,
                    'content' => $request->content,
                ]);
                $message = 'Content Created';
            }
            return redirect()->back()->with('success', $message);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $th->getMessage());
        }
    }

    public function addProducts()
    {
        return view('backend.menu.content.addproducts');
    }

    public function storeProducts(Request $request)
    {
        $request->validate([
            'code' => 'nullable',
            'title' => 'required',
            'file' => 'required|mimes:jpeg,png,jpg,svg|max:2048',
            'description' => 'required',
        ]);
        DB::beginTransaction();
        try {

            $file = $request->file('file');
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mime_type = $finfo->file($request->file('file'));
            if (substr_count($request->file('file'), '.') > 1) {
                return redirect()->back()->with('error', 'Doube dot in filename');
            }
            if ($mime_type != "image/png" && $mime_type != "image/jpeg") {
                return redirect()->back()->with('error', 'File type not allowed');
            }
            $extension = $request->file('file')->getClientOriginalExtension();
            if ($extension != "jpg" && $extension != "jpeg" && $extension != "png") {
                return redirect()->back()->with('error', 'File type not allowed');
            }

            $fileName = time() . '.' . $request->file->getClientOriginalExtension();
            Request()->file('file')->move(public_path('uploads/products'), $fileName);
            $file_path = asset('uploads/products') . '/' . $fileName;

            $product = Products::create([
                'category' =>  $request->category,
                'product_code' => $request->code,
                'product_name' => $request->title,
                'product_image' => $fileName,
                'product_description' => $request->description,
            ]);
            DB::commit();
            return redirect()->route('add-content','products-services')->with('success', 'Product added successfully');
        } catch (\Throwable $th) {
            //throw $th;
            // dd($th->getMessage());
            DB::rollback();
            return redirect()->back()->with('error', 'Something went wrong: ' . $th->getMessage());
        }
    }

    public function editProducts($id)
    {
        $product = Products::find($id);
        return view('backend.menu.content.editproducts', compact('product'));
    }

    public function updateProducts(Request $request, $id)
    {
        $request->validate([
            'code' => 'nullable',
            'title' => 'required',
            'file' => 'nullable|mimes:jpeg,png,jpg,svg|max:2048',
            'description' => 'required',
        ]);
        DB::beginTransaction();
        try {



            $product = Products::where('id',$id)->update([
                'category' =>  $request->category,
                'product_code' => $request->code,
                'product_name' => $request->title,
                'product_description' => $request->description,
            ]);

            if ($request->has('file')) {
                $file = $request->file('file');
                $finfo = new \finfo(FILEINFO_MIME_TYPE);
                $mime_type = $finfo->file($request->file('file'));
                if (substr_count($request->file('file'), '.') > 1) {
                    return redirect()->back()->with('error', 'Doube dot in filename');
                }
                if ($mime_type != "image/png" && $mime_type != "image/jpeg") {
                    return redirect()->back()->with('error', 'File type not allowed');
                }
                $extension = $request->file('file')->getClientOriginalExtension();
                if ($extension != "jpg" && $extension != "jpeg" && $extension != "png") {
                    return redirect()->back()->with('error', 'File type not allowed');
                }

                $fileName = time() . '.' . $request->file->getClientOriginalExtension();
                Request()->file('file')->move(public_path('uploads/products'), $fileName);
                $file_path = asset('uploads/products') . '/' . $fileName;

                $product = Products::where('id',$id)->update([
                    'product_image' => $fileName,
                ]);

            }
            DB::commit();
            return redirect()->route('add-content','products-services')->with('success', 'Product Updated successfully');
        } catch (\Throwable $th) {
            //throw $th;
            // dd($th->getMessage());
            DB::rollback();
            return redirect()->back()->with('error', 'Something went wrong: ' . $th->getMessage());
        }
    }


    public function updateContactUs(Request $request) {
        $request->validate([
            'address' => 'required',
            'mail' => 'required',
            'phone_no' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $contact = ContactData::where('id', 1)->update([
                'address' => $request->address,
                'mail' => $request->mail,
                'phone_no' => $request->phone_no,
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Contact Updated successfully');
        } catch (\Throwable $th) {
            //throw $th;
            // dd($th->getMessage());
            DB::rollback();
            return redirect()->back()->with('error', 'Something went wrong: ' . $th->getMessage());
        }

    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login'); // Redirect to the desired URL after logout
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ContactData;
use App\Models\Content;
use Illuminate\Http\Request;
use Auth;
use File;
use App\Models\Image;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Products;
use DB;

class AdminController extends Controller
{


    public function store_image(Request $request)
    {

        $request->validate([
            'image_name' => 'required',
            //'product_type'=>'required',
            //'price'=>'required',
            'image.*' => 'mimes:jpeg,png,jpg,gif,svg',

        ]);

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
    // public function customer_orders()
    // {
    //     $data = Order::orderBy('id', 'DESC')->get();
    //     if ($data) {
    //         foreach ($data as $key => $value) {
    //             $item = Item::where('id', $value->product_id)->first();
    //             if ($item) {
    //                 $data[$key]->product_name = $item->product_name;
    //             }
    //         }
    //         return view('orders.view', compact('data'));
    //     }
    // }

    public function addContent($slug)
    {
        $data = Menu::where('slug', $slug)->first();
        if ($data->slug == 'products') {
            $products = Products::get();
            $categories = Category::get();
            return view('backend.menu.content.view-products', compact('products', 'data', 'categories'));
        } elseif ($data->slug == 'contact-us') {
            $contactUs = ContactData::first();
            return view('backend.menu.content.addContactUs', compact('contactUs'));
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


    public function productsIndex() {}

    public function addProducts()
    {
        $categories = Category::get();
        return view('backend.menu.content.addproducts', compact('categories'));
    }

    public function storeProducts(Request $request)
    {
        $request->validate([
            'category_id' => 'required|string|max:250',
            'code' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'file' => 'nullable|mimes:jpeg,png,jpg,svg|max:2048',
            'description' => 'required|string',
            'original_price' => 'nullable|numeric',
            'discount_price' => 'nullable|numeric',
        ]);

        DB::beginTransaction();
        try {

            $file = $request->file('file');

            if (!$file->isValid()) {
                return redirect()->back()->with('error', 'File upload failed. Error Code: ' . $file->getError());
            } else {

                if (substr_count($file->getClientOriginalName(), '.') > 1) {
                    return redirect()->back()->with('error', 'Invalid file name: Double dot detected.');
                }

                $finfo = new \finfo(FILEINFO_MIME_TYPE);
                $mime_type = $finfo->file($file->getPathname());


                if ($mime_type == "application/octet-stream") {
                    $mime_type = $file->getMimeType();
                }

                $allowedMimeTypes = ["image/png", "image/jpeg", "application/octet-stream"];

                if (!in_array($mime_type, $allowedMimeTypes)) {
                    return redirect()->back()->with('error', 'Invalid file type: Only JPG and PNG are allowed.');
                }

                $allowedExtensions = ["jpg", "jpeg", "png"];
                $extension = strtolower($file->getClientOriginalExtension());

                if (!in_array($extension, $allowedExtensions)) {
                    return redirect()->back()->with('error', 'Invalid file extension.');
                }


                $fileName = time() . '.' . $extension;
                $file->move(public_path('uploads/products'), $fileName);
                $file_path = asset('uploads/products/' . $fileName);
            }



            $products = Products::create([
                'category_id' => $request->category_id,
                'product_code' => $request->code,
                'product_name' => $request->title,
                'product_image' => $fileName,
                'product_description' => $request->description,
                'product_original_price' => $request->original_price,
                'product_discount_price' => $request->discount_price,
            ]);

            DB::commit();
            return redirect()->route('add-content', 'products')->with('success', 'Product added successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            // dd($th->getMessage());
            return redirect()->back()->with('error', 'Something went wrong: ' . $th->getMessage());
        }
    }


    public function editProducts($id)
    {
        $product = Products::find($id);
        $categories = Category::get();
        return view('backend.menu.content.editproducts', compact('product', 'categories'));
    }

    public function updateProducts(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|string|max:250',
            'code' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'file' => 'nullable|mimes:jpeg,png,jpg,svg|max:2048',
            'description' => 'required|string',
            'original_price' => 'nullable|numeric',
            'discount_price' => 'nullable|numeric',
        ]);
        DB::beginTransaction();
        try {

            $product = Products::where('id', $id)->first();
            $product->update([
                'category_id' => $request->category_id,
                'product_code' => $request->code,
                'product_name' => $request->title,
                'product_description' => $request->description,
                'product_original_price' => $request->original_price,
                'product_discount_price' => $request->discount_price,
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

                $product->update([
                    'product_image' => $fileName,
                ]);
            }
            DB::commit();
            return redirect()->route('add-content', 'products')->with('success', 'Product Updated successfully');
        } catch (\Throwable $th) {
            //throw $th;
            // dd($th->getMessage());
            DB::rollback();
            return redirect()->back()->with('error', 'Something went wrong: ' . $th->getMessage());
        }
    }

    public function deleteProducts($id)
    {
        $product = Products::find($id);
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }


    public function updateContactUs(Request $request)
    {
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


    public function getOrders()
    {
        $orders = Order::with('items.product')->get();
        return  view('backend.orders', compact('orders'));
    }

    public function updateOrderStatus(Request $request,$id)
    {
        try {
            $order = Order::where('id',$id)->first();
            $order->update([
                'status' => $request->status,
                'expected_delivery_date' =>$request->delivery_date,
            ]);

            return redirect()->back()->with('success', 'Order updated successfully.');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Something went wrong: ' . $th->getMessage());
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/login'); // Redirect to the desired URL after logout
    }
}

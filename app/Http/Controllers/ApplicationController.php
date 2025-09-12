<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BrochureRequest;
use App\Models\Cart;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Content;
use App\Models\Menu;
use App\Models\Products;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $banner     = Banner::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        $products   = Products::where('status', 1)->get();

        $wishlistIds = [];
        if (Auth::guard('customer')->check()) {
            $wishlistIds = Wishlist::where('customer_id', Auth::guard('customer')->id())
                ->pluck('product_id')
                ->toArray();
        }

        $w_f = Category::where('slug', 'ward-furniture')->first();
        $e_t = Category::where('slug', 'examination-tables')->first();
        $ward_furnitures = Products::where('category_id', $w_f->id)->where('status', 1)->get();
        $ex_tables = Products::where('category_id', $e_t->id)->where('status', 1)->get();
        return view('index', compact('banner', 'categories', 'products', 'wishlistIds','ward_furnitures','ex_tables'));
    }
    public function getBrochure()
    {
        return view('brochure');
    }

    // public function downloadBrochure(Request $request) {
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'phone' => 'required|digits:10',
    //         'email' => 'required|email',
    //         'company_name' => 'nullable|string|max:255',
    //         'message' => 'nullable|string',
    //     ]);

    //     BrochureRequest::create($validated);
    //     session()->flash('success', 'Brochure downloaded successfully!');
    //     return response()->download(public_path('/pdf/brochure.pdf'));

    // }

    public function downloadBrochure(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'phone'        => 'required|digits:10',
            'email'        => 'required|email',
            'company_name' => 'nullable|string|max:255',
            'message'      => 'nullable|string',
        ]);

        BrochureRequest::create($validated);

        session()->flash('success', 'Brochure downloaded successfully!');
        session()->flash('brochure_url', asset('pdf/brochure.pdf'));
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getAbout()
    {
        $menu = Menu::where('slug', 'about')->first();
        $data = Content::where('menu_id', $menu->id)->first();
        return view('about', compact('data'));
    }

    public function getContent($slug)
    {
        $menu = Menu::where('slug', $slug)->first();
        if ($menu) {
            $data = Content::where('menu_id', $menu->id)->first();
            return view('content', compact('menu', 'data'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function getProducts()
    {

        $categories = Category::get();
        $products  = Products::where('status', 1)->with('category')->get();
        return view('products', compact('products', 'categories'));
    }

    public function getProductDetails($id)
    {
        $data = Products::where('id', $id)->first();
        return view('product-details', compact('data'));
    }

    /**
     * Display the specified resource.
     */
    public function getContacts()
    {
        return view('contacts');
    }

    public function storeContactUs(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'contact' => 'required',
            'company_name' => 'required',
        ]);
        try {
            $data = $request->all();
            ContactUs::create($data);
            return redirect()->back()->with('success', 'Thank You for contacting us');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', 'Something went wrong');
        }
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
    public function productView($id)
    {
        $product = Products::find($id);
        return view('product-details', compact('product'));
    }

    public function byCategory($id)
    {
        $categories = Category::all();
        $products = Products::where('category_id', $id)->get();

        return view('products', compact('categories', 'products', 'id'));
    }
}

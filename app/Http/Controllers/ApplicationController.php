<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrochureRequest;
use App\Models\Banner;
use App\Models\Content;
use App\Models\Menu;
use App\Models\Products;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $banner = Banner::where('status',1)->get();
        return view('index', compact('banner'));
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

     public function downloadBrochure(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|digits:10',
            'email' => 'required|email',
            'company_name' => 'nullable|string|max:255',
            'message' => 'nullable|string',
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
        return view('about',compact('data'));
    }


    public function getContent($slug) {
        $menu =Menu::where('slug', $slug)->first();
        if($menu) {
            $data = Content::where('menu_id', $menu->id)->first();
            return view('content', compact('menu','data'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function getProducts()
    {

        $getCategory = Products::select('category')->distinct()->get();
        $products = [];
        foreach ($getCategory as $category) {
            $products[$category->category] = Products::where('category', $category->category)->get();
        }

        // dd($products);
        return view('products',compact('products'));
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
        //
    }
}

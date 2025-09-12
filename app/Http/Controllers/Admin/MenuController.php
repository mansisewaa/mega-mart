<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use Str;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::get();
        return view('backend.menu`.index',compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try{
            Menu::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
            ]);

            return back()->with('success', 'Menu created successfully');
        }catch(\Exception $e){
            return back()->with('error', 'Something went wrong');
        }
    }


    public function addSubmenu($slug)
    {
        $menu = Menu::where('slug', $slug)->first();
        $submenus = SubMenu::where('menu_id', $menu->id)->get();
        return view('backend.menu.submenu', compact('menu','submenus'));

    }

    public function storeSubmenu(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        // dd($request->all());
        try{
            SubMenu::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'status' => $request->status,
                'menu_id' => $request->menu_id,
            ]);

            return back()->with('success', 'SubMenu created successfully');
        }catch(\Exception $e){
            // dd($e->getMessage());
            return back()->with('error', 'Something went wrong');
        }
    }


    public function edit($id)
    {
        // dd($id);
        $menu = Menu::find($id);
        return view('backend.menu.edit', compact('menu'));
    }

    public function updateMenu(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try{
            Menu::where('id', $id)->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
            ]);

            return redirect()->route('menu.index')->with('success', 'Menu updated successfully');
        }catch(\Exception $e){
            // dD($e);
            return back()->with('error', 'Something went wrong');
        }
    }


    public function changeStatus($id) {
        $menu = Menu::find($id);
        if($menu->status == 1) {
            $menu->status = 0;
        } else {
            $menu->status = 1;
        }
        $menu->save();
        return back()->with('success', 'Status changed successfully');

    }

}

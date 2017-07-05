<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\MenuList;
use App\Pages;

class MenuController extends Controller
{
    public function __construct(Menu $menu)
    {
        $this->middleware('auth'); // must sign in in oder to create a posts
    }

    public function index()
    {
        $pages = Pages::where('user_id', '=', auth()->user()->id)
                    ->where('status', 2)
                    ->get();

        $menu = Menu::latest()->get();

        return view('menu.index', compact(['pages', 'menu']));
    }

    public function store(Request $request)
    {
        $this->validate(
            request(), [
                'menu_name' => 'required|string'
            ]
        );

        $menu = Menu::create([
            'menu_name' => request('menu_name'),
            'menu_slug' => str_replace(" ", "-", strtolower(request('menu_name')))
        ]);

        \Session::flash('flash_message', request('menu_name') . ' was successfully created.');

        return redirect('/menu/edit/' . $menu->id);
    }

    public function edit(Menu $menu)
    {
        $pages = Pages::where('user_id', '=', auth()->user()->id)
                    ->where('status', 2)
                    ->get();
        $menuAll = Menu::latest()->get();
        $menulist = MenuList::leftJoin('menus', 'menus.id', '=', 'menu_lists.menu_id')
                    ->leftJoin('pages', 'pages.id', '=', 'menu_lists.page_id')
                    ->where('menus.id', '=', $menu->id)
                    ->orderBy('menu_lists.sort_id', 'ASC')
                    ->get([
                        'menus.id', 
                        'menus.menu_name', 
                        'menus.menu_slug', 
                        'menus.is_active', 
                        'menu_lists.id as menu_list_id', 
                        'menu_lists.sort_id', 
                        'menu_lists.page_id', 
                        'menu_lists.menu_id', 
                        'pages.title'
                    ]);

        return view('menu.edit', compact([
            'menu',
            'pages',
            'menuAll',
            'menulist'
        ]));
    }

    public function storelist(Request $request)
    {
        for ($i = 1; $i < count($request->request); $i++) {
            $menuList = new MenuList();
            $menuList->sort_id = request('input' . $i)['sort_id'];
            $menuList->page_id = request('input' . $i)['page_id'];
            $menuList->menu_id = request('input' . $i)['menu_id'];
            $menuList->save();
        }

        \Session::flash('flash_message', 'Menu has been updated.');

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        // dd($request->request);
        for ($i = 1; $i < count($request->request); $i++) {
            MenuList::where('id', '=', request('input' . $i)['id'])->update([
                'sort_id' => request('input' . $i)['sort_id'],
                'page_id' => request('input' . $i)['page_id'],
                'menu_id' => request('input' . $i)['menu_id'],
            ]);
            Menu::find($id)->update([
                'menu_name' => request('menu_name')[0],
                'is_active' => request('active-menu')[0]
            ]);
            // MenuList::updateOrCreate([
            //     'sort_id' => request('input' . $i)['sort_id'],
            //     'page_id' => request('input' . $i)['page_id'],
            //     'menu_id' => request('input' . $i)['menu_id'],
            // ]);
        }

        \Session::flash('flash_message', 'Menu has been updated.');

        return redirect()->back();
    }

    public function deleteStorelist($id)
    {
        MenuList::find($id)->delete();
        
        return response()->json(['success' => 'Menu List: ' . $id . ' has been deleted']);
    }
}

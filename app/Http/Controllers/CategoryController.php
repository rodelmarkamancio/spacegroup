<?php

namespace App\Http\Controllers;

use DB; 
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Post;
use App\Category;

class CategoryController extends Controller
{
    public function lists()
    {
        $cat = Category::leftJoin('category_post', 'category_post.category_id', '=', 'categories.id')
                ->groupBy(['categories.id', 'categories.category_name', 'categories.category_slug'])
                ->get(['categories.id', 'categories.category_name', 'categories.category_slug', DB::raw('count(category_post.id) as total_posts')]);

        return view('postCategory.index', compact('cat'));
    }

    public function create()
    {
        return view('postCategory.create');
    }

    public function store(Category $category)
    {
        // validating
        $this->validate(
            request(), [
                'category_name' => 'required|min:2',
                'category_slug' => 'required|min:2',
            ]
        );

        $category->addCategory(request('category_name', 'category_slug'));

        // flash message
        \Session::flash('flash_message', request('category_name') . ' was successfully saved.');

        return redirect('/category/create');
    }

    public function edit($category)
    {
        $category = Category::where('id', $category)->get();
        
        return view('postCategory.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(
            request(), [
                'category_name' => 'required|min:2',
                'category_slug' => 'required|min:2',
            ]
        );

        Category::find($id)->update([
            'category_name' => request('category_name'),
            'category_slug' => str_replace(" ", "-", request('category_slug'))
        ]);

        // flash message
        \Session::flash('flash_message', request('category_name') . ' was successfully updated.');

        return redirect()->back();
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        
        return response()->json(['success' => 'Category ID: ' . $id . ' has been deleted']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UploadRequest;
use App\Pages;
use App\PagesPhotos;
use Carbon\Carbon;

class PagesController extends Controller
{
    public function __construct(Pages $pages)
    {
        $this->middleware('auth'); // must sign in in oder to create a posts
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Pages::latest()
                ->where('user_id', '=', auth()->user()->id)
                ->get();

        return view('pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadRequest $request)
    {
        // validating
        $this->validate(
            request(), [
                'title' => 'required|min:3',
                'description' => 'required|min:3',
                'status' => 'required'
            ]
        );

        auth()->user()->pagePublish(
            $page = new Pages(request(['permalinks', 'title', 'description', 'status']))
        );

        foreach ($request->photos as $photo) {
            $filename = $photo->store('photos');

            $photo->move(public_path("/uploads/photos"), $filename);

            PagesPhotos::create([
                'page_id' => $page->id,
                'filename' => $filename
            ]);
        }

        // flash message
        \Session::flash('flash_message', request('title') . ' was successfully saved.');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pages $pages)
    {
        return view('pages.show', compact('pages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pages)
    {
        // TODO
        $pages = Pages::where('id', $pages)->get()[0];

        return view('pages.edit', compact('pages'));
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
        // validating
        $this->validate(
            request(), [
                'title' => 'required|min:3',
                'description' => 'required|min:3',
                'status' => 'required'
            ]
        );

        Pages::find($id)->update($request->all());

        // flash message
        \Session::flash('flash_message', request('title') . ' was successfully saved.');

        // return redirect('edit_posts', $id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pages::find($id)->delete();
        
        return response()->json(['success' => 'Category ID: ' . $id . ' has been deleted']);
    }
}

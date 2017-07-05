<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UploadRequest;
use App\Post;
use App\PostsPhoto;
use App\Category;
use App\CategoryPost;
use Carbon\Carbon;

class PostsController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
        $this->middleware('auth'); // must sign in in oder to create a posts
        // $this->middleware('auth')->except(['index', 'show']); // must sign in in oder to create a posts
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()
                ->filter(request(['month', 'year']))
                ->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lists()
    {
        $posts = Post::latest()
                ->where('user_id', '=', auth()->user()->id)
                ->get();

        return view('posts.lists', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::latest()
                ->where('user_id', '=', auth()->user()->id)
                ->get();
        return view('posts.create', compact('cat'));
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
                'title' => 'required',
                'body' => 'required',
                'photos' => 'required'
            ]
        );

        // dd($request->categories);
        // adding
        auth()->user()->publish(
            $post = new Post(request(['title', 'body']))
        );
        foreach ($request->categories as $cat) {
            $post->category()->attach($cat);
        }
        
        // extract photo and store
        foreach ($request->photos as $photo) {
            $filename = $photo->store('photos');

            $photo->move(public_path("/uploads/photos"), $filename);

            PostsPhoto::create([
                'post_id' => $post->id,
                'filename' => $filename
            ]);
        }
        
        // flash message
        \Session::flash('flash_message', request('title') . ' was successfully saved.');

        return redirect('/posts/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $cat = Category::latest()
                ->where('user_id', '=', auth()->user()->id)
                ->get();

        $myCat = CategoryPost::with('Post')
                ->where('post_id', $post->id)
                ->with('User')
                ->latest()
                ->get();
        // dd($myCat);

        return view('posts.edit', compact(['cat', 'post', 'myCat']));
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
        $this->validate(
            request(), [
                'title' => 'required',
                'body' => 'required'
            ]
        );

        $post = Post::findOrFail($id);
        $input = $request->all();
        $post->fill($input)->save();

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
    public function destroy($post)
    {
        $post = Post::findOrFail($post);
        $post->delete();

        \Session::flash('flash_message', 'Post has been deleted');

        return redirect()->route('your_posts');
    }
}

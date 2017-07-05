<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Carbon\Carbon;

use DB;
use App\Category;
use App\CategoryPost;
use App\Comment;
use App\Menu;
use App\MenuList;
use App\Pages;
use App\PagesPhotos;
use App\Post;
use App\PostsPhoto;
use App\User;

class ApiController extends Controller
{
    public function pages()
    {   
        $page = Pages::leftJoin('pages_photos', 'pages_photos.page_id', '=', 'pages.id')
                ->get([
                    'pages.id', 'pages.title', 'pages.description', 'pages.permalinks', 'pages.status', 'pages.created_at', 'pages.updated_at',
                    'pages_photos.page_id as page_id', 'pages_photos.filename as filename'
                ]);

        return response()->json([
            'pages' => $page
        ]);
    }

    public function pageList($id)
    {
        $page = Pages::leftJoin('pages_photos', 'pages_photos.page_id', '=', 'pages.id')
                ->where('pages.id', '=', $id)
                ->get([
                    'pages.id', 'pages.title', 'pages.description', 'pages.permalinks', 'pages.status', 'pages.created_at', 'pages.updated_at',
                    'pages_photos.page_id as page_id', 'pages_photos.filename as filename'
                ]);

        return response()->json([
            'pages' => $page
        ]);
    }

    public function posts()
    {
        /*
        $posts = Post::join('posts_photos', 'posts_photos.post_id', '=', 'posts.id')
                ->groupBy(['posts.id', 'posts.title', 'posts.body', 'posts.created_at', 'posts.updated_at', 'posts_photos.post_id', 'posts_photos.filename'])
                ->get(['posts.id', 'posts.title', 'posts.body', 'posts.created_at', 'posts.updated_at', 'posts_photos.post_id as post_id', 'posts_photos.filename as filename']);

        $postData = [
            'posts' => []
        ];
        foreach ($posts as $key => $post) {
            $postInfo = [
                'id' => $post->id,
                'title' => $post->title,
                'body' => $post->body,
                'created_at' => $post->created_at,
                'updated_at' => $post->updated_at,
                'images' => []
            ];

            $postImage = [
                'filename' => $post->filename
            ];

            $postData['posts'][] = $postInfo;
            $postData['posts'][$key]['images'] = $postImage;
        }*/

        $posts = DB::table('posts')
                    ->join('posts_photos', 'posts.id', '=', 'posts_photos.post_id')
                    ->select('posts.id', 'posts.title', 'posts.body', 'posts.created_at', 'posts.updated_at', 'posts_photos.post_id as post_id', 'posts_photos.filename as filename')
                    ->get();
        
        $postData = [
            'posts' => []
        ];

        foreach ($posts as $key => $post) {
            $postInfo = [
                'id' => $post->id,
                'title' => $post->title,
                'body' => $post->body,
                'created_at' => $post->created_at,
                'updated_at' => $post->updated_at,
                'images' => []
            ];

            $postImage = [
                'filename' => $post->filename
            ];

            $postData['posts'][] = $postInfo;
            $postData['posts'][$key]['images'] = $postImage;
        }

        return response()->json($postData);
    }

    public function postList($id)
    {

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index()
    {
        $posts = Post::where([
            ['is_draft', '=', 0],
            ['published_at', '<', Carbon::now()->toDateTimeString()]
        ])->take(5)->get();

        return view('blog.theme.cleanBlog.index')->with('posts', $posts);
    }

    public function about()
    {
        return view('blog.theme.cleanBlog.about');
    }

    public function posts()
    {


    }

    public function show($id)
    {

        $post = Post::find($id);
        return view('blog.theme.cleanBlog.post')->with('post', $post);
    }
}


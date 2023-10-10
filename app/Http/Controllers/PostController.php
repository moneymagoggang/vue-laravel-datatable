<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index()
    {
        $paginate = \request('paginate', 10);
        $posts = Post::query()->paginate($paginate);

        return PostResource::collection($posts);
//        return view('layouts.app', ['posts' => $posts]);

    }
}

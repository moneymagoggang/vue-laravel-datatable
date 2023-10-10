<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;

use Illuminate\Http\Request;
use Laravel\Scout\Builder;

class PostController extends Controller
{
    //
    public function index()
    {
        $paginate = request('paginate', 10);
        $search_term = request('q','');
        $posts = Post::query()
            ->search(trim($search_term))
            ->paginate($paginate);

        return PostResource::collection($posts);
    }
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json(['message' => 'Post deleted successfully'], 200);
    }

}

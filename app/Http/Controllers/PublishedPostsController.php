<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Support\Settings;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublishedPostsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): View
    {
        $search = $request->input('search');

        return view('posts.index', [
            'posts' => Post::search($search)->published()->latest()->paginate(10),
            'categories' => Settings::getCategories(),
        ]);
    }
}

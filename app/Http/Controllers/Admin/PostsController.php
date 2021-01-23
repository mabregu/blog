<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    // public function create()
    // {
    //     $categories = Category::all();
    //     $tags = Tag::all();

    //     return view('admin.posts.create', compact('categories', 'tags'));
    // }

    public function store(Request $request)
    {
        //dd(Str::slug($request->get('title')));
        $this->validate($request, [
            'title' => 'required',
        ]);

        $post = Post::create([
            'title' => $request->get('title'),
            'url' => Str::slug($request->get('title'))
        ]);

        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('categories', 'tags', 'post'));
    }

    public function update(Post $post, Request $request)
    {
        //dd($request->get('category'));
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'excerpt' => 'required',
            'category' => 'required',
        ]);

        $post->title = $request->get('title');
        $post->url = Str::slug($post->title);
        $post->body = $request->get('content');
        $post->iframe = $request->get('iframe');
        $post->excerpt = $request->get('excerpt');
        $post->published_at = $request->has('published_at') ? Carbon::parse($request->get('published_at'))  : null;
        $post->category_id = $request->get('category');
        //TODO tags
        $post->save();

        $post->tags()->sync($request->get('tags'));

        return redirect()->route('admin.posts.edit', $post)->with('flash', __('Your post has been saved'));
    }
}

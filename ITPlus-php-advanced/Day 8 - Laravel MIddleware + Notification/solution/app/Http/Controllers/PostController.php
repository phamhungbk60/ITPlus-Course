<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('categories')->orderBy('updated_at', 'desc')->get();
        return view('posts.index', [
            'posts' => $posts,
            'Post' => new Post()
        ]);
    }

    public function create()
    {
        return view('posts.create', [
            'post' => new Post()
        ]);
    }

    public function store(Request $request)
    {
        $post = Post::create($request->input());
        if ($post !== null) {
            return redirect()->action([PostController::class, 'index']);
        }
    }

    public function edit(Request $request, Post $post)
    {
        //return true on request
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        //return true on request
        if ($post->update($request->input())) {
            return redirect()->action([PostController::class, 'index']);
        }
    }

    public function destroy(Post $post)
    {
        return $post->delete();
    }

    /**
     * Show post detail
     *
     * @return void
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Assign categories for specific post
     */
    public function assignCategories(Request $request, Post $post)
    {
        if ($request->method() === "POST") {
            //sync(): Chỉ có những giá trị được chọn trong mảng categories này thì mới được phép
            //tồn tại trong CSDL ở bảng pivot, và xoá các record mà category_id không có trong array
            //VD: sync([1,3,5]) ==> Chỉ có category = [1,3,5] thì có, còn id khác xoá hết
            $post->categories()->sync($request->input('categories'));
        }
        $categories = Category::all();
        $postCategories = $post->categories->pluck('pivot.category_id')->toArray();
        return view('posts.assign-categories', compact('post', 'categories', 'postCategories'));
    }
}

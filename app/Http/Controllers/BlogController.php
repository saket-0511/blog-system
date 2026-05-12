<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::latest('published_at');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $query->byCategory($request->category)
              ->byDate($request->date);

        $blogs = $query->paginate(9);

        if ($request->ajax()) {
            return response()->json([
                'html'       => view('blogs.partials.blog-cards', compact('blogs'))->render(),
                'pagination' => (string) $blogs->links(),
            ]);
        }

        $categories = Blog::select('category')->distinct()->pluck('category');

        return view('blogs.index', compact('blogs', 'categories'));
    }

    public function show($id)
    {
        $blog    = Blog::findOrFail($id);
        $related = Blog::where('category', $blog->category)
                       ->where('id', '!=', $id)
                       ->latest()
                       ->take(3)
                       ->get();

        return view('blogs.show', compact('blog', 'related'));
    }
}

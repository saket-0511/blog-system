<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    private $categories = [
        'Admit Card',
        'Result',
        'Answer Key',
        'Exam Date',
        'Information',
        'Syllabus',
        'Notification',
        'Recruitment',
    ];

    public function dashboard()
    {
        $total   = Blog::count();
        $cats    = Blog::select('category')->distinct()->count();
        $recent  = Blog::latest()->take(5)->get();
	$monthly = Blog::selectRaw("COUNT(*) as count, strftime('%m', published_at) as month")
               ->whereYear('published_at', date('Y'))
               ->groupBy('month')
               ->pluck('count', 'month');

        return view('admin.dashboard', compact('total', 'cats', 'recent', 'monthly'));
    }

    public function index()
    {
        $blogs = Blog::latest()->paginate(15);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = $this->categories;
        return view('admin.blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'             => 'required|max:255',
            'content'           => 'required',
            'category'          => 'required',
            'short_description' => 'nullable|max:500',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        Blog::create($data);

        return redirect()->route('admin.blogs.index')
                         ->with('success', 'Blog published successfully!');
    }

    public function show(Blog $blog)
    {
        return redirect()->route('blogs.show', $blog->id);
    }

    public function edit(Blog $blog)
    {
        $categories = $this->categories;
        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title'             => 'required|max:255',
            'content'           => 'required',
            'category'          => 'required',
            'short_description' => 'nullable|max:500',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        // Regenerate short_description if content changed and not manually set
        if (empty($data['short_description'])) {
            $data['short_description'] = substr(strip_tags($data['content']), 0, 200) . '...';
        }

        $blog->update($data);

        return redirect()->route('admin.blogs.index')
                         ->with('success', 'Blog updated successfully!');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }
        $blog->delete();

        return back()->with('success', 'Blog deleted successfully!');
    }
}

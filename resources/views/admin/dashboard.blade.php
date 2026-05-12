@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <div class="col-6 col-md-3">
        <div class="card border-0 text-center p-3" style="background:linear-gradient(135deg,#3b82f6,#6366f1);border-radius:14px">
            <i class="bi bi-file-earmark-text text-white mb-2" style="font-size:2rem"></i>
            <h2 class="fw-bold text-white mb-0">{{ $total }}</h2>
            <p class="text-white opacity-75 small mb-0">Total Blogs</p>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 text-center p-3" style="background:linear-gradient(135deg,#10b981,#059669);border-radius:14px">
            <i class="bi bi-tags text-white mb-2" style="font-size:2rem"></i>
            <h2 class="fw-bold text-white mb-0">{{ $cats }}</h2>
            <p class="text-white opacity-75 small mb-0">Categories</p>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 text-center p-3" style="background:linear-gradient(135deg,#f59e0b,#d97706);border-radius:14px">
            <i class="bi bi-calendar-check text-white mb-2" style="font-size:2rem"></i>
            <h2 class="fw-bold text-white mb-0">{{ \App\Models\Blog::whereDate('created_at', today())->count() }}</h2>
            <p class="text-white opacity-75 small mb-0">Today</p>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card border-0 text-center p-3" style="background:linear-gradient(135deg,#ec4899,#be185d);border-radius:14px">
            <i class="bi bi-calendar-month text-white mb-2" style="font-size:2rem"></i>
            <h2 class="fw-bold text-white mb-0">{{ \App\Models\Blog::whereMonth('created_at', now()->month)->count() }}</h2>
            <p class="text-white opacity-75 small mb-0">This Month</p>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row g-3 mb-4">
    <div class="col-12">
        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary me-2">
            <i class="bi bi-plus-circle me-2"></i>Add New Blog
        </a>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary me-2">
            <i class="bi bi-list me-2"></i>View All Blogs
        </a>
        <a href="{{ route('blogs.index') }}" target="_blank" class="btn btn-outline-success">
            <i class="bi bi-box-arrow-up-right me-2"></i>View Website
        </a>
    </div>
</div>

<!-- Recent Blogs Table -->
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
        <h6 class="fw-bold mb-0"><i class="bi bi-clock-history me-2"></i>Recent Blogs</h6>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Published</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recent as $blog)
                <tr>
                    <td>
                        <div class="fw-semibold small">{{ Str::limit($blog->title, 55) }}</div>
                    </td>
                    <td>
                        <span class="badge rounded-pill bg-primary bg-opacity-10 text-primary" style="font-size:11px">
                            {{ $blog->category }}
                        </span>
                    </td>
                    <td class="small text-muted">{{ $blog->published_at->format('d M Y') }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.blogs.edit', $blog) }}"
                               class="btn btn-sm btn-outline-primary py-0">Edit</a>
                            <form method="POST" action="{{ route('admin.blogs.destroy', $blog) }}"
                                  onsubmit="return confirm('Delete this blog?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger py-0">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted py-4">
                        No blogs yet. <a href="{{ route('admin.blogs.create') }}">Add one now</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

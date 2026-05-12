@extends('layouts.admin')
@section('title', 'All Blogs')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="fw-bold mb-0">All Blogs</h5>
        <small class="text-muted">{{ $blogs->total() }} total blogs</small>
    </div>
    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-2"></i>Add New Blog
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width:50px">#</th>
                    <th style="width:80px">Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Published</th>
                    <th style="width:170px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($blogs as $blog)
                <tr>
                    <td class="text-muted small">{{ $loop->iteration + ($blogs->currentPage()-1) * $blogs->perPage() }}</td>
                    <td>
                        @if($blog->image)
                            <img src="{{ Storage::url($blog->image) }}"
                                 style="width:65px;height:45px;object-fit:cover;border-radius:8px"
                                 alt="{{ $blog->title }}">
                        @else
                            <div style="width:65px;height:45px;background:#f1f5f9;border-radius:8px;
                                        display:flex;align-items:center;justify-content:center">
                                <i class="bi bi-image text-muted"></i>
                            </div>
                        @endif
                    </td>
                    <td>
                        <div class="fw-semibold small">{{ Str::limit($blog->title, 60) }}</div>
                        <div class="text-muted" style="font-size:12px">{{ Str::limit(strip_tags($blog->short_description), 70) }}</div>
                    </td>
                    <td>
                        <span class="badge rounded-pill bg-primary bg-opacity-10 text-primary" style="font-size:11px">
                            {{ $blog->category }}
                        </span>
                    </td>
                    <td class="small text-muted">{{ $blog->published_at->format('d M Y') }}</td>
                    <td>
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="{{ route('blogs.show', $blog->id) }}"
                               target="_blank"
                               class="btn btn-sm btn-outline-secondary py-0"
                               title="View">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('admin.blogs.edit', $blog) }}"
                               class="btn btn-sm btn-outline-primary py-0">
                                <i class="bi bi-pencil me-1"></i>Edit
                            </a>
                            <form method="POST"
                                  action="{{ route('admin.blogs.destroy', $blog) }}"
                                  onsubmit="return confirm('Are you sure you want to delete this blog?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger py-0">
                                    <i class="bi bi-trash me-1"></i>Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5 text-muted">
                        <i class="bi bi-inbox" style="font-size:3rem;display:block;margin-bottom:1rem;opacity:.3"></i>
                        No blogs found.
                        <a href="{{ route('admin.blogs.create') }}" class="d-block mt-2">Add your first blog</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($blogs->hasPages())
    <div class="card-footer bg-white">
        {{ $blogs->links() }}
    </div>
    @endif
</div>
@endsection

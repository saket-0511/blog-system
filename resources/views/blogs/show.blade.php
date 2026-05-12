@extends('layouts.app')
@section('title', $blog->title . ' - BlogHub')

@section('content')
<div class="container py-4">
    <div class="row">

        <!-- Main Content -->
        <div class="col-lg-8">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('blogs.index') }}" class="text-decoration-none">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('blogs.index', ['category' => $blog->category]) }}"
                           class="text-decoration-none">{{ $blog->category }}</a>
                    </li>
                    <li class="breadcrumb-item active text-truncate" style="max-width:200px">
                        {{ $blog->title }}
                    </li>
                </ol>
            </nav>

            <!-- Blog Header -->
            <div class="mb-3">
                <span class="badge-category me-2">{{ $blog->category }}</span>
            </div>

            <h1 class="fw-bold mb-3" style="line-height:1.3">{{ $blog->title }}</h1>

            <div class="d-flex align-items-center gap-3 mb-4 text-muted small">
                <span><i class="bi bi-calendar3 me-1"></i>{{ $blog->published_at->format('d M Y, h:i A') }}</span>
                <span><i class="bi bi-tag me-1"></i>{{ $blog->category }}</span>
            </div>

            @if($blog->image)
                <img src="{{ Storage::url($blog->image) }}"
                     alt="{{ $blog->title }}"
                     class="blog-detail-img mb-4">
            @endif

            <!-- Blog Content -->
            <div class="blog-content card border-0 shadow-sm p-4">
                {!! $blog->content !!}
            </div>

            <!-- Tags / Category -->
            <div class="mt-4 pt-3 border-top">
                <span class="text-muted small me-2">Category:</span>
                <a href="{{ route('blogs.index', ['category' => $blog->category]) }}"
                   class="badge-category text-decoration-none">
                    {{ $blog->category }}
                </a>
            </div>

            <!-- Navigation -->
            <div class="mt-4">
                <a href="{{ route('blogs.index') }}" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left me-1"></i>Back to All Blogs
                </a>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4 mt-4 mt-lg-0">

            <!-- Related Posts -->
            @if($related->count() > 0)
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-transparent fw-semibold">
                    <i class="bi bi-link-45deg me-1"></i>Related Posts
                </div>
                <div class="card-body p-0">
                    @foreach($related as $r)
                    <a href="{{ route('blogs.show', $r->id) }}"
                       class="text-decoration-none">
                        <div class="d-flex gap-3 p-3 border-bottom related-post-item">
                            @if($r->image)
                                <img src="{{ Storage::url($r->image) }}"
                                     style="width:70px;height:55px;object-fit:cover;border-radius:6px;flex-shrink:0"
                                     alt="{{ $r->title }}">
                            @else
                                <div style="width:70px;height:55px;background:#f1f5f9;border-radius:6px;flex-shrink:0;display:flex;align-items:center;justify-content:center">
                                    <i class="bi bi-newspaper text-muted"></i>
                                </div>
                            @endif
                            <div>
                                <p class="mb-1 small fw-semibold text-dark lh-sm">{{ Str::limit($r->title, 55) }}</p>
                                <small class="text-muted">{{ $r->published_at->format('d M Y') }}</small>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Browse by Category -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-transparent fw-semibold">
                    <i class="bi bi-grid me-1"></i>Browse by Category
                </div>
                <div class="card-body">
                    @foreach(['Admit Card','Result','Answer Key','Exam Date','Information','Syllabus','Notification'] as $cat)
                    <a href="{{ route('blogs.index', ['category' => $cat]) }}"
                       class="d-flex justify-content-between align-items-center py-2 border-bottom text-decoration-none text-dark category-link">
                        <span class="small">{{ $cat }}</span>
                        <i class="bi bi-chevron-right text-muted" style="font-size:12px"></i>
                    </a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@forelse($blogs as $blog)
<div class="col-12 col-sm-6 col-lg-4">
    <div class="card blog-card h-100">
        @if($blog->image)
            <img src="{{ Storage::url($blog->image) }}"
                 class="card-img-top blog-card-img"
                 alt="{{ $blog->title }}">
        @else
            <div class="blog-card-placeholder d-flex align-items-center justify-content-center">
                <div class="text-center">
                    <i class="bi bi-newspaper" style="font-size:2.5rem; opacity:.3"></i>
                    <p class="small mt-1 mb-0 opacity-50">{{ $blog->category }}</p>
                </div>
            </div>
        @endif

        <div class="card-body d-flex flex-column">
            <div class="mb-2">
                <span class="badge-category">{{ $blog->category }}</span>
            </div>
            <h5 class="card-title">{{ $blog->title }}</h5>
            <p class="card-text text-muted flex-grow-1">
                {{ Str::limit(strip_tags($blog->short_description), 120) }}
            </p>
        </div>

        <div class="card-footer blog-card-footer">
            <small class="text-muted">
                <i class="bi bi-calendar3 me-1"></i>
                {{ $blog->published_at->format('d M Y') }}
            </small>
            <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary btn-sm">
                Read More <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</div>
@empty
<div class="col-12">
    <div class="text-center py-5">
        <i class="bi bi-search" style="font-size:3rem;color:#ccc"></i>
        <h5 class="mt-3 text-muted">No blogs found</h5>
        <p class="text-muted">Try adjusting your search or filter criteria.</p>
        <button onclick="$('#clear-filters').click()" class="btn btn-outline-primary btn-sm">
            Clear Filters
        </button>
    </div>
</div>
@endforelse

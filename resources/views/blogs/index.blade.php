@extends('layouts.app')
@section('title', 'Latest Blogs - BlogHub')

@section('content')

<!-- Hero -->
<section class="hero-section">
    <div class="container text-center">
        <h1 class="fw-bold mb-2">Latest Government Updates</h1>
        <p class="lead opacity-90 mb-0">Admit Cards, Results, Answer Keys, Exam Dates & More</p>
    </div>
</section>

<div class="container pb-5">

    <!-- Filter Bar -->
    <div class="filter-bar mb-4">
        <div class="row g-3 align-items-end">
            <div class="col-12 col-md-4">
                <label class="form-label fw-semibold small text-muted">
                    <i class="bi bi-search me-1"></i>Search
                </label>
                <input type="text" id="search-input" class="form-control"
                       placeholder="Search blogs by title or content..."
                       value="{{ request('search') }}">
            </div>
            <div class="col-6 col-md-3">
                <label class="form-label fw-semibold small text-muted">
                    <i class="bi bi-tag me-1"></i>Category
                </label>
                <select id="filter-category" class="form-select">
                    <option value="all">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-6 col-md-3">
                <label class="form-label fw-semibold small text-muted">
                    <i class="bi bi-calendar3 me-1"></i>Filter by Date
                </label>
                <input type="date" id="filter-date" class="form-control" value="{{ request('date') }}">
            </div>
            <div class="col-12 col-md-2">
                <button id="clear-filters" class="btn btn-outline-secondary w-100">
                    <i class="bi bi-x-circle me-1"></i>Clear
                </button>
            </div>
        </div>
    </div>

    <!-- Results Count -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <p class="text-muted small mb-0" id="results-count">
            Showing {{ $blogs->total() }} blog{{ $blogs->total() != 1 ? 's' : '' }}
        </p>
    </div>

    <!-- Blog Cards -->
    <div class="row g-4" id="blogs-container">
        @include('blogs.partials.blog-cards', ['blogs' => $blogs])
    </div>

    <!-- Pagination -->
    <div class="mt-4 d-flex justify-content-center" id="pagination-container">
        {{ $blogs->links() }}
    </div>

</div>

@endsection

@section('scripts')
<script>
// Pass base URL to JS
window.blogsUrl = "{{ route('blogs.index') }}";
</script>
@endsection

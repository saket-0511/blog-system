@extends('layouts.admin')
@section('title', 'Edit Blog')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('admin.blogs.update', $blog) }}"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Blog Title <span class="text-danger">*</span></label>
                        <input type="text" name="title"
                               class="form-control @error('title') is-invalid @enderror"
                               value="{{ old('title', $blog->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
                        <select name="category" class="form-select" required>
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}"
                                    {{ old('category', $blog->category) == $cat ? 'selected' : '' }}>
                                    {{ $cat }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Short Description -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Short Description</label>
                        <textarea name="short_description" class="form-control" rows="2">{{ old('short_description', $blog->short_description) }}</textarea>
                    </div>

                    <!-- Current Image -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Featured Image</label>
                        @if($blog->image)
                            <div class="mb-2 d-flex align-items-center gap-3">
                                <img src="{{ Storage::url($blog->image) }}"
                                     style="height:80px;border-radius:8px;object-fit:cover"
                                     alt="Current image">
                                <span class="text-muted small">Current image — upload a new one to replace it</span>
                            </div>
                        @endif
                        <input type="file" name="image" class="form-control" accept="image/*"
                               onchange="previewImage(event)">
                        <div id="imagePreview" class="mt-2" style="display:none">
                            <img id="previewImg" src="" style="max-height:120px;border-radius:8px" alt="New preview">
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Blog Content <span class="text-danger">*</span></label>
                        <textarea name="content" id="blogContent"
                                  class="form-control" rows="12">{{ old('content', $blog->content) }}</textarea>
                    </div>

                    <div class="d-flex gap-3 align-items-center">
                        <button type="submit" class="btn btn-success px-4">
                            <i class="bi bi-check-circle me-2"></i>Update Blog
                        </button>
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary">
                            Cancel
                        </a>
                        <a href="{{ route('blogs.show', $blog->id) }}" target="_blank"
                           class="btn btn-outline-info ms-auto">
                            <i class="bi bi-eye me-1"></i>Preview
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4 mt-4 mt-lg-0">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-transparent fw-semibold small">
                <i class="bi bi-info-circle me-2 text-info"></i>Blog Info
            </div>
            <div class="card-body small">
                <table class="table table-sm table-borderless mb-0">
                    <tr>
                        <td class="text-muted">ID</td>
                        <td class="fw-semibold">#{{ $blog->id }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Published</td>
                        <td class="fw-semibold">{{ $blog->published_at->format('d M Y') }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Category</td>
                        <td>
                            <span class="badge bg-primary bg-opacity-10 text-primary">
                                {{ $blog->category }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Last Updated</td>
                        <td class="fw-semibold">{{ $blog->updated_at->format('d M Y') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
tinymce.init({
    selector: '#blogContent',
    plugins: 'lists link image table code wordcount',
    toolbar: 'undo redo | styles | bold italic underline | ' +
             'alignleft aligncenter alignright alignjustify | ' +
             'bullist numlist | link image table | forecolor backcolor | ' +
             'removeformat code',
    height: 450,
    menubar: false,
    branding: false,
    content_style: 'body { font-family: Arial, sans-serif; font-size: 14px; line-height: 1.7; }',
    images_upload_handler: function (blobInfo) {
        return new Promise(function (resolve) {
            var reader = new FileReader();
            reader.onload = function(e) { resolve(e.target.result); };
            reader.readAsDataURL(blobInfo.blob());
        });
    }
});

function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('previewImg').src = e.target.result;
            document.getElementById('imagePreview').style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
}
</script>
@endsection

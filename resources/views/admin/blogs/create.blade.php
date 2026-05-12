@extends('layouts.admin')
@section('title', 'Add New Blog')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data" id="blogForm">
                    @csrf

                    <!-- Title -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Blog Title <span class="text-danger">*</span></label>
                        <input type="text" name="title"
                               class="form-control @error('title') is-invalid @enderror"
                               placeholder="Enter blog title..."
                               value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
                        <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>
                                    {{ $cat }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Short Description -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Short Description
                            <span class="text-muted fw-normal small">(optional — auto-generated from content if left blank)</span>
                        </label>
                        <textarea name="short_description" class="form-control" rows="2"
                                  placeholder="Brief summary shown on blog listing page...">{{ old('short_description') }}</textarea>
                    </div>

                    <!-- Image -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Featured Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*"
                               onchange="previewImage(event)">
                        <div id="imagePreview" class="mt-2" style="display:none">
                            <img id="previewImg" src="" style="max-height:150px;border-radius:8px" alt="Preview">
                        </div>
                        <small class="text-muted">Accepted: JPG, PNG, GIF, WEBP. Max 2MB.</small>
                    </div>

                    <!-- Content -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Blog Content <span class="text-danger">*</span></label>
                        <textarea name="content" id="blogContent" class="form-control"
                                  rows="12" placeholder="Write your blog content here...">{{ old('content') }}</textarea>
                        @error('content')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-send me-2"></i>Publish Blog
                        </button>
                        <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Tips Sidebar -->
    <div class="col-lg-4 mt-4 mt-lg-0">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-transparent fw-semibold small">
                <i class="bi bi-lightbulb me-2 text-warning"></i>Tips
            </div>
            <div class="card-body small text-muted">
                <ul class="ps-3 mb-0">
                    <li class="mb-2">Use the rich editor to add <strong>headings</strong>, <strong>lists</strong>, and <strong>tables</strong></li>
                    <li class="mb-2">Add relevant images inside the content using the editor's image button</li>
                    <li class="mb-2">The <strong>publish date</strong> is set automatically</li>
                    <li class="mb-2">Short description is auto-generated from content if not filled</li>
                    <li>Choose the most accurate category for better filtering</li>
                </ul>
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
    style_formats: [
        { title: 'Heading 1', block: 'h1' },
        { title: 'Heading 2', block: 'h2' },
        { title: 'Heading 3', block: 'h3' },
        { title: 'Paragraph', block: 'p' },
    ],
    height: 450,
    menubar: false,
    branding: false,
    content_style: 'body { font-family: Arial, sans-serif; font-size: 14px; line-height: 1.7; }',
    images_upload_handler: function (blobInfo, progress) {
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

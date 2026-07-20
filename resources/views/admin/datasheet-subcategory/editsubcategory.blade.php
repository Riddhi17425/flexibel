@extends('admin.layouts.app')

@section('title', 'Edit SubCategory')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Edit Sub Category</h3>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('datasheet-subcategory.update', $data->id) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data->id }}" />
        
            <div class="col-xl-12 col-lg-8">
                <div class="card mb-3 p-3">
                    <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold">Sub Category Information</h6>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-6">
                            <label class="form-label">Category</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $data->category_id ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
        
                        <div class="col-md-6">
                            <label class="form-label">SubCategory Name</label>
                            <input type="text" name="subcategory_name" value="{{ $data->title }}" required class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                            <label class="form-label">Alt Tag</label>
                            <input type="text" id="alt_tag" name="alt_tag" value="{{ $data->alt_tag }}" class="form-control">
                        </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-12">
                                <label class="form-label" for="input-file-front">Image</label>
                                <input type="file" id="input-file-front" name="image" class="dropify"
                                    data-default-file="{{ asset('public/datasheets/' . $data->image) }}">
                            </div>
                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
        
                <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Save</button>
            </div>
        </form>
        
    </div>
    
</div>
</div>
@endsection

@push('styles')
<!-- Summernote CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
<!-- Dropify CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropify/dist/css/dropify.min.css">
@endpush

@push('scripts')
<!-- Summernote JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<!-- Dropify JS -->
<script src="https://cdn.jsdelivr.net/npm/dropify/dist/js/dropify.min.js"></script>
<script>
    $(document).ready(function() {
      $('.dropify').dropify();
        $('.summernote').summernote({
            placeholder: 'Enter Description here...',
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['link', 'picture', 'hr']],
                ['view', ['fullscreen', 'codeview']],
                ['help', ['help']]
            ]
        });
    });
</script>
@endpush
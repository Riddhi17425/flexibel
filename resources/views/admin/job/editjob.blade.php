@extends('admin.layouts.app')

@section('title', 'Edit job')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Edit Job</h3>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('job.update', $data->id) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data->id }}" />

            <div class="col-xl-12 col-lg-8">
                <div class="card mb-3 p-3">
                    <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold">Job Information</h6>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-6">
                            <label class="form-label">Category</label>
                            <select name="jobcategory_id" id="jobcategory_id" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($jobcategories as $category)
                                    <option value="{{ $category->id }}" 
                                        {{ $category->id == $data->jobcategory_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Job Title</label>
                            <input type="text" id="title" name="title" value="{{ $data->title }}" required
                                class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="short_description" class="form-label">Job short description</label>
                            <textarea id="short_description" name="short_description"
                                class="form-control">{{ $data->short_description }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="details" class="form-label">Job details</label>
                            <textarea id="details" name="details"
                                class="form-control">{{ $data->details }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Job Description</label>
                            <textarea id="description" name="description"
                                class="form-control">{{ $data->description }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="url" class="form-label">Job Url</label>
                            <input type="text" id="url" name="url" value="{{ $data->url }}" required class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Meta Title</label>
                            <input type="text" id="meta_title" name="meta_title" value="{{ $data->meta_title }}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="meta_description" class="form-label">Meta Description</label>
                             <textarea id="meta_description" name="meta_description" class="form-control">{{ $data->meta_description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Save</button>
        </form>
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
   $('#description,#meta_description').summernote({
    placeholder: 'Enter job description here...',
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

    $('#short_description').summernote({
        placeholder: 'Enter job short description here...',
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

    $('#details').summernote({
        placeholder: 'Enter job details for experience, location and all here...',
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
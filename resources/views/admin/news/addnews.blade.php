@extends('admin.layouts.app')

@section('title', 'News Add')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Add News</h3>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form method="POST" enctype="multipart/form-data" action="{{ route('news.store') }}">
            @csrf
            <div class="col-xl-12 col-lg-8">
                <div class="card mb-3 p-3">
                    <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold">News Information</h6>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-6">
                            <label class="form-label">News Name</label>
                            <input type="text" id="news_name" name="news_name" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">News Host</label>
                            <input type="text" id="host" name="host" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="news_des" class="form-label">News Description</label>
                            <textarea id="news_des" name="news_des" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="date" class="form-label">News Date</label>
                            <input type="date" id="date" name="date" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="image">News Image</label>
                            <input type="file" id="image" name="image[]" class="form-control dropify" multiple>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Alt Tag</label>
                            <input type="text" id="alt" name="alt" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">URL</label>
                            <input type="text" id="url" name="url" class="form-control">
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">
<link rel="stylesheet" href="{{ asset('public/admin_public/dist/assets/plugin/multi-select/css/multi-select.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_public/dist/assets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_public/dist/assets/plugin/dropify/dist/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_public/dist/assets/plugin/datatables/responsive.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/admin_public/dist/assets/plugin/datatables/dataTables.bootstrap5.min.css') }}">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script src="{{ asset('public/admin_public/dist/assets/plugin/multi-select/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('public/admin_public/dist/assets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('public/admin_public/dist/assets/bundles/dropify.bundle.js') }}"></script>
<script src="{{ asset('public/admin_public/dist/assets/bundles/dataTables.bundle.js') }}"></script>

<script>
$(document).ready(function() {
    $('.dropify').dropify();

    $('#news_des').summernote({
        placeholder: 'Enter news description here...',
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

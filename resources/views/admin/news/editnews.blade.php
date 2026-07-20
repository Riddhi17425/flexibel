@extends('admin.layouts.app')

@section('title', 'Edit news')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Edit news</h3>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('news.update', $data->id) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data->id }}" />

            <div class="col-xl-12 col-lg-8">
                <div class="card mb-3 p-3">
                    <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold">news Information</h6>
                    </div>
                    <div class="row g-3 align-items-center">
                       
                        <div class="col-md-12">
                            <label class="form-label">News Name</label>
                            <input type="text" id="news_name" name="news_name" value="{{ $data->news_name }}" required
                                class="form-control">
                        </div>
                         <div class="col-md-12">
                            <label for="news_des" class="form-label">News Description</label>
                            <textarea id="news_des" name="news_des"
                                class="form-control">{{ $data->news_des }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">News Host</label>
                            <input type="text" id="host" name="host" value="{{ $data->host }}" 
                                class="form-control">
                        </div>
                      
                        <div class="col-md-6">
                            <label for="date" class="form-label">News Date</label>
                            <input type="date" id="date" name="date" value="{{ $data->date }}" class="form-control">
                        </div>
                       
                        <div class="col-md-12">
                            <label class="form-label" for="input-file-front">news Icon Upload</label>
                            <input type="file" id="input-file-front" name="icon" class="dropify"
                                data-default-file="{{ asset('public/news_icon/' . $data->icon) }}">
                        </div>
                        @if ($errors->has('icon'))
                        <span class="text-danger">{{ $errors->first('icon') }}</span>
                        @endif
                        <div class="col-md-12">
                            <label class="form-label" for="input-file-front">news Image Upload</label>
                            <input type="file" id="input-file-front" name="image[]" class="dropify" multiple>
                        </div>
                        @php
                            $images = explode(',', $data->image);
                        @endphp
                        @foreach($images as $image)
                            <div class="col-md-3">
                                <label for="current_image">Current Image:</label>
                                <img src="{{ asset('public/news_image/' . $image) }}" class="img-thumbnail" style="width: 150px;">
                            </div>
                        @endforeach
                   
                        <div class="col-md-12">
                            <label class="form-label">News Alt</label>
                            <input type="text" id="alt" name="alt" value="{{ $data->alt }}" 
                                class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">News Alt</label>
                            <input type="text" id="url" name="url" value="{{ $data->url }}" 
                                class="form-control">
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
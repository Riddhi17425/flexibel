@extends('admin.layouts.app')

@section('title', 'Edit Video')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Edit Video</h3>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('video.update', $data->id) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data->id }}" />

            <div class="col-xl-12 col-lg-8">
                <div class="card mb-3 p-3">
                    <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold">Video Information</h6>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" id="title" name="title" value="{{ $data->title }}" required
                                class="form-control">
                        </div>
                        
                        <div class="card mb-3">
                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold">Thumbnail Image</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12">
                                        <label class="form-label" for="input-file-front"> Image Upload</label>
                                        <input type="file" id="input-file-front" name="thumbnail_image" class="dropify"
                                            data-default-file="{{ asset('public/Video_image/' . $data->thumbnail_image) }}">
                                    </div>
                                    @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="file_type">File Type</label>
                            <select class="form-select" name="file_type" id="file_type" required>
                                <option value="videolink" {{ $data->file_type == 'videolink' ? 'selected' : '' }}>Video Link</option>
                                <option value="videoupload" {{ $data->file_type == 'videoupload' ? 'selected' : '' }}>Video Upload</option>
                            </select>
                        </div>

                        <div class="col-md-12" id="video_upload_div" style="{{ $data->file_type == 'videolink' ? 'display: none;' : '' }}">                            <label class="form-label">Video Upload</label>
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12">
                                        <label class="form-label" for="video_file">Video File</label>
                                        <input type="file" id="video_file" name="video_file" class="dropify"
                                            data-default-file="{{ asset('public/Video_uploads/' . $data->video_link) }}">
                                    </div>
                                    @if ($errors->has('video_file'))
                                        <span class="text-danger">{{ $errors->first('video_file') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" id="video_link_div" style="{{ $data->file_type == 'videoupload' ? 'display: none;' : '' }}">
                        <label class="form-label">Video Link</label>
                                <input type="text" id="video_link" name="video_link" value="{{ $data->video_link }}" class="form-control">
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
});

$(document).ready(function() {
    $('#file_type').on('change', function() {
        var selectedValue = $(this).val();
        if (selectedValue === 'videolink') {
            $('#video_upload_div').hide();
            $('#video_link_div').show();
        } else if (selectedValue === 'videoupload') {
            $('#video_upload_div').show();
            $('#video_link_div').hide();
        }
    });
});

</script>
@endpush
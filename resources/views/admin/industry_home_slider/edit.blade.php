@extends('admin.layouts.app')

@section('title', 'Edit Home Slider')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Edit Industry</h3>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('industry-home-slider.update', $data->id) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data->id }}" />

            <div class="col-xl-12 col-lg-8">
                <div class="card mb-3 p-3">
                    <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold">Industry Home Slider Information</h6>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" id="title" name="title" value="{{ $data->title }}" required
                                class="form-control">
                        </div>

                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description"
                                class="form-control">{{ $data->description }}</textarea>
                        </div>
                        <!-- Desktop Images -->
<div class="card mb-3">
    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
        <h6 class="mb-0 fw-bold">Slider Images Desktop</h6>
    </div>
    <div id="imageInputs">
        @php
            $sliderImages = is_array($data->image) ? $data->image : json_decode($data->image, true);
            $sliderAlts = is_array($data->alt) ? $data->alt : json_decode($data->alt, true);
        @endphp

        @if (!empty($sliderImages))
            @foreach ($sliderImages as $index => $image)
                <div class="input-group mb-2 desktop-image-wrapper">
                    <input type="hidden" name="existing_desktop_images[]" value="{{ $image }}">
                    <input type="file" name="image[]" class="form-control dropify"
                        data-default-file="{{ asset('public/Industry_Home_Slider/desktop/' . $image) }}">
                    
                    <div class="mt-2 col-md-10">
                        <label class="form-label">Alt tag</label>
                        <input type="text" name="alt[]" class="form-control" value="{{ $sliderAlts[$index] ?? '' }}">
                    </div>

                    <button type="button" class="btn btn-danger remove-btn" onclick="removeInput(this, 'desktop')">Remove</button>
                </div>
            @endforeach
        @else
            <div class="input-group mb-2 desktop-image-wrapper">
                <input type="file" name="image[]" class="form-control dropify">
                <div class="mt-2 col-md-10">
                    <label class="form-label">Alt tag</label>
                    <input type="text" name="alt[]" class="form-control">
                </div>
                <button type="button" class="btn btn-danger remove-btn" onclick="removeInput(this, 'desktop')">Remove</button>
            </div>
        @endif
    </div>
    <button type="button" class="btn btn-primary mt-2" onclick="addImageInput()">Add More</button>
</div>

<!-- Mobile Images -->
<div class="card mb-3">
    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
        <h6 class="mb-0 fw-bold">Slider Images Mobile</h6>
    </div>
    <div class="card-body" id="mobileImageInputs">
        @php
            $mobileImages = is_array($data->mobile_image) ? $data->mobile_image : json_decode($data->mobile_image, true);
            $mobileAlts = is_array($data->mobile_alt) ? $data->mobile_alt : json_decode($data->mobile_alt, true);
        @endphp

        @if (!empty($mobileImages))
            @foreach ($mobileImages as $index => $image)
                <div class="mobile-image-wrapper mb-2">
                    <input type="hidden" name="existing_mobile_images[]" value="{{ $image }}">
                    <input type="file" name="mobile_image[]" class="dropify"
                        data-default-file="{{ asset('public/Industry_Home_Slider/mobile/' . $image) }}">
                    
                    <div class="mt-2 col-md-10">
                        <label class="form-label">Alt tag</label>
                        <input type="text" name="mobile_alt[]" class="form-control" value="{{ $mobileAlts[$index] ?? '' }}">
                    </div>

                    <button type="button" class="btn btn-danger mt-2" onclick="removeInput(this, 'mobile')">Remove</button>
                </div>
            @endforeach
        @else
            <div class="mobile-image-wrapper mb-2">
                <input type="file" name="mobile_image[]" class="dropify">
                <div class="mt-2 col-md-10">
                    <label class="form-label">Alt tag</label>
                    <input type="text" name="mobile_alt[]" class="form-control">
                </div>
                <button type="button" class="btn btn-danger mt-2" onclick="removeInput(this, 'mobile')">Remove</button>
            </div>
        @endif
    </div>
    <button type="button" class="btn btn-primary mt-2" onclick="addMobileImageInput()">Add More</button>
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
    $('#description').summernote({
        placeholder: 'Enter Industry description here...',
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
<script>
    function addImageInput() {
        const container = document.getElementById('imageInputs');
        const div = document.createElement('div');
        div.className = 'input-group mb-2 desktop-image-wrapper';

        div.innerHTML = `
            <input type="file" name="image[]" class="form-control dropify">
            <input type="text" name="alt[]" class="form-control">
            <button type="button" class="btn btn-danger remove-btn" onclick="removeInput(this, 'desktop')">Remove</button>
        `;

        container.appendChild(div);
        $('.dropify').dropify();
    }

    function addMobileImageInput() {
        const container = document.getElementById('mobileImageInputs');
        const div = document.createElement('div');
        div.className = 'mobile-image-wrapper mb-2';

        div.innerHTML = `
            <input type="file" name="mobile_image[]" class="dropify">
            <input type="text" name="mobile_alt[]" class="form-control">
            <button type="button" class="btn btn-danger mt-2" onclick="removeInput(this, 'mobile')">Remove</button>
        `;

        container.appendChild(div);
        $('.dropify').dropify();
    }

    function removeInput(button, type) {
        const container = type === 'desktop'
            ? document.querySelectorAll('.desktop-image-wrapper')
            : document.querySelectorAll('.mobile-image-wrapper');

        if (container.length > 1) {
            button.closest('.desktop-image-wrapper, .mobile-image-wrapper').remove();
        } else {
            alert('At least one image input must remain.');
        }
    }

    $(document).ready(function () {
        $('.dropify').dropify();
    });
</script>


@endpush
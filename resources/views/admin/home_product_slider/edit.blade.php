@extends('admin.layouts.app')

@section('title', 'Edit Home Product Slider')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Edit Product Slider</h3>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('home-product-slider.update', $data->id) }}">
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
                            <label class="form-label">Product Category</label>
                            <select class="form-control" name="category_id">
                                <option value="">Select Product Category</option>
                                @if(isset($productCategories) && is_countable($productCategories) && count($productCategories) > 0)
                                    @foreach($productCategories as $key => $val)
                                        <option @if($val->id == $data->category_id) {{'selected'}} @else {{''}} @endif value="{{$val->id}}">{{$val->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label">Title</label>
                            <textarea id="title" name="title" class="form-control summernote" required>{!! $data->title !!}</textarea>
                        </div>

                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description"
                                class="form-control">{{ $data->description }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="detail_description" class="form-label">Detail Description</label>
                            <textarea id="detail_description" name="detail_description"
                                class="form-control">{{ $data->detail_description }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Desktop Image Alt Tag</label>
                            <input type="text" id="desktop_alt_tag" name="desktop_alt_tag" value="{{ $data->desktop_alt_tag }}" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Url</label>
                            <input type="text" id="url" name="url" value="{{ $data->url }}" class="form-control">
                        </div>
                        <div class="row g-3 align-items-center">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold">Desktop Images</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-12">
                                            <label class="form-label" for="input-file-front">Image Upload</label>
                                            <input type="file" id="input-file-front" name="image_desktop" class="dropify"
                                                data-default-file="{{ asset('public/home_product_slider/desktop/' . $data->image_desktop) }}">
                                        </div>
                                        @if ($errors->has('image_desktop'))
                                        <span class="text-danger">{{ $errors->first('image_desktop') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Mobile Image Alt Tag</label>
                            <input type="text" id="mobile_alt_tag" name="mobile_alt_tag" value="{{ $data->mobile_alt_tag }}" class="form-control">
                        </div>
                        <div class="row g-3 align-items-center">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold">Mobile Images</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-12">
                                            <label class="form-label" for="input-file-front">Image Upload</label>
                                            <input type="file" id="input-file-front" name="image_mobile" class="dropify"
                                                data-default-file="{{ asset('public/home_product_slider/mobile/' . $data->image_mobile) }}">
                                        </div>
                                        @if ($errors->has('image_mobile'))
                                        <span class="text-danger">{{ $errors->first('image_mobile') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
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
    // $('.dropify').dropify();
    $('#description,#detail_description').summernote({
        placeholder: 'Enter description here...',
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
    $('#title').summernote({
        placeholder: 'Enter title here...',
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
    $(document).ready(function() {
      $('.dropify').dropify();
       
    });
</script>

<!-- <script>
    function addImageInput() {
        const container = document.getElementById('imageInputs');
        const div = document.createElement('div');
        div.className = 'input-group mb-2 desktop-image-wrapper';

        div.innerHTML = `
            <input type="file" name="image[]" class="form-control dropify">
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
</script> -->


@endpush
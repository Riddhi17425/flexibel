@extends('admin.layouts.app')

@section('title', 'Case Study Add')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Case Study Add</h3>
            </div>
        </div>
    </div> <!-- Row end -->

    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('casestudy.store') }}">
            @csrf
            <div class="col-xl-12 col-lg-8">
                <div class="card mb-3 p-3">
                    <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold">Case Study Information</h6>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-6">
                            <label class="form-label">Front Image</label>
                            <input type="file" id="front_image" name="front_image" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Case Study Name</label>
                            <input type="text" id="name" name="name" required class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Short Description</label>
                            <textarea id="short_description" name="short_description" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Case Study Url</label>
                            <input type="text" id="casestudy_url" name="casestudy_url" class="form-control">
                        </div>
                         <div class="col-md-12">
                            <label class="form-label" for="top_banner_desktop">Top Banner Desktop</label>
                            <input type="file" id="top_banner_desktop" name="top_banner_desktop" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="top_banner_mobile">Top Banner Mobile</label>
                            <input type="file" id="top_banner_mobile" name="top_banner_mobile" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Company Description</label>
                            <textarea id="company_des" name="company_des" class="form-control"></textarea>
                        </div>
                      
                        <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold">Section 1</h6>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Title</label>
                            <input type="text" id="section1_title" name="section1_title" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Industry</label>
                            <input type="text" id="industry" name="industry" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Application</label>
                            <input type="text" id="application" name="application" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Region</label>
                            <input type="text" id="region" name="region" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Date</label>
                            <input type="date" id="date" name="date" class="form-control">
                        </div>
                         <div class="col-md-12">
                            <label class="form-label" for="section_description">Description</label>
                            <textarea id="section1_description" name="section1_description" class="form-control"></textarea>
                        </div>
                        
                        <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold">Section 2</h6>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Title</label>
                            <input type="text" id="section2_title" name="section2_title" class="form-control">
                        </div>
                         <div class="col-md-12">
                            <label class="form-label" for="section2_description">Description</label>
                           <textarea id="section2_description" name="section2_description" class="form-control"></textarea>
                        </div>
                        
                        <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold">Section 3</h6>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Title</label>
                            <input type="text" id="section3_title" name="section3_title" class="form-control">
                        </div>
                         <div class="col-md-12">
                            <label class="form-label" for="section3_description">Description</label>
                            <textarea id="section3_description" name="section3_description" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Detail Image Desktop</label>
                            <input type="file" id="detail_img" name="detail_img" class="form-control">
                        </div>
                         <div class="col-md-12">
                            <label class="form-label">Detail Image Mobile</label>
                            <input type="file" id="detail_img_mobile" name="detail_img_mobile" class="form-control">
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label">Main title</label>
                            <textarea id="main_title" name="main_title" class="form-control"></textarea>
                            <!--<input type="text" id="top_title" name="top_title" class="form-control">-->
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Meta Title</label>
                            <input type="text" id="meta_title" name="meta_title" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Meta Description</label>
                            <textarea id="meta_description" name="meta_description" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
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
    $('#company_des,#short_description,#description,#main_title').summernote({
        placeholder: 'Enter text here...',
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
    $('#section1_description,#section2_description,#section3_description').summernote({
        placeholder: 'Enter text here...',
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
        div.classList.add('input-group', 'mb-2');
        div.innerHTML = `
            <input type="file" name="slider_image[]" class="form-control">
            <input type="text" name="slider_alt[]" class="form-control" placeholder="Alt text">
            <button type="button" class="btn btn-danger remove-btn" onclick="removeInput(this)">Remove</button>
        `;
        container.appendChild(div);
    }

    function removeInput(button) {
        const container = document.getElementById('imageInputs');
        const inputs = container.querySelectorAll('.input-group');

        if (inputs.length > 1) {
            button.parentElement.remove();
        } else {
            alert("At least one slider image must remain.");
        }
    }
</script>
<script>
    let mobileImageIndex = {{ isset($mobileSliderImages) ? count($mobileSliderImages) : 1 }};

    function addMobileImageInput() {
        const container = document.getElementById('mobileImageInputs');

        const wrapper = document.createElement('div');
        wrapper.className = 'input-group mb-2';

        wrapper.innerHTML = `
            <input type="file" name="mobile_slider[${mobileImageIndex}]" class="form-control">
            <input type="text" name="mobile_alt[${mobileImageIndex}]" class="form-control" placeholder="Alt text">
            <button type="button" class="btn btn-danger remove-btn" onclick="removeMobileInput(this)">Remove</button>
        `;

        container.appendChild(wrapper);

        // Re-initialize Dropify
        $(wrapper).find('.dropify').dropify();

        mobileImageIndex++;
    }

    function removeMobileInput(button) {
        const container = document.getElementById('mobileImageInputs');
        const inputs = container.querySelectorAll('.input-group');

        if (inputs.length > 1) {
            button.parentElement.remove();
        } else {
            alert("At least one mobile slider image must remain.");
        }
    }
</script>

@endpush
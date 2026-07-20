@extends('admin.layouts.app')

@section('title', 'Product Add')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Product Add</h3>
            </div>
        </div>
    </div> <!-- Row end -->

    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('product.store') }}">
            @csrf
            <div class="col-xl-12 col-lg-8">
                <div class="card mb-3 p-3">
                    <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold">Product Information</h6>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-6">
                                    <label class="form-label">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                        </div>
                        <div class="col-md-6">
                                    <label class="form-label">Sub Category</label>
                                    <select name="subcategory_id" id="subcategory_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                        @endforeach
                                    </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Product Title</label>
                            <input type="text" id="title" name="title" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Product Name</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Product Url</label>
                            <input type="text" id="product_url" name="product_url"  class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Short Description</label>
                            <textarea name="short_description" class="form-control summernote"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="image">Side Menu Image</label>
                            <input type="file" name="side_menu_image" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="image">Front Image</label>
                            <input type="file" name="front_image" class="form-control">
                        </div>
                    <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold">Product Image Information</h6>
                    </div>
                        <div class="col-md-12">
                            <label class="form-label">Title</label>
                            <textarea id="product_title" name="product_title" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="product_description" class="form-control summernote"></textarea>
                        </div>
                         <div class="col-md-12">
                            <label for="detail_description" class="form-label">Detail Description</label>
                            <textarea id="detail_description" name="product_detail_desc" class="form-control summernote"></textarea>
                        </div>
                        <!-- Desktop Images -->
                        <div class="col-md-12">
                            <label class="form-label">Image Desktop</label>
                            <div id="desktopImageInputs">
                                <div class="input-group mb-2">
                                    <input type="file" name="image_desktop" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Images -->
                        <div class="col-md-12 mt-4">
                            <label class="form-label">Image Mobile</label>
                            <div id="mobileImageInputs">
                                <div class="input-group mb-2">
                                    <input type="file" name="image_mobile" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <label class="form-label">3D Image</label>
                                <div class="input-group mb-2">
                                    <input type="file" name="image_3d" class="form-control">
                                </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Feature Heading</label>
                            <input type="text" id="feature_heading" name="feature_heading" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="features" class="form-label">Features Description</label>
                            <textarea name="features" class="form-control summernote"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Application Heading</label>
                            <input type="text" id="app_heading" name="app_heading" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="application" class="form-label">Application Description</label>
                            <textarea name="application" class="form-control summernote"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Accessories & Item Description</label>
                            <input type="text" id="item_desc_heading" name="item_desc_heading" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Item Description</label>
                            <textarea name="item_description" class="form-control summernote"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea name="meta_description" class="form-control summernote"></textarea>
                        </div>
                        <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold">Advantages / Characteristics</h6>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Advantages Heading</label>
                            <input type="text" id="adv_heading" name="adv_heading" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="adv_image">Image</label>
                            <input type="file" name="adv_image" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="adv_description" class="form-label">Advantage Description</label>
                            <textarea name="adv_description" class="form-control summernote"></textarea>
                        </div>
                        <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold">Requirements</h6>b
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Requirements Heading</label>
                            <input type="text" id="req_heading" name="req_heading" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="requirements" class="form-label">Requirement Description</label>
                            <textarea name="req_description" class="form-control summernote"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="movements" class="form-label">Movements Table</label>
                            <textarea name="movements" id="movements" class="form-control summernote"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="banner">Top Banner</label>
                            <input type="file" id="top_banner" name="top_banner" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="banner">Top Banner Mobile</label>
                            <input type="file" id="top_banner_mobile" name="top_banner_mobile" class="form-control">
                        </div>
                         <div class="col-md-12">
                            <label class="form-label" for="banner">Menu Banner</label>
                            <input type="file" id="menu_banner" name="menu_banner" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="banner">Menu Image</label>
                            <input type="file" id="menu_image" name="menu_image" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="menu_description" class="form-label">Menu Description</label>
                            <textarea name="menu_description" id="menu_description" class="form-control summernote"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Pressure Thrust Heading</label>
                            <input type="text" id="pressure_thurst_heading" name="pressure_thurst_heading" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="pressure_thurst_table" class="form-label">Pressure Thrust Image</label>
                            <textarea name="pressure_thurst_table" id="pressure_thurst" class="form-control summernote"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Torsional Rotation Heading</label>
                            <input type="text" id="torsional_rotation_heading" name="torsional_rotation_heading" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="torsional_rotation_table" class="form-label">Torsional Rotation Image</label>
                            <textarea name="torsional_rotation_table" id="torsional_rotation" class="form-control summernote"></textarea>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label" for="pdf">Upload PDF</label>
                            <input type="file" id="pdf" name="pdf" class="form-control">
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

<!-- Cropper CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">

<!-- Plugin CSS files -->
<link rel="stylesheet" href="{!! asset('public/admin_public/dist/assets/plugin/multi-select/css/multi-select.css') !!}">
<link rel="stylesheet"
    href="{!! asset('public/admin_public/dist/assets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.css') !!}">
<link rel="stylesheet" href="{!! asset('public/admin_public/dist/assets/plugin/dropify/dist/css/dropify.min.css') !!}">
<link rel="stylesheet"
    href="{!! asset('public/admin_public/dist/assets/plugin/datatables/responsive.dataTables.min.css') !!}">
<link rel="stylesheet"
    href="{!! asset('public/admin_public/dist/assets/plugin/datatables/dataTables.bootstrap5.min.css') !!}">
@endpush

@push('scripts')
<!-- Summernote JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<!-- Cropper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script src="{!! asset('public/admin_public/dist/assets/plugin/multi-select/js/jquery.multi-select.js') !!}"></script>
<script src="{!! asset('public/admin_public/dist/assets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.js') !!}"></script>
<script src="{!! asset('public/admin_public/dist/assets/bundles/dropify.bundle.js') !!}"></script>
<script src="{!! asset('public/admin_public/dist/assets/bundles/dataTables.bundle.js') !!}"></script>

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
        $('#product_title').summernote({
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
        $('#movements').summernote({
        placeholder: 'Enter movements table data...',
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
@extends('admin.layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Edit Product</h3>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('product.update', $data->id) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data->id }}" />

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
                                    <option value="{{ $category->id }}" 
                                        {{ $category->id == $data->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Sub Category</label>
                            <select name="subcategory_id" id="subcategory_id" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" 
                                        {{ $subcategory->id == $data->subcategory_id ? 'selected' : '' }}>
                                        {{ $subcategory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Product Title</label>
                            <input type="text" name="title" value="{{ $data->title }}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="name" value="{{ $data->name }}"
                                class="form-control">
                        </div>
                         <div class="col-md-6">
                            <label class="form-label">Product Url</label>
                            <input type="text" name="product_url" value="{{ $data->url }}"
                                class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Short Description</label>
                            <textarea name="short_description"class="form-control summernote">{{ $data->short_description }}</textarea>
                        </div>
                        <div class="card-body">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-12">
                                    <label class="form-label" for="input-file-front">Front Image</label>
                                    <input type="file" id="input-file-front" name="front_image" class="dropify"
                                        data-default-file="{{ asset('public/products/front_image/' . $data->front_image) }}">
                                </div>
                                @if ($errors->has('front_image'))
                                <span class="text-danger">{{ $errors->first('front_image') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-12">
                                    <label class="form-label" for="input-file-front">Side Menu favicon</label>
                                    <input type="file" id="input-file-front" name="side_menu_image" class="dropify"
                                        data-default-file="{{ asset('public/products/sidemenu/' . $data->side_menu_image) }}">
                                </div>
                                @if ($errors->has('side_menu_image'))
                                <span class="text-danger">{{ $errors->first('side_menu_image') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold">Product Image Information</h6>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Title</label>
                            <textarea id="product_title" name="product_title" class="form-control">{!! $data->product_title !!}</textarea>
                        </div>

                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="product_description" name="product_description"
                                class="form-control summernote">{{ $data->product_description }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="detail_description" class="form-label">Detail Description</label>
                            <textarea id="product_detail_desc" name="product_detail_desc"
                                class="form-control summernote">{{ $data->product_detail_desc }}</textarea>
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
                                                data-default-file="{{ asset('public/products/desktop/' . $data->product_img_desktop) }}">
                                        </div>
                                        @if ($errors->has('image_desktop'))
                                        <span class="text-danger">{{ $errors->first('image_desktop') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
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
                                                data-default-file="{{ asset('public/products/mobile/' . $data->product_img_mobile) }}">
                                        </div>
                                        @if ($errors->has('image_mobile'))
                                        <span class="text-danger">{{ $errors->first('image_mobile') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center">
                            <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                    <h6 class="mb-0 fw-bold">3D Images</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-12">
                                            <label class="form-label" for="input-file-front">Image Upload</label>
                                            <input type="file" id="input-file-front" name="image_3d" class="dropify"
                                                data-default-file="{{ asset('public/products/3d_images/' . $data->image_3d) }}">
                                        </div>
                                        @if ($errors->has('image_3d '))
                                        <span class="text-danger">{{ $errors->first('image_3d ') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Feature Heading</label>
                            <input type="text" name="feature_heading" value="{{ $data->feature_heading }}"class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="features" class="form-label">Features</label>
                            <textarea name="features"class="form-control summernote">{{ $data->features }}</textarea>
                        </div>
                         <div class="col-md-6">
                            <label class="form-label">Application Heading</label>
                            <input type="text" name="app_heading" value="{{ $data->app_heading }}"class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="application" class="form-label">Application</label>
                            <textarea name="application"class="form-control summernote">{{ $data->application }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Accessories & Item Description</label>
                            <input type="text" name="item_desc_heading" value="{{ $data->item_desc_heading }}" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Advantages / Characteristics Description</label>
                            <textarea name="item_description"class="form-control summernote">{{ $data->item_description }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" value="{{ $data->meta_title }}"
                                class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="meta_description" class="form-label">Meta Dsescription</label>
                            <textarea name="meta_description"class="form-control summernote">{{ $data->meta_description }}</textarea>
                        </div>
                        <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold">Advantages / Characteristics</h6>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" name="adv_heading" value="{{ $data->adv_heading }}"class="form-control">
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12">
                                        <label class="form-label" for="input-file-front">Image</label>
                                        <input type="file" id="input-file-front" name="adv_image" class="dropify"
                                            data-default-file="{{ asset('public/products/adv_image/'. $data->adv_image) }}">
                                    </div>
                                    @if ($errors->has('adv_image'))
                                    <span class="text-danger">{{ $errors->first('adv_image') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="adv_description" class="form-label">Description</label>
                            <textarea name="adv_description"class="form-control summernote">{{ $data->adv_description }}</textarea>
                        </div>
                        {{-- <div class="card mb-3">
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12">
                                        <label class="form-label" for="input-file-front">Image</label>
                                        <input type="file" id="input-file-front" name="req_image" class="dropify"
                                            data-default-file="{{ asset('public/products/'. $data->req_image) }}">
                                    </div>
                                    @if ($errors->has('req_image'))
                                    <span class="text-danger">{{ $errors->first('req_image') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-md-6">
                            <label class="form-label">Requirements Heading</label>
                            <input type="text" name="req_heading" value="{{ $data->req_heading }}"class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="requirements" class="form-label">Requirements</label>
                            <textarea name="req_description"class="form-control summernote">{{ $data->req_description }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="movements" class="form-label">Movements Table</label>
                            <textarea name="movements" id="movements" class="form-control">{{ $data->movements_table }}</textarea>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12">
                                        <label class="form-label" for="input-file-front">Top banner</label>
                                        <input type="file" id="input-file-front" name="top_banner" class="dropify"
                                            data-default-file="{{ asset('public/products/banner/desktop/'. $data->top_banner) }}">
                                    </div>
                                    @if ($errors->has('top_banner'))
                                    <span class="text-danger">{{ $errors->first('top_banner') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12">
                                        <label class="form-label" for="input-file-front">Top banner Mobile</label>
                                        <input type="file" id="input-file-front" name="top_banner_mobile" class="dropify"
                                            data-default-file="{{ asset('public/products/banner/mobile/'. $data->top_banner_mobile) }}">
                                    </div>
                                    @if ($errors->has('top_banner_mobile'))
                                    <span class="text-danger">{{ $errors->first('top_banner_mobile') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12">
                                        <label class="form-label" for="input-file-front">Menu Banner</label>
                                        <input type="file" id="input-file-front" name="menu_banner" class="dropify"
                                            data-default-file="{{ asset('public/products/menu/banner/'. $data->menu_banner) }}">
                                    </div>
                                    @if ($errors->has('menu_banner'))
                                    <span class="text-danger">{{ $errors->first('menu_banner') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12">
                                        <label class="form-label" for="input-file-front">Menu Image</label>
                                        <input type="file" id="input-file-front" name="menu_image" class="dropify"
                                            data-default-file="{{ asset('public/products/menu/image/'. $data->menu_image) }}">
                                    </div>
                                    @if ($errors->has('menu_image'))
                                    <span class="text-danger">{{ $errors->first('menu_image') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="menu_description" class="form-label">Menu Description</label>
                            <textarea name="menu_description" id="menu_description" class="form-control summernote">{{ $data->menu_description }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Pressure Thrust Heading</label>
                            <input type="text" id="pressure_thurst_heading" name="pressure_thurst_heading" value="{{ $data->pressure_thurst_heading }}" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="pressure_thurst_table" class="form-label">Pressure Thrust Image</label>
                            <textarea name="pressure_thurst_table" id="pressure_thurst" class="form-control summernote">{{ $data->pressure_thurst_table }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Torsional Rotation Heading</label>
                            <input type="text" id="torsional_rotation_heading" name="torsional_rotation_heading" value="{{ $data->torsional_rotation_heading }}" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="torsional_rotation_table" class="form-label">Torsional Rotation Image</label>
                            <textarea name="torsional_rotation_table" id="torsional_rotation" class="form-control summernote">{{ $data->torsional_rotation_table }}</textarea>
                        </div>
                         <div class="col-md-12">
                            <label class="form-label" for="pdf">Upload PDF</label>
                            <input type="file" id="pdf" name="pdf" class="form-control">
                        </div>
                        @if ($data->pdf)
                            <div class="mt-2">
                                <a href="{{ asset('public/products/pdfs/' . $data->pdf) }}" target="_blank">View Current PDF</a>
                            </div>
                        @endif
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
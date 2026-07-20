@extends('admin.layouts.app')

@section('title', 'Faq Add')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Faq Add</h3>
            </div>
        </div>
    </div> <!-- Row end -->

    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('faq.store') }}">
            @csrf
            <div class="col-xl-12 col-lg-8">
                <div class="card mb-3 p-3">
                    <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold">Faq Information</h6>
                    </div>
                    <div class="row g-3 align-items-center">

                        <div class="col-md-12">
                            <label for="faq_name" class="form-label">Faq Name</label>
                            <input type="text" id="faq_name" name="faq_name" required class="form-control">
                        </div>


                        <div class="col-md-12">
                            <label for="title_description" class="form-label">Title & Description</label>
                            <div class="title-description-container">
                                <div id="title_description_fields">
                                    <div class="row g-3 title-description-row">
                                        <div class="col-md-4">
                                            <input type="text" name="title[]" class="form-control" placeholder="Title">
                                        </div>
                                        <div class="col-md-4">
                                            <textarea name="description[]" class="form-control summernote"
                                                placeholder="Description"></textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-primary add-more">Add More</button>
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

<!-- Cropper CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">

<!--plugin css file -->
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
<script src="{!! asset('public/admin_public/dist/assets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.js') !!}">
</script>
<script src="{!! asset('public/admin_public/dist/assets/bundles/dropify.bundle.js') !!}"></script>
<script src="{!! asset('public/admin_public/dist/assets/bundles/dataTables.bundle.js') !!}"></script>

<script>
$(document).ready(function() {
    $('#description').summernote({
        placeholder: 'Enter Faq Name here...',
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

    function initializeSummernoteForDescriptions() {
        $('.summernote').each(function() {
            $(this).summernote({
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
    }

    // Initialize Summernote for existing description fields
    initializeSummernoteForDescriptions();

    // Add More functionality
    $(document).on('click', '.add-more', function() {
        var html = `
        <div class="row g-3 title-description-row">
            <div class="col-md-4">
                <input type="text" name="title[]" class="form-control" placeholder="Title">
            </div>
            <div class="col-md-4">
                <textarea name="description[]" class="form-control summernote" placeholder="Description"></textarea>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-danger remove">Remove</button>
            </div>
        </div>`;
        $('#title_description_fields').append(html);
        // Reinitialize Summernote for newly added description fields
        initializeSummernoteForDescriptions();
    });

    // Remove row functionality
    $(document).on('click', '.remove', function() {
        $(this).closest('.title-description-row').remove();
    });
});
</script>
@endpush
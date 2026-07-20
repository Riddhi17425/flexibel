@extends('admin.layouts.app')

@section('title', 'Lifeimage Add')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Lifeimage Add</h3>
            </div>
        </div>
    </div> <!-- Row end -->

    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('lifeimage.store') }}">
            @csrf
            <div class="col-xl-12 col-lg-8">
                <div class="card mb-3 p-3">
                    <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold">Lifeimage Information</h6>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-12">
                            <label class="form-label">Lifeimage Name</label>
                            <input type="text" id="title" name="title" required class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Slider Image</label>
                            <div id="imageInputs">
                                <div class="input-group mb-2">
                                    <input type="file" name="lifeimage[]" class="form-control">
                                    <input type="text" name="lifeimage_alt[]" class="form-control" placeholder="Alt text">
                                    <button type="button" class="btn btn-danger remove-btn" onclick="removeInput(this)">Remove</button>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary mt-2" onclick="addImageInput()">Add More</button>
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
        $('#description').summernote({
            placeholder: 'Enter lifeimage description here...',
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
            <input type="file" name="lifeimage[]" class="form-control">
            <input type="text" name="lifeimage_alt[]" class="form-control" placeholder="Alt text">
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
@endpush
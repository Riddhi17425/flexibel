@include('layouts.header')
<section>
    <div class="container">
        <div class="banner_wrapper">
            <!--<picture>-->
            <!--<source media="(max-width:992px)" srcset="{{asset('public/front/images/flexibel_banner/datasheets_m.webp')}}" alt="datasheet banner" class="banner img-fluid bd_rd_10">-->
            <!--<img src="{{asset('public/front/images/datasheet_banner.png')}}" alt="datasheet banner" class="banner img-fluid bd_rd_10">-->
            <!--</picture>-->
            <!--<img src="{{asset('public/front/images/datasheet_banner.png')}}" alt="datasheet banner" class="banner img-fluid">-->
            <div class="banner_text">
                <div class="">
                    <!--<h1 class="main_head">Datasheets</h1>-->
                    <div class="breadcrumb d-none d-md-block">
                        <a href="{{url('/')}}">Home </a><a href="javascript:void(0)">&nbsp;| Datasheets</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mt-100">
    <div class="container">
        <div class="row ">
            <p class="sub_head ms-0">Our Datasheets</p>
            <h1 class="main_head text-start">Our Datasheets</h1>
            <!--<p>Lorem ipsum dolor sit amet consectetur. Elit a nisi tellus scelerisque ut. Sit lectus dis feugiat consectetur vel varius sed. Justo et hendrerit vulputate proin quis est eget urna. Vestibulum varius adipiscing viverra vel dui non in. Vitae ut venenatis in mollis morbi nunc in. Enim donec tellus gravida ut tristique tempus justo purus.</p>-->
        </div>
        <div class="technical_brochures_tab mt-4">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                @foreach ($datasheet_categories as $index => $category)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $index == 0 ? 'active' : '' }}" id="pills-{{ $category->id }}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{ $category->id }}" type="button" role="tab" aria-controls="pills-{{ $category->id }}" aria-selected="{{ $index == 0 ? 'true' : 'false' }}">
                            {{ $category->title ?? '' }}
                        </button>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content" id="pills-tabContent">
                @foreach ($datasheet_categories as $category)
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="pills-{{ $category->id }}" role="tabpanel" aria-labelledby="pills-{{ $category->id }}-tab">
                        <div class="row mt-4 mt-md-1 g-md-5">
                            @foreach ($category->subcategories as $subcategory)
                                <div class="col-md-4">
                                    <div class="blog_card">
                                        <!-- Assuming each subcategory has an image path and title -->
                                        <img src="{{ asset('public/datasheets/' . $subcategory->image) }}" class="img-fluid" alt="detasheet">
                                        <div class="card-body px-0">
                                            <div class="d-flex justify-content-between">
                                                <h4 class="blog_title mb-2">{{ $subcategory->title }}</h4>
                                                <a href="#" class="svg_arrow" data-bs-toggle="modal" data-bs-target="#datasheet">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                                        <path d="M7.62109 17L17.6211 7M17.6211 7H7.62109M17.6211 7V17" stroke="#C12729" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="datasheet" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Request for Datasheet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="brochureform" method="POST" action="{{ route('datasheet.submit') }}">
                    @csrf
                    <div class="col-md-12 vacancie_form">
                        <div class="stepper_wrapper">
                            <!-- <p>Fill out the form below with your details, and we’ll get back to you as soon as possible.</p> -->
                            <div class="row">
                                <div class="col-md-12 mb-xxl-5 mb-lg-4">
                                    <label>Full Name * </label>
                                    <input type="text" name="fullname" id="fullname" 
                                        oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                                        class="form-control" placeholder="Enter your full name">
                                        <small id="fullnameError" class="text-danger"></small>
                                </div>
                                <div class="col-md-12 mb-xxl-5 mb-lg-4">
                                    <label>Contact Number</label>
                                    <input type="text" name="mobile" id="mobile" class="form-control" 
                                            maxlength="20" 
                                            oninput="this.value = this.value.replace(/[^0-9+()\-\s]/g, '').slice(0, 20);"
                                            pattern="^\+?[1-9]\d{1,3}[-\s]?\d{6,14}$"
                                            title="Enter a valid international phone number, e.g. +65 91234567"
                                            placeholder="Enter your contact detail">
                                        <small id="mobileError" class="text-danger"></small>
                                </div>
                                <div class="col-md-12 mb-xxl-5 mb-lg-4">
                                    <label>Email Address*</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email ID">
                                    <small id="emailError" class="text-danger"></small>
                                </div>
                                <div class="col-md-12 mb-xxl-5 mb-lg-4">
                                    <label>City * </label>
                                    <select class="form-select" id="city" name="city" aria-label="Default select example">
                                        <option value="" selected disabled>Select city</option>
                                        <option value="city1">City 1</option>
                                        <option value="city2">City 2</option>
                                        <option value="city3">City 3</option>
                                    </select>
                                    <div id="cityError" class="text-danger mt-1"></div>
                                </div>
                                <div class="col-md-12 mb-xxl-5 mb-lg-4">
                                    <label>Message *</label>
                                    <input type="text" name="message" id="message" class="form-control" placeholder="Enter your message">
                                        <small id="messageError" class="text-danger"></small>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" id="submitBtn" class="prod_btn">
                                        Submit
                                        <span class="svg ms-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">
                                                <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
@include('layouts.footer')

<script>
document.addEventListener("DOMContentLoaded", function () {
    const disposableDomains = [
        'mailinator.com', '10minutemail.com', 'guerrillamail.com', 'tempmail.com',
        'temp-mail.org', 'throwawaymail.com', 'maildrop.cc', 'dispostable.com',
        'getairmail.com', 'moakt.com', 'spamgourmet.com', 'yopmail.com',
        'sharklasers.com', 'mailnesia.com', 'fakemail.net', 'emailondeck.com',
        'trashmail.com', 'mintemail.com', 'mytemp.email'
    ];

    const emailField = document.getElementById('email');
    const emailError = document.getElementById('emailError');
    const form = document.getElementById('brochureform');
    const submitBtn = document.getElementById('submitBtn');
    const fullnameField = document.getElementById('fullname');
    const fullnameError = document.getElementById('fullnameError');
    const mobileField = document.getElementById('mobile');
    const mobileError = document.getElementById('mobileError');
    const messageField = document.getElementById('message');
    const messageError = document.getElementById('messageError');
    const cityField = document.getElementById('city');  
    const cityError = document.getElementById('cityError');

    function showError(message, errorElement) {
        errorElement.textContent = message;
        errorElement.style.display = 'block';
    }

    function clearError(errorElement) {
        errorElement.textContent = '';
        errorElement.style.display = 'none';
    }

    function validateEmail() {
        const emailInput = emailField.value.trim();
        clearError(emailError);
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailInput === "") {
            showError('Email Address is required.', emailError);
            return false;
        }
        if (!emailRegex.test(emailInput)) {
            showError('Please enter a valid email address.', emailError);
            return false;
        }
        const domain = emailInput.split('@')[1]?.toLowerCase();
        if (disposableDomains.includes(domain)) {
            showError('Invalid email addresses are not allowed.', emailError);
            return false;
        }
        return true;
    }

    function validateFullname() {
        const value = fullnameField.value.trim();
        clearError(fullnameError);
        if (!value) {
            showError('Full Name is required.', fullnameError);
            return false;
        }
        return true;
    }

    function validateMobile() {
        const value = mobileField.value.trim();
        clearError(mobileError);
        if (!value) {
            showError('Contact Number is required.', mobileError);
            return false;
        }
        const digitsOnly = value.replace(/\D/g, '');
        if (digitsOnly.length < 10 || digitsOnly.length > 15) {
            showError('Contact number must be between 10 and 15 digits.', mobileError);
            return false;
        }
        return true;
    }

    function validateCity() {
        const value = cityField.value.trim();
        clearError(cityError);
        if (!value) {
            showError('Please select a city.', cityError);
            return false;
        }
        return true;
    }

    function validateMessage() {
        const value = messageField.value.trim();
        clearError(messageError);
        if (!value) {
            showError('Message is required.', messageError);
            return false;
        }
        return true;
    }

    function validateAll() {
        const a = validateFullname();
        const b = validateEmail();
        const c = validateMobile();
        const d = validateCity();
        const e = validateMessage();
        return a && b && c && d && e;
    }

    form.addEventListener('submit', function (e) {
        if (!validateAll()) {
            e.preventDefault();
        }
    });

    [fullnameField, cityField, emailField, mobileField, messageField].forEach(input => {
        input.addEventListener('input', validateAll);
    });
});
</script>
<style>
    small.text-danger {
        color: red;
        font-size: 14px;
        display: none;
    }
</style>
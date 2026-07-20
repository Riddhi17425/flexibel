@include('layouts.header')
<section>
    <div class="container">
       <div class="banner_wrapper">
            <!--<img src="{{ asset('public/front/images/vacancies_banner.png') }}" alt="Current Vacancies" class="banner img-fluid">-->
            <!--<picture>-->
            <!--    <source media="(max-width:992px)" srcset="{{asset('public/front/images/flexibel_banner/careers_m.webp')}}" alt="Current Vacancies" class="banner img-fluid bd_rd_10">-->
            <!--    <img src="{{asset('public/front/images/vacancies_banner.png')}}" alt="Current Vacancies" class="banner img-fluid bd_rd_10">-->
            <!--</picture>-->
            <div class="banner_text">
                <div class="">
                    <!--<p class="main_head">Current Vacancies</p>-->
                    <div class="breadcrumb d-none d-md-block">
                        <a href="{{ url('/') }}">Home </a><a href="javascript:void(0)">| Career</a><a href="{{ route('current.vacancies') }}">&nbsp;| Current Vacancies</a><a href="javascript:void(0)">&nbsp;| {{ $job->title}}</a>
                    </div>
                </div>
            </div>
       </div>
    </div>
</section>
<section class="mt-100">
    <div class="container">
        <div class="row">
            <div class="col-md-9 ">
                <h1 class="main_head_red text-lg-start">{{ $job->title}}</h1>
            </div>
            <div class="col-md-3 text-lg-end">
                <a href="#jobForm" class="prod_btn">Apply Now
                    <span class="svg  ms-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15" fill="none">
                            <path d="M1.98047 13.5L11.9805 1.5M11.9805 1.5H1.98047M11.9805 1.5V12.4091" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </a>
            </div>
            <ul class="ul-column-list mt-3 mt-md-0">
                {!! $job->details !!}
            </ul>
                {!! $job->description !!}
            
        </div>
    </div>
    <div class="container mt-100">
        <div class="row">
            <div class="col-lg-9 vacancie_form">
                <form class="stepper_wrapper" id="jobForm" action="{{ route('job-details.submit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <p>Fill out the form below with your details, and we’ll get back to you as soon as possible.</p>
                    <div class="row">
                        <div style="display:none;">
                            <input type="text" name="website_url" id="website_url" value="">
                        </div>
                        <div class="col-md-6 mb-lg-5 mb-md-3 mb-3">
                            <label>Full Name * </label>
                            <input type="text" class="form-control" id="fullname" name="fullname" maxlength="50"
                                oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                                placeholder="Enter your full name">
                            <span class="error" id="error-fullname"></span>
                        </div>
                        <div class="col-md-6 mb-md-5 mb-md-3 mb-3">
                            <label>Years of Experience *</label>
                            <input type="text" class="form-control" id="year" name="year" maxlength="2" inputmode="numeric" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2);"
                                placeholder="Enter your Experience">
                            <span class="error" id="error-year"></span>
                        </div>
                                                <div class="col-md-6 mb-lg-5 mb-md-3 mb-3">
                            <label>Contact Number*</label>
                            <input type="tel" class="form-control" id="phone" name="phone" maxlength="15" minlength="10"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15);"
                                placeholder="Enter your Contact Number" pattern="\d{10,15}" title="Contact number must be between 10 to 15 digits">
                            <span class="error" id="error-phone"></span>
                        </div>
                        <!-- this is for the position of the user applied for -->
                        <input type="hidden" name="applied_for" value="{{ $job->title }}"> 
                        <div class="col-md-6 mb-lg-5 mb-md-3 mb-3">
                            <label>Email Address*</label>
                            <input type="email" class="form-control" id="email" name="email" maxlength="60" placeholder="Enter your email ID">
                            <span class="error" id="error-email"></span>
                        </div>
                        <div class="col-md-12 mb-lg-5 mb-md-3 mb-3">
                            <label>Message *</label>
                            <input type="text" class="form-control" id="message" name="message" placeholder="Enter your message">
                            <span class="error" id="error-message"></span>
                        </div>
                        <div class="col-md-12 mb-lg-5 mb-md-3 mb-3">
                            <label for="uploadResume">Upload Resume *:</label>
                            <label class="custom-file-upload">
                                <input type="file" id="uploadResume" name="resume" accept=".pdf,.doc,.docx">
                                <p>Attach Your Resume In PDF, Word Format</p>
                                <p><small>Max Size: 5 Mb</small></p>
                            </label>
                            <span class="error" id="error-uploadResume"></span>
                        </div>
                        <!--<div class="col-md-12 mb-lg-5 mb-md-3">-->
                        <!--    <label>Captcha *</label>-->
                        <!--    <input type="text" class="form-control" placeholder="Enter captcha code">-->
                        <!--</div>-->
                        <div class="form-group mb-3">
                                {!! NoCaptcha::display(['data-callback' => 'recaptchaCallback']) !!}
                                <small id="recaptcha-error"  class="text-danger" style="display:none;"></small>
                                @error('g-recaptcha-response')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                        </div>
                        
                        <div class="col-md-3">
                            <button type="submit" href="javascript:void(0)" class="prod_btn mt-2">
                                Submit
                                <span class="svg ms-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">
                                        <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
                {!! NoCaptcha::renderJs() !!}
            </div>
            <div class="col-md-3 form_img">
                <img src="{{ asset('public/front/images/vacancies-details.png') }}" alt="vacancies-details" class=" img-fluid">

            </div>
        </div>
    </div>
</section>
<script>
    document.getElementById('uploadResume').addEventListener('change', function() {
        if (this.files.length > 0) {
            this.nextElementSibling.innerHTML = `<p>${this.files[0].name}</p>`;
        }
    });
</script>
@include('layouts.footer')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>
    const disposableDomains = [
        'mailinator.com', '10minutemail.com', 'guerrillamail.com', 'tempmail.com',
        'temp-mail.org', 'throwawaymail.com', 'maildrop.cc', 'dispostable.com',
        'getairmail.com', 'moakt.com', 'spamgourmet.com', 'yopmail.com',
        'sharklasers.com', 'mailnesia.com', 'fakemail.net', 'emailondeck.com',
        'trashmail.com', 'mintemail.com', 'mytemp.email'
    ];

    function recaptchaCallback() {
        document.getElementById('recaptcha-error').style.display = 'none';
        document.getElementById('recaptcha-error').innerText = '';
    }

    $(document).ready(function () {
        $('#jobForm input, #jobForm textarea').on('input', function () {
            let fieldId = $(this).attr('id');
            let value = $(this).val().trim();
            let errorId = '#error-' + fieldId;

            if (value === '') {
                let message = 'This field is required';
                if (fieldId === 'fullname') message = 'Please enter your full name';
                if (fieldId === 'phone') message = 'Please enter your phone number';
                if (fieldId === 'email') message = 'Please enter your email';
                if (fieldId === 'year') message = 'Please enter years of experience';
                if (fieldId === 'message') message = 'Please enter your message';
                $(errorId).text(message);
            } else {
                if (fieldId === 'phone' && !/^\d{10,15}$/.test(value)) {
                    $(errorId).text('Phone number must be between 10 to 15 digits');
                } else if (fieldId === 'email') {
                    let domain = value.split('@')[1]?.toLowerCase();
                    if (!/^\S+@\S+\.\S+$/.test(value)) {
                        $(errorId).text('Please enter a valid email');
                    } else if (disposableDomains.includes(domain)) {
                        $(errorId).text('Invalid email addresses are not allowed');
                    } else {
                        $(errorId).text('');
                    }
                } else {
                    $(errorId).text('');
                }
            }
        });

        $('#uploadResume').on('change', function () {
            const file = this.files[0];
            const errorEl = $('#error-uploadResume');

            if (!file) {
                errorEl.text('Please upload your resume');
            } else if (file.size > 5 * 1024 * 1024) {
                errorEl.text('File size must be under 5 MB');
                this.value = ''; // clear file
            } else {
                errorEl.text('');
            }
        });

        $('#jobForm').on('submit', function (e) {
            e.preventDefault();
            let isValid = true;
            $('.error').text('');

            const fullname = $('#fullname').val().trim();
            const year = $('#year').val().trim();
            const phone = $('#phone').val().trim();
            const email = $('#email').val().trim();
            const message = $('#message').val().trim();
            const resumeFile = $('#uploadResume').get(0).files[0];

            if (!fullname) {
                $('#error-fullname').text('Please enter your full name');
                isValid = false;
            }

            if (!year) {
                $('#error-year').text('Please enter years of experience');
                isValid = false;
            }

            if (!phone) {
                $('#error-phone').text('Please enter your phone number');
                isValid = false;
            } else if (!/^\d{10,15}$/.test(phone)) {
                $('#error-phone').text('Phone number must be between 10 to 15 digits');
                isValid = false;
            }

            if (!email) {
                $('#error-email').text('Please enter your email');
                isValid = false;
            } else if (!/^\S+@\S+\.\S+$/.test(email)) {
                $('#error-email').text('Please enter a valid email');
                isValid = false;
            } else {
                let domain = email.split('@')[1].toLowerCase();
                if (disposableDomains.includes(domain)) {
                    $('#error-email').text('Disposable email addresses are not allowed');
                    isValid = false;
                }
            }

            if (!message) {
                $('#error-message').text('Please enter your message');
                isValid = false;
            }

            if (!resumeFile) {
                $('#error-uploadResume').text('Please upload your resume');
                isValid = false;
            } else if (resumeFile.size > 5 * 1024 * 1024) {
                $('#error-uploadResume').text('File size must be under 5 MB');
                isValid = false;
            }

            if (grecaptcha.getResponse() === '') {
                $('#recaptcha-error').text('Please verify that you are not a robot').show();
                isValid = false;
            }

            if (isValid) {
                const submitBtn = $(this).find('button[type="submit"]');
                submitBtn.prop('disabled', true).text('Submitting...');
                this.submit();
            }
        });
    });
</script>

<style>
    .error {
        color: red;
        font-size: 14px;
        margin-top: 4px;
        display: block;
    }

    .text-danger {
        color: red !important;
    }
</style>

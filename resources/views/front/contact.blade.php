@include('layouts.header')
<section>
    <div class="container">
        <div class="banner_wrapper">
        <!--    <picture>-->
        <!--    <source media="(max-width:992px)" srcset="{{asset('public/front/images/flexibel_banner/contact_m.webp')}}" alt="contact banner" class="banner img-fluid bd_rd_10">-->
        <!--    <img src="{{asset('public/front/images/flexibel_banner/contact.webp')}}" alt="contact banner" class="banner img-fluid bd_rd_10">-->
        <!--</picture>-->
        {{-- <img src="{{ asset('public/front/images/contact_banner.png')}}" alt="contact" class="banner img-fluid"> --}}
        <div class="banner_text">
            <div class="">
                <!--<h1 class="main_head">Contact Us</h1>-->
                <div class="breadcrumb d-none d-md-block">
                    <a href="{{ url('/') }}">Home </a><a href="javascript:void(0)">&nbsp;| Contact Us</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
<section class="mt-100">
    <div class="container">
        <div class="row gy-4">
            <div class="col-md-12">
                <!--Contact Us-->
                <!--<p class="sub_head ms-0">Get in Touch</p>-->
                <!--<p class="sub_head ms-0">Contact Us</p>-->
                <h1 class="main_head text-start">Contact Us</h1>
                <p>Have questions about our products or need a custom solution?
                    Weâ€™re here to help! Contact us for inquiries, quotes, or technical support. Our team is ready to
                    assist you with all your bellows and expansion joint needs.</p>
            </div>
            <div class="col-md-4">
                <div class="contact_de">
                    <img src="{{ asset('public/front/images/tail.svg')}}" alt="tail" class="img-fluid mb-2">
                    <h2 class="main_head_red mb-0">Dubai</h2>
                    <h3 class="test_name">Head Quarter</h3>
                    <ul class="contact_item">
                        <li class="d-flex gap-3">
                            <span>
                                <img src="{{ asset('public/front/images/location.svg')}}" alt="location">
                            </span>
                            <a target="_blank" href="https://www.google.com/maps?q=Al+Quoz+Industrial+Area+No.4,+P.O.+Box+181440,+Dubai,+United+Arab+Emirates">Al Quoz Industrial Area No.4, P.O. Box 181440, Dubai, United Arab Emirates</a>
                        </li>
                        <li class="d-flex gap-3">
                            <span>
                                <img src="{{ asset('public/front/images/email.svg')}}" alt="email">
                            </span>
                            <a href="mailto:sales@flexibel.ae" target="_blank">sales@flexibel.ae</a>
                        </li>
                        <li class="d-flex gap-3">
                            <span>
                                <img src="{{ asset('public/front/images/call.svg')}}" alt="call">
                            </span>
                            <a href="tel:+971529037473">+971 529037473</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact_card">
                    <img src="{{ asset('public/front/images/tail.svg')}}" alt="tail" class="img-fluid mb-2">
                    <h2 class="main_head_red mb-0">Bahrain</h2>
                    <h3 class="test_name">Sales Office</h3>
                    <ul class="contact_item">
                        <li class="d-flex gap-3">
                            <span>
                                <img src="{{ asset('public/front/images/location.svg')}}" alt="location">
                            </span>
                            <a target="_blank" href="https://www.google.com/maps?q=Arab+Ship+Building+%26+Repair+Yard,+P.O.Box+50486,+Kingdom+of+Bahrain">C/o. Arab Ship Building & Repair Yard, P.O.Box No. 50486,Kingdom of Bahrain.</a>
                        </li>
                        <li class="d-flex gap-3">
                            <span>
                                <img src="{{ asset('public/front/images/email.svg')}}" alt="email">
                            </span>
                            <a href="mailto:sales@flexibel.ae" target="_blank">sales@flexibel.ae</a>
                        </li>
                        <li class="d-flex gap-3">
                            <span>
                                <img src="{{ asset('public/front/images/call.svg')}}" alt="call">
                            </span>
                            <a href="tel:+97339463776">+973 394 637 76</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact_card">
                    <img src="{{ asset('public/front/images/tail.svg')}}" alt="tail" class="img-fluid mb-2">
                    <h2 class="main_head_red mb-0">Abu Dhabi</h2>
                    <h3 class="test_name">Sales Office</h3>
                    <ul class="contact_item">
                        <li class="d-flex gap-3">
                            <span>
                                <img src="{{ asset('public/front/images/location.svg')}}" alt="location">
                            </span>
                            <a target="_blank" href="https://www.google.com/maps?q=P.O.Box+9392+Musaffah+M-37+Abu+Dhabi+United+Arab+Emirates">P.O.Box 9392 Musaffah M-37 Abu Dhabi - United Arab Emirates</a>
                        </li>
                        <li class="d-flex gap-3">
                            <span>
                                <img src="{{ asset('public/front/images/email.svg')}}" alt="email">
                            </span>
                            <a href="mailto:sales.adh@goldenharbour.ae" target="_blank">sales.adh@goldenharbour.ae</a>
                        </li>
                        <li class="d-flex gap-3">
                            <span>
                                <img src="{{ asset('public/front/images/call.svg')}}" alt="call">
                            </span>
                            <a href="tel:+97125506844">+971 2 550 6844</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12 mt-md-5 mt-3">
                <div class="enquiry_wrapper prod_slider_wraper">
                    <div class="enquiry_ctnt position-relative">
                        <h2 class="main_head text-white text-start">Urgent Requirement? Get a Rapid Response</h2>
                        <p class="text-white" id="contact">If you have an urgent need, please click on below button to prioritize your inquiry. Our team will get back to you within 60 minutes.</p>
                        <a href="{{route('enquiry-form')}}" class="prod_btn" tabindex="0">
                        Enquire Now
                                    <span class="svg ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">
                                            <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-100" id="contact-us">
        <div class="row">
            <div class="col-lg-9 vacancie_form" >
                <div class="stepper_wrapper">
                    <p >Fill out the form below with your details, and weâ€™ll get back to you as soon as possible.</p>
                    <form  id="contactform" action="{{route('contact.submit')}}" method="post" >
                        @csrf
                        <input type="hidden" name="form_source" id="form_source" value="Page Inquiry">
                        <div style="display:none;">
                            <input type="text" name="website_url" id="website_url" value="">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-lg-5 mb-4">
                                <label>Full Name * </label>
                                <input type="text" name="fullname" id="fullname" maxlength="50"
                                    oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                                    class="form-control" placeholder="Enter your full name">
                                <small id="fullnameError" class="text-danger"></small>
                               
                            </div>
                            <div class="col-md-6 mb-md-5 mb-4">
                                <label>Company Name * : </label>
                                <input type="text" name="company_name" id="company_name" maxlength="50"
                                    oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                                    class="form-control" placeholder="Enter your company name">
                                <small id="company_nameError" class="text-danger"></small>
                                
                            </div>
                            <div class="col-md-6 mb-lg-5 mb-4">
                                <label>Contact Number *</label>
                                <input type="tel" name="mobile" id="mobile" class="form-control" 
                                    maxlength="15" minlength="10" 
                                    oninput="this.value = this.value.replace(/[^0-9+()\-\s]/g, '').slice(0, 20);"
                                    pattern="^\+?[1-9]\d{1,3}[-\s]?\d{6,14}$"
                                    title="Enter a valid international phone number, e.g. +65 91234567"
                                    placeholder="Enter your contact detail">
                                <small id="mobileError" class="text-danger"></small>
                                
                            </div>
                            <div class="col-md-6 mb-lg-5 mb-4">
                                <label>Email Address *</label>
                                <input type="email" name="email" id="email" maxlength="60" class="form-control" placeholder="Enter your email ID">
                                <small id="emailError" class="text-danger"></small>
                            </div>
                            
                             <div class="col-md-6 mb-lg-5 mb-4">
                                <label>Requirement Type *</label>
                                <select class="form-control" name="category_id" id="category_id">
                                    <option value="" selected disabled>Choose Your Requirement</option>
                                    @if(isset($productCategories) && is_countable($productCategories) && count($productCategories) > 0)
                                        @foreach($productCategories as $key => $val)
                                            <option value="{{$val->id}}">{{$val->name}}</option>
                                        @endforeach
                                        <option value="Service Related">Services Related</option>
                                        <option value="Others">Others</option>
                                    @endif
                                </select>
                                <small id="categoryError" class="text-danger"></small>
                            </div>

                            <div class="col-md-6 mb-lg-5 mb-4">
                                <label>Message *</label>
                                <input type="text" name="message" id="message" class="form-control" placeholder="Enter your message">
                                <small id="messageError" class="text-danger"></small>
                            </div>
                            {{-- <div class="col-md-6 mb-lg-5 mb-4">
                                <label>Captcha *</label>
                            </div> --}}
                            {{-- <div class="col-md-6 mb-lg-5 mb-4">
                                <label>Captcha *</label>
                                <input type="text" name="captcha" class="form-control" placeholder="Enter captcha code">
                            </div> --}}
                            <div class="form-group  mb-4">
                                {!! NoCaptcha::display(['data-callback' => 'recaptchaCallback']) !!}
                                <small id="recaptcha-error" class="text-danger" style="display:none;"></small>
                                @error('g-recaptcha-response')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <button type="submit" id="submitBtn" class="prod_btn">
                                    Submit
                                    <span class="svg ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">
                                            <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                    {!! NoCaptcha::renderJs() !!}
                </div>
            </div>
            <div class="col-lg-3 form_img">
                <img src="{{ asset('public/front/images/contact_globe.png')}}" alt="contact" class=" img-fluid" style="filter: brightness(0.8) blur(0px);">
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Organization",
      "@id": "https://flexibel.ae/#organization",
      "name": "Flexibel Expansion Joints",
      "url": "https://flexibel.ae/",
      "logo": {
        "@type": "ImageObject",
        "url": "https://flexibel.ae/public/front/images/flexi_header_logo.svg"
      },
      "contactPoint": [
        {
          "@type": "ContactPoint",
          "contactType": "Head Office",
          "telephone": "+971529037473",
          "email": "sales@flexibel.ae",
          "areaServed": "AE",
          "availableLanguage": "English"
        },
        {
          "@type": "ContactPoint",
          "contactType": "Sales Office",
          "telephone": "+97339463776",
          "email": "sales@flexibel.ae",
          "areaServed": "BH",
          "availableLanguage": "English"
        },
        {
          "@type": "ContactPoint",
          "contactType": "Sales Office",
          "telephone": "+97125506844",
          "email": "sales.adh@goldenharbour.ae",
          "areaServed": "AE",
          "availableLanguage": "English"
        }
      ]
    },
    {
      "@type": "ContactPage",
      "@id": "https://flexibel.ae/contact-us#webpage",
      "url": "https://flexibel.ae/contact-us",
      "name": "Contact Flexibel | Expansion Joint Manufacturer & Supplier in UAE",
      "headline": "Contact Flexibel",
      "description": "Get in touch with Flexibel for enquiries related to Metallic Expansion Joints, Rubber Expansion Joints, Fabric Expansion Joints, Expansion Bellows and Metallic Hoses. Contact our Dubai headquarters or regional sales offices.",
      "isPartOf": {
        "@id": "https://flexibel.ae/#website"
      },
      "about": {
        "@id": "https://flexibel.ae/#organization"
      },
      "primaryImageOfPage": {
        "@type": "ImageObject",
        "url": "https://flexibel.ae/public/front/images/banner_1_M.jpg"
      },
      "breadcrumb": {
        "@id": "https://flexibel.ae/contact-us#breadcrumb"
      },
      "inLanguage": "en"
    },
    {
      "@type": "BreadcrumbList",
      "@id": "https://flexibel.ae/contact-us#breadcrumb",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "https://flexibel.ae/"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "Contact Us",
          "item": "https://flexibel.ae/contact-us"
        }
      ]
    }
  ]
}
</script>

 <script>
window.addEventListener("load", function () {
    const shouldScroll = sessionStorage.getItem("scrollToContact");

    if (shouldScroll === "true") {
        const target = document.getElementById("contact-us");

        if (target) {
            const offset = 240; // ðŸ‘ˆ jitna upar se gap chahiye (navbar height)

            const elementPosition = target.getBoundingClientRect().top + window.pageYOffset;
            const offsetPosition = elementPosition - offset;

            window.scrollTo({
                top: offsetPosition,
                behavior: "smooth"
            });
        }

        sessionStorage.removeItem("scrollToContact");
    }
});
</script>

<script src="https://www.google.com/recaptcha/api.js?render=explicit" async defer></script>


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
    const contactField = document.getElementById('mobile');
    const contactError = document.getElementById('mobileError');

    const form = document.getElementById('contactform');
    const submitBtn = document.getElementById('submitBtn');

    const fullnameField = document.getElementById('fullname');
    const companyNameField = document.getElementById('company_name');
    const messageField = document.getElementById('message');
    const categoryField = document.getElementById('category_id');
    const captchaError = document.getElementById('recaptcha-error');

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
            showError('Please enter your email address.', emailError);
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

    function validateMobile() {
        const value = contactField.value.trim();
        clearError(contactError);
        const digitsOnly = value.replace(/\D/g, '');

        if (digitsOnly.length === 0) {
            showError('Please enter your contact number.', contactError);
            return false;
        }

        if (digitsOnly.length < 10 || digitsOnly.length > 15) {
            showError('Contact number must be between 10 and 15 digits.', contactError);
            return false;
        }

        return true;
    }

    function validateFullname() {
        const error = document.getElementById('fullnameError');
        const value = fullnameField.value.trim();
        clearError(error);
        if (!value) {
            showError('Please enter your fullname.', error);
            return false;
        }
        return true;
    }

    function validateCompanyName() {
        const error = document.getElementById('company_nameError');
        const value = companyNameField.value.trim();
        clearError(error);
        if (!value) {
            showError('Please enter your company name.', error);
            return false;
        }
        return true;
    }

    function validateMessage() {
        const error = document.getElementById('messageError');
        const value = messageField.value.trim();
        clearError(error);
        if (!value) {
            showError('Please enter your message.', error);
            return false;
        }
        return true;
    }
    
    function validateCategory(){
        const error = document.getElementById('categoryError');
        const value = categoryField.value.trim();
        clearError(error);
        if (!value) {
            showError('Please select Category.', error);
            return false;
        }
        return true;
    }

    function validateCaptcha() {
        const response = grecaptcha.getResponse();
        if (!response) {
            showError('Please verify the CAPTCHA.', captchaError);
            return false;
        }
        clearError(captchaError);
        return true;
    }

    function validateAll() {
        const a = validateFullname();
        const b = validateCompanyName();
        const c = validateEmail();
        const d = validateMobile();
        const e = validateMessage();
        const f = validateCaptcha();
        const g = validateCategory();
        return a && b && c && d && e && f && g;
    }

    form.addEventListener('submit', function (e) {
        if (!validateAll()) {
            e.preventDefault();
        } else {
            submitBtn.disabled = true;
            submitBtn.innerText = 'Submitting...';
        }
    });

    // Email: clear error on input, validate on blur
    emailField.addEventListener('input', () => clearError(emailError));
    emailField.addEventListener('blur', () => validateEmail());

    // Contact: clear error on input, validate on blur
    contactField.addEventListener('input', () => clearError(contactError));
    contactField.addEventListener('blur', () => validateMobile());

    // Optional: live validation for others
    [fullnameField, companyNameField, messageField].forEach(input => {
        input.addEventListener('input', validateAll);
    });

    // Recaptcha callback
    window.recaptchaCallback = function () {
        clearError(captchaError);
        return validateCaptcha();
    };
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    let source = localStorage.getItem('formSource');
    if (source) {
        document.getElementById('form_source').value = source;
        localStorage.removeItem('formSource');
    }
});
</script>

<style>
    small.text-danger {
        color: red;
        font-size: 14px;
        
    }
</style>

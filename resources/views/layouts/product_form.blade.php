<!-- product modal -->
<style>
    .required-star {
        color: red;
    }
</style>
<div class="modal fade" id="productModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productModalLabel">Product Enquiry</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-md-12 vacancie_form testimonial_form">
          <div class="stepper_wrapper">  
          
          <form id="productform" action="{{ route('product.enquiry.submit') }}" method="POST">
            @csrf
            
            <div class="row">
            <div style="display:none;">
                <input type="text" name="website_url" id="website_url" value="">
            </div>
              <!-- Name -->
              <div class="col-md-12 mb-3">
                <label>Name <span class="required-star">*</span></label>
                <input type="text" class="form-control" id="t_fullname" name="fullname" maxlength="50"
                    oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                    placeholder="Enter your name">
                <small id="t_fullnameError" class="text-danger"></small>
              </div>

              <!-- Company -->
              <div class="col-md-12 mb-3"> 
                <label>Company Name <span class="required-star">*</span></label>
                <input type="text" class="form-control" id="t_company" name="company_name" maxlength="50"
                    oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                    placeholder="Enter your company name">
                <small id="t_companyError" class="text-danger"></small>
              </div>

              <!-- Product Name (readonly so it submits) -->
              <div class="col-md-12 mb-3">
                <label>Product Name <span class="required-star">*</span></label>
                <input type="text" class="form-control" id="t_product" name="product_name" maxlength="50" readonly>
                <small id="t_productError" class="text-danger"></small>
              </div>

              <!-- Email -->
              <div class="col-md-12 mb-3">
                <label>Email Address <span class="required-star">*</span></label>
                <input type="email" id="t_email" name="email" class="form-control" maxlength="60" placeholder="Enter your email address">
                <small id="t_emailError" class="text-danger"></small>
              </div>

              <!-- Mobile -->
              <div class="col-md-12 mb-3">
                <label>Mobile Number <span class="required-star">*</span></label>
                <input type="text" class="form-control" id="t_mobile" name="mobile" minlength="10" maxlength="15" 
                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15);" 
                    placeholder="Enter your mobile number">
                <small id="t_mobileError" class="text-danger"></small>
              </div>

              <!-- Country -->
              <div class="col-md-12 mb-3">
                <label>Country</label>
                <select class="form-select" id="country-select" name="country">
                  <option value="">Select Country</option>
                </select>
              </div>

              <!-- Captcha -->
              <div class="form-group mb-3">
                {!! NoCaptcha::display(['data-callback' => 'recaptchaCallback']) !!}
                <small id="recaptcha-error" class="text-danger" style="display:none;">Captcha is required</small>
                @error('g-recaptcha-response')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>

              <!-- Submit Button -->
              <div class="col-md-3">
                <button type="submit" id="submitBtn" class="prod_btn mt-2">
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
        </div>
      </div>
    </div>
  </div>
</div>
<!-- product modal -->

<script src="https://www.google.com/recaptcha/api.js?render=explicit" async defer></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Extract product name from URL
    const urlPath = window.location.pathname;
    const productMatch = urlPath.match(/\/product\/([^\/]+)/);

    if (productMatch && productMatch[1]) {
        let productName = productMatch[1].replace(/-/g, ' ');
        productName = productName.replace(/\b\w/g, char => char.toUpperCase());

        const productField = document.getElementById("t_product");
        if (productField) {
            productField.value = productName; 
        }
    }
});
</script>

<script>
document.getElementById('productform').addEventListener('submit', function (e) {
    let isValid = true;
    const submitBtn = document.getElementById('submitBtn');

    // Disable button immediately to prevent multiple clicks
    submitBtn.disabled = true;
    submitBtn.innerHTML = 'Submitting...';

    // Name
    const fullname = document.getElementById('t_fullname');
    if (fullname.value.trim() === '') {
        document.getElementById('t_fullnameError').textContent = "Name is required";
        isValid = false;
    } else {
        document.getElementById('t_fullnameError').textContent = "";
    }

    // Company
    const company = document.getElementById('t_company');
    if (company.value.trim() === '') {
        document.getElementById('t_companyError').textContent = "Company name is required";
        isValid = false;
    } else {
        document.getElementById('t_companyError').textContent = "";
    }

    // Email
    const email = document.getElementById('t_email');
    const blockedDomains = [
        "mailinator.com", "tempmail.com", "10minutemail.com", "yopmail.com",
        "guerrillamail.com", "maildrop.cc", "dispostable.com", "trashmail.com"
    ];
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const emailValue = email.value.trim().toLowerCase();
    const domain = emailValue.split('@')[1] || '';

    if (!emailValue.match(emailPattern)) {
        document.getElementById('t_emailError').textContent = "Enter a valid email";
        isValid = false;
    } else if (blockedDomains.some(d => domain.includes(d))) {
        document.getElementById('t_emailError').textContent = "Disposable emails are not allowed";
        isValid = false;
    } else {
        document.getElementById('t_emailError').textContent = "";
    }

    // Mobile
    const mobile = document.getElementById('t_mobile');
    if (mobile.value.length < 10) {
        document.getElementById('t_mobileError').textContent = "Enter a valid mobile (10-15 digits)";
        isValid = false;
    } else {
        document.getElementById('t_mobileError').textContent = "";
    }

    // Captcha
    if (grecaptcha.getResponse().length === 0) {
        document.getElementById('recaptcha-error').style.display = 'block';
        isValid = false;
    } else {
        document.getElementById('recaptcha-error').style.display = 'none';
    }

    // If form is invalid, re-enable button
    if (!isValid) {
        e.preventDefault();
        submitBtn.disabled = false;
        submitBtn.innerHTML = `
            Submit
            <span class="svg ms-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">
                    <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </span>`;
    }
});
$(document).ready(function () {

    if (typeof $.fn.select2 === 'undefined') {
        console.error("❌ Select2 is not loaded.");
        return;
    }

    // Initialize Select2 FIRST
    const $select = $('#country-select').select2({
        theme: 'bootstrap-5',
        placeholder: 'Select Country',
        width: '100%',
        dropdownParent: $('#productform'), // IMPORTANT if inside modal/popup
        ajax: {
            url: '{{ route("get.countries") }}',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    term: params.term || ''
                };
            },
            processResults: function (data) {
                return {
                    results: data.results.map(function (item) {
                        return {
                            id: item.text,
                            text: item.text
                        };
                    })
                };
            },
            cache: true
        }
    });

    // Auto detect country
    $.get('https://ipapi.co/json/', function (location) {

        const detectedCountry = location.country_name;

        $.ajax({
            url: '{{ route("get.countries") }}',
            data: {
                exact: detectedCountry
            },
            success: function (data) {

                if (data.results.length > 0) {

                    const country = data.results[0];

                    // FIXED HERE
                    const newOption = new Option(
                        country.text,
                        country.text,
                        true,
                        true
                    );

                    $select.append(newOption).trigger('change');
                }
            }
        });

    });

});
</script>

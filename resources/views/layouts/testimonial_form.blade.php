
<!-- testimonial modal -->
<div class="modal fade" id="testimonialModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="testimonialModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="testimonialModalLabel">Know More About Us</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-md-12 vacancie_form testimonial_form">
          <div class="stepper_wrapper">  
          <form id="testimonialform" action="{{route('testimonial.submit')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div style="display:none;">
                    <input type="text" name="website_url" id="website_url" value="">
                </div>
              <div class="col-md-12 mb-lg-4 mb-md-3 mb-4">
                <label>Name *</label>
                <input type="text" class="form-control" id="t_fullname" name="fullname" maxlength="50"
                    oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                    placeholder="Enter your name">
                     <small id="t_fullnameError" class="text-danger"></small>
              </div>
              <div class="col-md-12 mb-lg-4 mb-md-3 mb-4">
                <label>Mobile Number *</label>
                <input type="text" class="form-control" id="t_mobile" name="mobile" minlength="10" maxlength="15" 
                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15);" pattern="\d{10,15}" title="Mobile number must be between 10 to 15 digits"
                    placeholder="Enter your mobile number">
                    <small id="t_mobileError" class="text-danger"></small>
              </div>
              <div class="col-md-12 mb-lg-4 mb-md-3 mb-4">
                <label>Email Address *</label>
                <input type="email" id="t_email" name="email" class="form-control" maxlength="60" placeholder="Enter your email address">
                <small id="t_emailError" class="text-danger"></small>
              </div>
                <div class="col-md-12 mb-lg-4 mb-md-3 mb-4">
                                <label>Country </label>
                                <select class="form-select" id="country-select" name="country">
                                  <option value="">Select Country</option>
                                </select>
                            </div>
              <div class="col-md-12 mb-lg-4 mb-md-3 mb-4">
                <label>Message *</label>
                <!--<textarea class="form-control" rows="4" id="t_message" name="message" maxlength="100" placeholder="Please share your experience with us"></textarea>-->
                <input type="text" class="form-control" rows="4" id="t_message" name="message" placeholder="Please share your experience with us">
                <small id="t_messageError" class="text-danger"></small>
              </div>
               <div class="form-group mb-4">
                                    {!! NoCaptcha::display([
    'data-callback' => 'verifyCallback',
    'data-expired-callback' => 'expireCallback',
    'data-error-callback' => 'errorCallback'
]) !!}
                                    <small id="t_recaptcha-error" class="text-danger"></small>
                                    @error('g-recaptcha-response')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
              <!--<div class="col-md-12 mb-lg-4 mb-md-3">-->
              <!--  <label>Captcha *</label>                -->
              <!--</div>-->
              <div class="col-lg-3">
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
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{!! NoCaptcha::renderJs() !!}
<!-- testimonial modal -->

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('testimonialform');

    let emailBlurred = false;
    let mobileBlurred = false;

    const emailInput = document.getElementById('t_email');
    const emailError = document.getElementById('t_emailError');

    const mobileInput = document.getElementById('t_mobile');
    const mobileError = document.getElementById('t_mobileError');

    const fullnameInput = document.getElementById('t_fullname');
    const fullnameError = document.getElementById('t_fullnameError');

    const messageInput = document.getElementById('t_message');
    const messageError = document.getElementById('t_messageError');

    const countrySelect = document.querySelector('#country-select');
    const countryError = document.getElementById('t_countryError');

    const disposableDomains = [
      'mailinator.com', '10minutemail.com', 'guerrillamail.com', 'tempmail.com',
      'temp-mail.org', 'throwawaymail.com', 'maildrop.cc', 'dispostable.com',
      'getairmail.com', 'moakt.com', 'spamgourmet.com', 'yopmail.com',
      'sharklasers.com', 'mailnesia.com', 'fakemail.net', 'emailondeck.com',
      'trashmail.com', 'mintemail.com', 'mytemp.email'
    ];

    function clearErrors() {
      document.querySelectorAll('.text-danger').forEach(el => el.textContent = '');
      document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
    }

    function validateField(id, errorId, message) {
      const value = document.getElementById(id).value.trim();
      const errorEl = document.getElementById(errorId);
      if (!value) {
        errorEl.textContent = message;
        return false;
      }
      errorEl.textContent = '';
      return true;
    }

    function validateMobile() {
      const mobile = mobileInput.value.trim().replace(/\D/g, '');
      if (!mobile) {
        mobileError.textContent = 'Please enter your mobile number';
        return false;
      }
      if (mobile.length < 10 || mobile.length > 15) {
        mobileError.textContent = 'Mobile number must be between 10 to 15 digits';
        return false;
      }
      mobileError.textContent = '';
      return true;
    }

    function validateEmail() {
      const email = emailInput.value.trim();
      if (!email) {
        emailError.textContent = 'Please enter your email address';
        return false;
      }
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        emailError.textContent = 'Please enter a valid email address';
        return false;
      }
      const domain = email.split('@')[1]?.toLowerCase();
      if (disposableDomains.includes(domain)) {
        emailError.textContent = 'Invalid email addresses are not allowed';
        return false;
      }
      emailError.textContent = '';
      return true;
    }

    function validateCountry() {
      if (!countrySelect || !countrySelect.value || countrySelect.value === "Select your country") {
        if (countryError) countryError.textContent = 'Please select your country';
        if (countrySelect) countrySelect.classList.add("is-invalid");
        return false;
      }
      if (countryError) countryError.textContent = '';
      if (countrySelect) countrySelect.classList.remove("is-invalid");
      return true;
    }

    function validateRecaptcha() {
      const token = grecaptcha.getResponse();
      const err = document.getElementById('t_recaptcha-error');
      if (!token) {
        err.textContent = 'Please verify that you are not a robot.';
        return false;
      }
      err.textContent = '';
      return true;
    }

    // reCAPTCHA callbacks
    window.verifyCallback = function (response) {
      if (response && response.length > 0) {
        document.getElementById('t_recaptcha-error').textContent = '';
      }
    };

    window.expireCallback = function () {
      document.getElementById('t_recaptcha-error').textContent = 'Captcha expired. Please verify again.';
    };

    window.errorCallback = function () {
      document.getElementById('t_recaptcha-error').textContent = 'Captcha error. Please reload and try again.';
    };

    if (form) {
      form.addEventListener('submit', function (e) {
        e.preventDefault();
        clearErrors();

        let valid = true;
        if (!validateField('t_fullname', 't_fullnameError', 'Please enter your full name')) valid = false;
        if (!validateMobile()) valid = false;
        if (!validateEmail()) valid = false;
        if (!validateCountry()) valid = false;
        if (!validateField('t_message', 't_messageError', 'Please enter your message')) valid = false;
        if (!validateRecaptcha()) valid = false;

        if (valid) {
          const submitBtn = form.querySelector('button[type="submit"]');
          if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerText = 'Submitting...';
          }
          form.submit();
        }
      });

      // Fullname: on input
      fullnameInput.addEventListener('input', () => {
        const value = fullnameInput.value.trim();
        fullnameError.textContent = value ? '' : 'Please enter your full name';
      });

      // Message: on input
      messageInput.addEventListener('input', () => {
        const value = messageInput.value.trim();
        messageError.textContent = value ? '' : 'Please enter your message';
      });

      // Mobile: blur and input logic
      mobileInput.addEventListener('blur', () => {
        mobileBlurred = true;
        validateMobile();
      });
      mobileInput.addEventListener('input', () => {
        if (!mobileBlurred) {
          mobileError.textContent = '';
        } else {
          validateMobile();
        }
      });

      // Email: blur and input logic
      emailInput.addEventListener('blur', () => {
        emailBlurred = true;
        validateEmail();
      });
      emailInput.addEventListener('input', () => {
        if (!emailBlurred) {
          emailError.textContent = '';
        } else {
          validateEmail();
        }
      });

      // Country: on change
      if (countrySelect) {
        countrySelect.addEventListener('change', validateCountry);
      }

      // Modal reset
      const modal = document.getElementById('testimonialModal');
      if (modal) {
        modal.addEventListener('shown.bs.modal', () => {
          clearErrors();
          form.reset();
          emailBlurred = false;
          mobileBlurred = false;
          if (typeof grecaptcha !== 'undefined') grecaptcha.reset();
        });
      }

      // Clear reCAPTCHA error on user input
      document.querySelectorAll('#testimonialform input, #testimonialform textarea, #testimonialform select').forEach(el => {
        el.addEventListener('input', () => {
          if (grecaptcha.getResponse().length > 0) {
            document.getElementById('t_recaptcha-error').textContent = '';
          }
        });
      });
    }
  });
</script>

<script>
$(document).ready(function () {
  if (typeof $.fn.select2 === 'undefined') {
    console.error("❌ Select2 is not loaded.");
    return;
  }

  const $select = $('#country-select');

  // Step 1: Detect user's country using IP
  $.get('https://ipapi.co/json/', function (location) {
    const detectedCountry = location.country_name;
    console.log("🌍 Detected Country:", detectedCountry);

    // Step 2: Set country if found in backend
    $.ajax({
      url: '{{ route("get.countries") }}',
      data: { exact: detectedCountry },
      success: function (data) {
        if (data.results.length > 0) {
          const country = data.results[0];
          const newOption = new Option(country.text, country.name, true, true);
          $select.append(newOption).trigger('change');
        }
      }
    });
  });

  // Step 3: Initialize Select2
  $select.select2({
    theme: 'bootstrap-5',
    placeholder: 'Select Country',
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
        return { results: data.results };
      },
      cache: true
    }
  });

  // Step 4: Trigger empty term search when opened
  $select.on('select2:open', function () {
    $('.select2-search__field').trigger('input');
  });
});
</script>

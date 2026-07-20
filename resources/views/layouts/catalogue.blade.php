<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Request for Latest Catalogue</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="col-md-12 vacancie_form">
                <div class="stepper_wrapper">
                    <!--<p>Fill out the form below with your details, and we’ll get back to you as soon as possible.</p>-->
                    <form id="catalogueform" action="{{route('catalogue.submit')}}" method="post" enctype="multipart/form-data">
                      @csrf
                    <div class="row">
                        <div style="display:none;">
                            <input type="text" name="website_url" id="website_url" value="">
                        </div>
                        <div class="col-md-12 mb-lg-5 mb-md-3 mb-4">
                            <label>Full Name * </label>
                            <input type="text"  id="c_fullname" name="fullname" maxlength="50"
                                oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                                class="form-control" placeholder="Enter your full name">
                            <small id="c_fullnameError" class="text-danger"></small>
                        </div>
                        <div class="col-md-12 mb-md-5 mb-md-3 mb-4">
                            <label>Company Name * </label>
                            <input type="text" id="c_company_name" name="company_name" maxlength="50"
                                oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                                class="form-control" placeholder="Enter your company name">
                            <small id="c_company_nameError" class="text-danger"></small>
                        </div>
                        <div class="col-md-12 mb-lg-5 mb-md-3 mb-4">
                            <label>Contact Number *</label>
                            <input type="text" id="c_phone" name="phone" minlength="10" maxlength="15" 
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15);"
                                class="form-control" placeholder="Enter your contact number" pattern="\d{10,15}" title="Contact number must be between 10 to 15 digits">
                             <small id="c_phoneError" class="text-danger"></small>
                        </div>
                        <div class="col-md-12 mb-lg-5 mb-md-3 mb-4">
                            <label>Email Address*</label>
                            <input type="email" id="c_email" name="email" maxlength="50" class="form-control" placeholder="Enter your email ID">
                            <small id="c_emailError" class="text-danger"></small>
                        </div>
                        <div class="col-md-12 mb-lg-5 mb-md-3 mb-4">
                            <label>Message *</label>
                            <input type="text" id="c_message" name="message" class="form-control" placeholder="Enter your message">
                            <small id="c_messageError" class="text-danger"></small>
                        </div>
                        <!--<div class="col-md-12 mb-lg-5 mb-md-3">-->
                        <!--    <label for="uploadResume">Upload Resume *:</label>-->
                        <!--    <label class="custom-file-upload">-->
                        <!--        <input type="file" id="c_resume" name="resume" accept=".pdf,.doc,.docx ,.svg, .png">-->
                        <!--        <p>Attach Your Resume In PDF, Word Format</p>-->
                        <!--        <p><small>Max Size: 5 Mb</small></p>-->
                                
                        <!--    </label>-->
                        <!--    <small id="c_resumeError" class="text-danger"></small>-->
                        <!--</div>-->
                        <!-- <div class="col-md-12 mb-lg-5 mb-md-3">
                            <label>Captcha *</label>
                            <input type="text" class="form-control" placeholder="Enter captcha code">
                        </div> -->
                        <div class="form-group mb-4">
                            <div id="c_recaptcha" style="display: none;"></div>
                            <small id="c_recaptcha_error" class="text-danger"></small>
                            @error('g-recaptcha-response')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-3">
                            <button type="submit" id="submit" class="prod_btn">
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
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
    </div>
  </div>
</div>

<script src="https://www.google.com/recaptcha/api.js?onload=onRecaptchaLoadCallback&render=explicit" defer></script>

<script>
// Global callback so reCAPTCHA can find it
function onRecaptchaLoadCallback() {
  const form = document.getElementById('catalogueform');
  const fieldConfigs = {
    c_fullname: 'Please enter your full name',
    c_company_name: 'Please enter your company name',
    c_phone: 'Please enter your contact number',
    c_email: 'Please enter your email address',
    c_message: 'Please enter your message'
  };

  let captchaRendered = false;
  let captchaWidgetId = null;

  let phoneBlurred = false;
  let emailBlurred = false;

  // Attach input listeners to trigger validation and reCAPTCHA rendering
  Object.keys(fieldConfigs).forEach(id => {
    const input = document.getElementById(id);
    if (input) {
      // For c_phone and c_email, use blur logic
      if (id === 'c_phone') {
        input.addEventListener('input', () => {
          if (!phoneBlurred) {
            document.getElementById(id + 'Error').textContent = '';
          } else {
            validateField(id, fieldConfigs[id]);
          }
        });
        input.addEventListener('blur', () => {
          if (!phoneBlurred) phoneBlurred = true;
          validateField(id, fieldConfigs[id]);
        });
      } else if (id === 'c_email') {
        input.addEventListener('input', () => {
          if (!emailBlurred) {
            document.getElementById(id + 'Error').textContent = '';
          } else {
            validateField(id, fieldConfigs[id]);
          }
        });
        input.addEventListener('blur', () => {
          if (!emailBlurred) emailBlurred = true;
          validateField(id, fieldConfigs[id]);
        });
      } else {
        // For other fields, validate directly on input
        input.addEventListener('input', () => {
          validateField(id, fieldConfigs[id]);
        });
      }

      // Trigger reCAPTCHA render
      input.addEventListener('input', () => {
        if (!captchaRendered && input.value.trim() !== '') {
          captchaWidgetId = grecaptcha.render('c_recaptcha', {
            sitekey: '{{ config("captcha.sitekey") }}',
            callback: function () {
              document.getElementById('c_recaptcha_error').textContent = '';
            }
          });
          document.getElementById('c_recaptcha').style.display = 'block';
          captchaRendered = true;
        }
      });
    }
  });

  // Clear all error messages
  function clearErrors() {
    document.querySelectorAll('.text-danger').forEach(el => el.textContent = '');
  }

  // Validate each field
  function validateField(id, message) {
    const el = document.getElementById(id);
    const errorEl = document.getElementById(id + 'Error');
    const value = el.value.trim();

    if (!value) {
      errorEl.textContent = message;
      return false;
    }

    if (id === 'c_phone' && !/^\d{10,15}$/.test(value)) {
      errorEl.textContent = 'Contact number must be between 10 to 15 digits';
      return false;
    }

    if (id === 'c_email') {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(value)) {
        errorEl.textContent = 'Please enter a valid email address';
        return false;
      }
    }

    errorEl.textContent = '';
    return true;
  }

  // Validate reCAPTCHA
  function validateRecaptcha() {
    const response = captchaRendered ? grecaptcha.getResponse(captchaWidgetId) : '';
    const errorEl = document.getElementById('c_recaptcha_error');
    if (captchaRendered && !response) {
      errorEl.textContent = 'Please verify that you are not a robot.';
      return false;
    }
    errorEl.textContent = '';
    return true;
  }

  // Form submit handling
  if (form) {
    form.addEventListener('submit', function (e) {
      clearErrors();
      let valid = true;

      Object.keys(fieldConfigs).forEach(id => {
        if (!validateField(id, fieldConfigs[id])) valid = false;
      });

      if (!validateRecaptcha()) valid = false;

      if (!valid) {
        e.preventDefault();
      } else {
        const submitButton = form.querySelector('button[type="submit"]');
        if (submitButton) {
          submitButton.disabled = true;
          submitButton.innerText = 'Submitting...';
        }
        //  window.open('{{ asset("public/catalogues/flexibel_expansion_joints_brochure.pdf") }}', '_blank');
      }
    });
  }
}
</script>

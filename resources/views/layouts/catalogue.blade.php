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
                    <form id="catalogueform" action="{{ route('catalogue.submit') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <!-- Honeypot: must remain empty -->
                            <div style="position:absolute; left:-9999px; opacity:0; height:0; overflow:hidden;">
                                <input type="text"
                                      name="website_url"
                                      id="website_url"
                                      value=""
                                      tabindex="-1"
                                      autocomplete="off"
                                      aria-hidden="true">
                            </div>

                            <!-- Full Name -->
                            <div class="col-md-12 mb-lg-5 mb-md-3 mb-4">
                                <label>Full Name *</label>
                                <input type="text"
                                      id="c_fullname"
                                      name="fullname"
                                      maxlength="50"
                                      minlength="2"
                                      autocomplete="name"
                                      oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                                      class="form-control"
                                      placeholder="Enter your full name">
                                <small id="c_fullnameError" class="text-danger"></small>
                            </div>

                            <!-- Company Name -->
                            <div class="col-md-12 mb-md-5 mb-md-3 mb-4">
                                <label>Company Name *</label>
                                <input type="text"
                                      id="c_company_name"
                                      name="company_name"
                                      maxlength="50"
                                      oninput="this.value = this.value.replace(/[^a-zA-Z0-9\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                                      class="form-control"
                                      placeholder="Enter your company name">
                                <small id="c_company_nameError" class="text-danger"></small>
                            </div>

                            <!-- Contact Number -->
                            <div class="col-md-12 mb-lg-5 mb-md-3 mb-4">
                                <label>Contact Number *</label>
                                <input type="tel"
                                      id="c_phone"
                                      name="phone"
                                      minlength="10"
                                      maxlength="15"
                                      inputmode="numeric"
                                      pattern="[0-9]{10,15}"
                                      oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15);"
                                      class="form-control"
                                      placeholder="Enter your contact number">
                                <small id="c_phoneError" class="text-danger"></small>
                            </div>

                            <!-- Email -->
                            <div class="col-md-12 mb-lg-5 mb-md-3 mb-4">
                                <label>Email Address *</label>
                                <input type="email"
                                      id="c_email"
                                      name="email"
                                      maxlength="50"
                                      autocomplete="email"
                                      class="form-control"
                                      placeholder="Enter your email ID">
                                <small id="c_emailError" class="text-danger"></small>
                            </div>

                            <!-- Message -->
                            <div class="col-md-12 mb-lg-5 mb-md-3 mb-4">
                                <label>Message *</label>
                                <textarea id="c_message"
                                          name="message"
                                          maxlength="1000"
                                          class="form-control"
                                          placeholder="Enter your message"></textarea>
                                <small id="c_messageError" class="text-danger"></small>
                            </div>

                            <!-- reCAPTCHA -->
                            <div class="form-group mb-4">
                                <div id="c_recaptcha" style="display:none;"></div>
                                <small id="c_recaptcha_error" class="text-danger"></small>

                                @error('g-recaptcha-response')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Submit -->
                            <div class="col-lg-3">
                                <button type="submit" id="catalogueSubmitBtn" class="prod_btn">
                                    Submit
                                    <span class="svg ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            width="13" height="14" viewBox="0 0 13 14" fill="none">
                                            <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091"
                                                  stroke="white"
                                                  stroke-width="2"
                                                  stroke-linecap="round"
                                                  stroke-linejoin="round"></path>
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
let catalogueCaptchaRendered = false;
let catalogueCaptchaWidgetId = null;
let catalogueCaptchaRendering = false;

function onRecaptchaLoadCallback() {
    // Render CAPTCHA later when required.
    // Form validation is registered independently below.
}

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('catalogueform');

    if (!form) return;

    const fieldConfigs = {
        c_fullname: 'Please enter your full name',
        c_company_name: 'Please enter your company name',
        c_phone: 'Please enter your contact number',
        c_email: 'Please enter your email address',
        c_message: 'Please enter your message'
    };

    let phoneBlurred = false;
    let emailBlurred = false;
    let submitAttempted = false;

    function showError(id, message) {
        const error = document.getElementById(id + 'Error');
        if (error) error.textContent = message;
    }

    function clearError(id) {
        showError(id, '');
    }

    function validateField(id, message) {
        const input = document.getElementById(id);
        if (!input) return true;

        const value = input.value.trim();

        if (!value) {
            showError(id, message);
            return false;
        }

        if (id === 'c_fullname') {
            if (value.length < 2 || value.length > 50) {
                showError(id, 'Name must be between 2 and 50 characters.');
                return false;
            }

            if (!/^[a-zA-Z]+(?:\s[a-zA-Z]+)*$/.test(value)) {
                showError(id, 'Please enter a valid name using letters only.');
                return false;
            }
        }

        if (id === 'c_company_name') {
            if (value.length > 50) {
                showError(id, 'Company name cannot exceed 50 characters.');
                return false;
            }

            if (!/^[a-zA-Z0-9]+(?:\s[a-zA-Z0-9]+)*$/.test(value)) {
                showError(id, 'Please enter a valid company name.');
                return false;
            }
        }

        if (id === 'c_phone') {
            if (!/^[0-9]{10,15}$/.test(value)) {
                showError(id, 'Contact number must contain 10 to 15 digits.');
                return false;
            }
        }

        if (id === 'c_email') {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (value.length > 50 || !emailRegex.test(value)) {
                showError(id, 'Please enter a valid email address.');
                return false;
            }
        }

        if (id === 'c_message' && value.length > 1000) {
            showError(id, 'Message cannot exceed 1000 characters.');
            return false;
        }

        clearError(id);
        return true;
    }

    function renderCatalogueCaptcha() {
        if (catalogueCaptchaRendered ||
            catalogueCaptchaRendering ||
            typeof grecaptcha === 'undefined') {
            return;
        }

        catalogueCaptchaRendering = true;

        try {
            catalogueCaptchaWidgetId = grecaptcha.render('c_recaptcha', {
                sitekey: '{{ config("captcha.sitekey") }}',
                callback: function () {
                    document.getElementById('c_recaptcha_error').textContent = '';
                },
                'expired-callback': function () {
                    document.getElementById('c_recaptcha_error').textContent =
                        'CAPTCHA expired. Please verify again.';
                }
            });

            catalogueCaptchaRendered = true;
            document.getElementById('c_recaptcha').style.display = 'block';
        } catch (error) {
            console.error('Catalogue CAPTCHA rendering failed:', error);
        } finally {
            catalogueCaptchaRendering = false;
        }
    }

    function validateRecaptcha() {
        const error = document.getElementById('c_recaptcha_error');

        if (!catalogueCaptchaRendered ||
            typeof grecaptcha === 'undefined' ||
            !grecaptcha.getResponse(catalogueCaptchaWidgetId)) {

            error.textContent = 'Please verify that you are not a robot.';
            renderCatalogueCaptcha();
            return false;
        }

        error.textContent = '';
        return true;
    }

    Object.keys(fieldConfigs).forEach(function (id) {
        const input = document.getElementById(id);
        if (!input) return;

        input.addEventListener('input', function () {
            if (id === 'c_phone') phoneBlurred = true;
            if (id === 'c_email') emailBlurred = true;

            if (submitAttempted ||
                (id === 'c_phone' && phoneBlurred) ||
                (id === 'c_email' && emailBlurred) ||
                (id !== 'c_phone' && id !== 'c_email')) {
                validateField(id, fieldConfigs[id]);
            }

            if (input.value.trim() !== '') {
                renderCatalogueCaptcha();
            }
        });

        input.addEventListener('blur', function () {
            if (id === 'c_phone') phoneBlurred = true;
            if (id === 'c_email') emailBlurred = true;

            validateField(id, fieldConfigs[id]);
        });
    });

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        submitAttempted = true;

        let valid = true;

        Object.keys(fieldConfigs).forEach(function (id) {
            if (!validateField(id, fieldConfigs[id])) {
                valid = false;
            }
        });

        if (!validateRecaptcha()) {
            valid = false;
        }

        if (!valid) return;

        const button = form.querySelector('button[type="submit"]');

        if (button) {
            button.disabled = true;
            button.innerText = 'Submitting...';
        }

        // Native submission bypasses this JavaScript submit handler.
        form.submit();
    });
});
</script>
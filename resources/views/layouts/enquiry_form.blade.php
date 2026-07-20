<!-- product modal -->
<style>
.required-star { color: red; }

.invalid-feedback {
    display: block;
    font-size: 13px;
}
</style>

<div class="modal fade" id="enquiryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Enquiry</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <div class="col-md-12 vacancie_form testimonial_form">
            <div class="stepper_wrapper">  
          
                <form id="inquiryform" action="{{ route('contact.submit') }}" method="POST">
              @csrf
    
              <input type="hidden" name="form_source" value="Popup Inquiry">
    
              <!-- NAME -->
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label>Name <span class="required-star">*</span></label>
                  <input type="text" class="form-control" name="fullname" id="con_fullname"
                    placeholder="Enter your name">
                </div>
    
                <!-- COMPANY -->
                <div class="col-md-6 mb-3">
                  <label>Company Name <span class="required-star">*</span></label>
                  <input type="text" class="form-control" name="company_name" id="c_company"
                    placeholder="Enter company name">
                </div>
    
                <!-- MOBILE -->
                <div class="col-md-6 mb-3">
                  <label>Mobile <span class="required-star">*</span></label>
                  <input type="text" class="form-control" name="mobile" id="c_mobile"
                    placeholder="Enter mobile">
                </div>
    
                <!-- EMAIL -->
                <div class="col-md-6 mb-3">
                  <label>Email <span class="required-star">*</span></label>
                  <input type="email" class="form-control" name="email" id="con_email"
                    placeholder="Enter email">
                </div>
    
                <!-- CATEGORY -->
                <div class="col-md-6 mb-3">
                  <label>Requirement Type <span class="required-star">*</span></label>
    
                  @php
                    $productCategories = App\Models\ProductCategory::whereNull('deleted_at')->get();
                  @endphp
    
                  <select class="form-control" name="category_id" id="c_category">
                    <option value="">Choose Your Requirement</option>
                    @foreach($productCategories as $val)
                      <option value="{{ $val->id }}">{{ $val->name }}</option>
                    @endforeach
                    <option value="Service Related">Services Related</option>
                    <option value="Others">Others</option>
                  </select>
                </div>
    
                <!-- MESSAGE -->
                <div class="col-md-6 mb-3">
                  <label>Message</label>
                  <input type="text" class="form-control" name="message" id="message">
                </div>
    
                <!-- CAPTCHA -->
                <div class="col-md-12 mb-3">
                  {!! NoCaptcha::display(['data-callback' => 'verifyEnquiryCaptcha']) !!}
                </div>
    
                <input type="hidden" name="hiddenRecaptcha" id="hiddenRecaptcha">
    
                <!-- BUTTON -->
                <div class="col-md-12">
                  <button type="submit" id="con_submitBtn" class="prod_btn">
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
      </div>
    </div>
  </div>
</div>

<!-- jQuery + Validate plugin required -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.21.0/dist/jquery.validate.min.js"></script>
<!-- Optional additional methods -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.21.0/dist/additional-methods.min.js"></script>

<script>
let enquiryFormSubmitted = false;

function verifyEnquiryCaptcha(response) {
    $("#hiddenRecaptcha").val(response);
}

$(document).ready(function () {

    $("#inquiryform").validate({

        ignore: [],

        rules: {
            fullname: {
                required: true,
                minlength: 2
            },
            company_name: {
                required: true
            },
            mobile: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 15
            },
            email: {
                required: true,
                email: true
            },
            category_id: {
                required: true
            },
            hiddenRecaptcha: {
                required: true
            }
        },

        messages: {
            fullname: "Name is required",
            company_name: "Company is required",
            mobile: "Valid mobile required",
            email: "Valid email required",
            category_id: "Category required",
            hiddenRecaptcha: "Please verify captcha"
        },

        errorElement: "div",
        errorClass: "invalid-feedback",

        highlight: function (el) {
            $(el).addClass("is-invalid");
        },

        unhighlight: function (el) {
            $(el).removeClass("is-invalid");
        },

        submitHandler: function (form) {

            if (enquiryFormSubmitted) return false;

            enquiryFormSubmitted = true;

            $("#con_submitBtn")
                .prop("disabled", true)
                .text("Submitting...");

            form.submit();
        }
    });

});
</script>
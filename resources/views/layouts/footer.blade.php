<footer class="mt-100">
    <div class="container-fluid">
        <div class="">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-12 mb-lg-0 mb-5">
                    <div class="footer-logo mb-3">
                        <img src="{{asset('public/front/images\ft_logo.png')}}" alt="Flexibel Expansion Joints Logo">
                    </div>
                    <p class="mt-md-4 mb-md-5">Since 2012, Flexibel has been delivering advanced expansion solutions under the legacy of Al Mufaddal Group. With decades of expertise, modern facilities, and a vision built on durability and precision, we ensure reliable performance and trusted quality across industries.</p>
                    <!--<div class="mt-lg-4">-->
                    <!--    <p class="mb-2">A part of</p>-->
                    <!--    <div class="d-flex gap-3">-->
                    <!--        <img src="{{asset('public/front/images/ft_ag.png')}}" alt="almufaddal group">-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-6 ps-xl-4 mb-lg-0 mb-4">
                    <h4 class="ft_head">LINKS</h4>
                    <ul class="ft_list">
                        <li><a href="{{route('dashboard')}}">Home</a></li>
                        <li><a href="{{route('about')}}">About</a></li>
                        <li><a href="{{route('industries')}}">Industries</a></li>
                        <!--<li><a href="{{route('quality')}}">Quality</a></li>-->
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">E-Catalogue</a></li>
                        <li><a href="{{route('certificate')}}">Certifications</a></li>
                        <li><a href="{{route('contact-us')}}" onclick="setScrollFlag()">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-6 ps-xl-4 mb-lg-0 mb-4">
                    <h4 class="ft_head">Resources</h4>
                    <ul class="ft_list">
                        <li><a href="{{route('case-studies')}}">Case Studies</a></li>
                        <li><a href="{{route('blog')}}">Blogs</a></li>
                        <!--<li><a href="{{route('datasheets')}}">Datasheets</a></li>-->
                        <!--<li><a href="#">Gallery</a></li>-->
                        <li><a href="{{route('faq')}}">FAQ</a></li>
                    </ul>
                    <div class="d-none d-md-block">
                        <h4 class="ft_head mt-4 mt-md-5">services</h4>
                        <ul class="ft_list">
                            <li><a href="{{route('premium-service')}}">Engineering & Design</a></li>
                            <li><a href="{{route('Inspection-services')}}">Inspection & QA</a></li>
                            <li><a href="{{route('design-calculation')}}">Comprehensive Audit</a></li>
                            <li><a href="{{route('logistics')}}">Field Services & Repair</a></li>
                            <li><a href="{{route('emergency-services')}}">Emergency & Turnaround Support</a></li>
                        </ul>
                    </div>
                    <div class="d-md-none">
                        <h4 class="ft_head mt-4 mt-md-5">Career</h4>
                        <ul class="ft_list">
                        <!--<li><a href="./life_at_flexibellows.php">Life at Flexibellows</a></li>-->
                        <li><a href="{{ route('current.vacancies') }}">Current Vacancies</a></li>
                        </ul>
                    </div>

                </div>
                 @php
                    use App\Models\ProductCategory;

                    $categories = ProductCategory::whereHas('products', function ($query) {
                            $query->whereNull('deleted_at');
                        })
                        ->with(['products' => function ($query) {
                            $query->whereNull('deleted_at')->orderBy('id', 'asc');
                        }])->orderBy('id', 'asc')->get();

                @endphp
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 ">
                    <div class="d-md-none mb-4">
                        <h4 class="ft_head mt-4 mt-md-5">services</h4>
                        <ul class="ft_list">
                            <li><a href="{{route('premium-service')}}">Engineering & Design</a></li>
                            <li><a href="{{route('Inspection-services')}}">Inspection & QA</a></li>
                            <li><a href="{{route('design-calculation')}}">Comprehensive Audit</a></li>
                            <li><a href="{{route('logistics')}}">Field Services & Repair</a></li>
                            <li><a href="{{route('emergency-services')}}">Emergency & Turnaround Support</a></li>
                        </ul>
                    </div>
                    <h4 class="ft_head">PRODUCTS</h4>
                    <!-- backup for catgory list -->
                    <!--<ul class="ft_list">-->
                    <!--    @forelse ($categories as $category)-->
                    <!--        <li>-->
                    <!--            <a href="{{ route('products.by.category',['category' => $category->url]) }}">{{ $category->name }}</a>-->
                    <!--        </li>-->
                    <!--    @empty-->
                    <!--        <p></p>-->
                    <!--    @endforelse                        -->
                    <!--</ul>-->

                    <ul class="ft_list">

                            @forelse ($categories as $category)
                                @php
                                    $productCount = $category->products->count();
                                @endphp

                                @if ($productCount === 1)
                                    {{-- If only one product, go directly to product-detail --}}
                                    @php
                                        $singleProduct = $category->products->first();
                                    @endphp
                                    <li>
                                        <a href="{{ route('product-detail', [

                                            'url' => $singleProduct->url
                                        ]) }}">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @elseif($productCount > 1)
                                    {{-- If multiple products, go to category page --}}
                                    <li>
                                        <a href="{{ route('products.by.category', ['category' => $category->url]) }}">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endif
                            @empty
                                <li><span>No categories available</span></li>
                            @endforelse


                    </ul>
                    <div class="d-none d-md-block">
                        <h4 class="ft_head mt-4 mt-md-5">Career</h4>
                        <ul class="ft_list">
                        <!--<li><a href="./life_at_flexibellows.php">Life at Flexibellows</a></li>-->
                        <li><a href="{{ route('current.vacancies') }}">Current Vacancies</a></li>
                        </ul>
                    </div>
                    <h4 class="ft_head mt-4 mt-md-5">Contact</h4>
                    <ul class="ft_list">
                        <li><a href="tel:+971 529037473"><b>M: </b>+971 529037473</a></li>
                        <li><a href="mailto:sales@flexibel.ae"><b>E: </b>sales@flexibel.ae</a></li>
                    </ul>
                </div>

            </div>
            <div class="ym_cpy">
                <div class="terms">
                    <a href="{{route('privacy-policy')}}">Privacy Policy</a>
                    <a>|</a>
                    <a href="{{route('terms-condition')}}">Terms & Conditions</a>
                </div>
                <div class="social_links">
                    <a href="https://www.linkedin.com/company/flexibel-expansion-joints/" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M22.2234 0H1.77187C0.792187 0 0 0.773438 0 1.72969V22.2656C0 23.2219 0.792187 24 1.77187 24H22.2234C23.2031 24 24 23.2219 24 22.2703V1.72969C24 0.773438 23.2031 0 22.2234 0ZM7.12031 20.4516H3.55781V8.99531H7.12031V20.4516ZM5.33906 7.43437C4.19531 7.43437 3.27187 6.51094 3.27187 5.37187C3.27187 4.23281 4.19531 3.30937 5.33906 3.30937C6.47812 3.30937 7.40156 4.23281 7.40156 5.37187C7.40156 6.50625 6.47812 7.43437 5.33906 7.43437ZM20.4516 20.4516H16.8937V14.8828C16.8937 13.5562 16.8703 11.8453 15.0422 11.8453C13.1906 11.8453 12.9094 13.2937 12.9094 14.7891V20.4516H9.35625V8.99531H12.7687V10.5609H12.8156C13.2891 9.66094 14.4516 8.70937 16.1813 8.70937C19.7859 8.70937 20.4516 11.0812 20.4516 14.1656V20.4516V20.4516Z"
                                fill="#CFE5FF" />
                        </svg>
                    </a>
                    <a href="https://x.com/flexibellows" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_753_3863)">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15.9455 23L10.396 15.0901L3.44886 23H0.509766L9.09209 13.2311L0.509766 1H8.05571L13.286 8.45502L19.8393 1H22.7784L14.5943 10.3165L23.4914 23H15.9455ZM19.2185 20.77H17.2397L4.71811 3.23H6.6971L11.7121 10.2532L12.5793 11.4719L19.2185 20.77Z"
                                    fill="#CFE5FF" />
                            </g>
                            <defs>
                                <clipPath id="clip0_753_3863">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                    <a href="https://www.facebook.com/flexibelexpansionjoints/" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_753_3864)">
                                <path
                                    d="M24 12C24 5.37258 18.6274 0 12 0C5.37258 0 0 5.37258 0 12C0 17.9895 4.3882 22.954 10.125 23.8542V15.4687H7.07812V12H10.125V9.35625C10.125 6.34875 11.9166 4.6875 14.6576 4.6875C15.9701 4.6875 17.3437 4.92187 17.3437 4.92187V7.875H15.8306C14.34 7.875 13.875 8.80008 13.875 9.75V12H17.2031L16.6711 15.4687H13.875V23.8542C19.6118 22.954 24 17.9895 24 12Z"
                                    fill="#CFE5FF" />
                            </g>
                            <defs>
                                <clipPath id="clip0_753_3864">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/flexibel.ae/" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M12 2.16094C15.2063 2.16094 15.5859 2.175 16.8469 2.23125C18.0188 2.28281 18.6516 2.47969 19.0734 2.64375C19.6312 2.85938 20.0344 3.12187 20.4516 3.53906C20.8734 3.96094 21.1312 4.35937 21.3469 4.91719C21.5109 5.33906 21.7078 5.97656 21.7594 7.14375C21.8156 8.40937 21.8297 8.78906 21.8297 11.9906C21.8297 15.1969 21.8156 15.5766 21.7594 16.8375C21.7078 18.0094 21.5109 18.6422 21.3469 19.0641C21.1312 19.6219 20.8687 20.025 20.4516 20.4422C20.0297 20.8641 19.6312 21.1219 19.0734 21.3375C18.6516 21.5016 18.0141 21.6984 16.8469 21.75C15.5813 21.8062 15.2016 21.8203 12 21.8203C8.79375 21.8203 8.41406 21.8062 7.15313 21.75C5.98125 21.6984 5.34844 21.5016 4.92656 21.3375C4.36875 21.1219 3.96562 20.8594 3.54844 20.4422C3.12656 20.0203 2.86875 19.6219 2.65312 19.0641C2.48906 18.6422 2.29219 18.0047 2.24063 16.8375C2.18438 15.5719 2.17031 15.1922 2.17031 11.9906C2.17031 8.78437 2.18438 8.40469 2.24063 7.14375C2.29219 5.97187 2.48906 5.33906 2.65312 4.91719C2.86875 4.35937 3.13125 3.95625 3.54844 3.53906C3.97031 3.11719 4.36875 2.85938 4.92656 2.64375C5.34844 2.47969 5.98594 2.28281 7.15313 2.23125C8.41406 2.175 8.79375 2.16094 12 2.16094ZM12 0C8.74219 0 8.33438 0.0140625 7.05469 0.0703125C5.77969 0.126562 4.90312 0.332812 4.14375 0.628125C3.35156 0.9375 2.68125 1.34531 2.01563 2.01562C1.34531 2.68125 0.9375 3.35156 0.628125 4.13906C0.332812 4.90313 0.126563 5.775 0.0703125 7.05C0.0140625 8.33437 0 8.74219 0 12C0 15.2578 0.0140625 15.6656 0.0703125 16.9453C0.126563 18.2203 0.332812 19.0969 0.628125 19.8562C0.9375 20.6484 1.34531 21.3187 2.01563 21.9844C2.68125 22.65 3.35156 23.0625 4.13906 23.3672C4.90313 23.6625 5.775 23.8687 7.05 23.925C8.32969 23.9812 8.7375 23.9953 11.9953 23.9953C15.2531 23.9953 15.6609 23.9812 16.9406 23.925C18.2156 23.8687 19.0922 23.6625 19.8516 23.3672C20.6391 23.0625 21.3094 22.65 21.975 21.9844C22.6406 21.3187 23.0531 20.6484 23.3578 19.8609C23.6531 19.0969 23.8594 18.225 23.9156 16.95C23.9719 15.6703 23.9859 15.2625 23.9859 12.0047C23.9859 8.74688 23.9719 8.33906 23.9156 7.05937C23.8594 5.78437 23.6531 4.90781 23.3578 4.14844C23.0625 3.35156 22.6547 2.68125 21.9844 2.01562C21.3188 1.35 20.6484 0.9375 19.8609 0.632812C19.0969 0.3375 18.225 0.13125 16.95 0.075C15.6656 0.0140625 15.2578 0 12 0Z"
                                fill="#CFE5FF" />
                            <path
                                d="M12 5.83594C8.59688 5.83594 5.83594 8.59688 5.83594 12C5.83594 15.4031 8.59688 18.1641 12 18.1641C15.4031 18.1641 18.1641 15.4031 18.1641 12C18.1641 8.59688 15.4031 5.83594 12 5.83594ZM12 15.9984C9.79219 15.9984 8.00156 14.2078 8.00156 12C8.00156 9.79219 9.79219 8.00156 12 8.00156C14.2078 8.00156 15.9984 9.79219 15.9984 12C15.9984 14.2078 14.2078 15.9984 12 15.9984Z"
                                fill="#CFE5FF" />
                            <path
                                d="M19.8469 5.59238C19.8469 6.38926 19.2 7.03145 18.4078 7.03145C17.6109 7.03145 16.9688 6.38457 16.9688 5.59238C16.9688 4.79551 17.6156 4.15332 18.4078 4.15332C19.2 4.15332 19.8469 4.8002 19.8469 5.59238Z"
                                fill="#CFE5FF" />
                        </svg>
                    </a>
                </div>
                <div class="">© <?php echo date('Y'); ?> Flexibel LLC. All Rights Reserved.
                </div>
            </div>
                </div>
        </div>
    </div>
</footer>
 @include('layouts.catalogue')
<!--<a href="https://api.whatsapp.com/send?phone=971529037473&text=Hello,%20I%27m%20visiting%20your%20website%20and%20would%20like%20to%20know%20more" class="whatsapp-float" target="_blank">-->
<!--    <img src="{{ asset('public/front/images/WhatsApp.svg') }}" alt="WhatsApp" class="bottom-whatsapp">-->
<!--</a>-->

<div class="float-buttons">
    <div class="WhatsAppButton" bis_skin_checked="1">
        <a href="https://api.whatsapp.com/send?phone=971529037473&text=Hello,%20I%27m%20visiting%20your%20website%20and%20would%20like%20to%20know%20more" id="whatsapp" aria-label="WhatsApp +971 4 226 4582" rel="nofollow" target="_blank">
            <i class="fab fa-whatsapp"></i>
            <span>WhatsApp<br><small>+971 5 2903 7473</small></span>
         </a>
    </div>

</div>

@include('layouts.enquiry_form')
<a href="javascript:void(0)" class="enquire_btn" data-bs-toggle="modal" data-bs-target="#enquiryModal">Enquiry Now</a>

<style>
   .enquire_btn {
    position: fixed;
    right: 0;
    top: 80%;
    transform: rotate(90deg);
    transform-origin: right top;
    background: var(--wb-red);
    color: #fff;
    padding: 12px 20px;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    border-radius: 0 0 6px 6px;
    z-index: 9999;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    transition: 0.3s;
}

.enquire_btn:hover {
  right: 5px;
  background: darkred;
}
</style>

<!--<style>-->
      <!--/* ===== MODAL DESIGN ===== */-->
<!--      .Whats_mpp_modal .popup-box_whatsapp {-->
<!--          border-radius: 16px;-->
          <!--/* overflow: hidden;   */-->
<!--      }-->

      <!--/* Header */-->
<!--      .Whats_mpp_modal .popup-header {-->
<!--          background: #c12729;-->
<!--          color: #fff;-->
<!--          padding: 15px 20px;-->
<!--      }-->

<!--      .Whats_mpp_modal .popup-header h5 {-->
<!--          margin: 0;-->
<!--          font-weight: 600;-->
<!--      }-->

<!--      .Whats_mpp_modal .white-close {-->
<!--          filter: invert(1);-->
<!--      }-->

      <!--/* Body */-->
<!--      .Whats_mpp_modal .popup-box_whatsapp .modal-body {-->
<!--          padding: 25px;-->
<!--      }-->

      <!--/* Inputs */-->
<!--      .Whats_mpp_modal .popup-input {-->
<!--          border-radius: 12px;-->
<!--          height: 50px;-->
<!--          border: 1px solid #ddd;-->
<!--          box-shadow: none !important;-->
<!--      }-->

<!--      .Whats_mpp_modal .popup-input:focus {-->
<!--          border-color: #c12729;-->
<!--      }-->

      <!--/* Textarea */-->
<!--      .Whats_mpp_modal textarea.popup-input {-->
<!--          height: 90px;-->
<!--      }-->

      <!--/* Button */-->
<!--      .Whats_mpp_modal .popup-btn {-->
<!--          background: #c12729;-->
<!--          color: #fff;-->
<!--          height: 50px;-->
<!--          border-radius: 12px;-->
<!--          font-weight: 600;-->
<!--          border: none;-->
<!--      }-->

<!--      .Whats_mpp_modal .popup-btn:hover {-->
<!--          background: #c12729;-->
<!--          color: #fff;-->
<!--      }-->

      <!--/* intl tel input full width */-->
<!--      .Whats_mpp_modal .iti {-->
<!--          width: 100%;-->
<!--      }-->

<!--      .Whats_mpp_modal .iti__selected-flag {-->
<!--          border-radius: 10px 0 0 10px;-->
<!--      }-->

      <!--/* Remove modal scroll */-->
<!--      .Whats_mpp_modal .modal-dialog {-->
<!--          max-width: 420px;-->
<!--      }-->

<!--      .Whats_mpp_modal .modal-content {-->
          <!--/* overflow: hidden; */-->
<!--      }-->
<!--.WhatsAppButton_mpp {-->
<!--    background: #14a614;-->
<!--    position: fixed;-->
<!--    bottom: 35px;-->
<!--    right: 0px;-->
<!--    z-index: 9999;-->
<!--    width: 45px;-->
<!--    height: 45px;-->
<!--    border-radius: 5px 0 0 5px;-->
<!--  cursor: pointer;-->
<!--    animation: pulse 1.5s infinite;-->
<!--}-->

<!--@keyframes pulse {-->
<!--    0% {-->
<!--        box-shadow: 0 0 0 0 rgba(20, 166, 20, 0.7);-->
<!--    }-->
<!--    70% {-->
<!--        box-shadow: 0 0 0 15px rgba(20, 166, 20, 0);-->
<!--    }-->
<!--    100% {-->
<!--        box-shadow: 0 0 0 0 rgba(20, 166, 20, 0);-->
<!--    }-->
<!--}-->

<!--.WhatsAppButton_mpp img {-->
<!--    width: 100%;-->
<!--    height: 100%;-->
<!--}-->


<!--  </style>-->

  <!--  <div class="modal fade Whats_mpp_modal" id="exampleModal-4" tabindex="-1">-->
  <!--    <div class="modal-dialog modal-dialog-centered">-->
  <!--        <div class="modal-content popup-box popup-box_whatsapp">-->

              <!-- HEADER -->
  <!--            <div class="modal-header popup-header">-->
  <!--                <h5>Chat with us on WhatsApp</h5>-->
  <!--                <button type="button" class="btn-close white-close" data-bs-dismiss="modal"></button>-->
  <!--            </div>-->

              <!-- BODY -->
  <!--            <div class="modal-body">-->
  <!--                <form method="POST" action="{{ route('whatsaapinquiry') }}" id="whatsappForm">-->
  <!--                    @csrf-->

                      <!-- Message -->
  <!--                    <div class="mb-3">-->
  <!--                        <label class="form-label">Message</label>-->
  <!--                        <textarea class="form-control popup-input" name="message" placeholder="Type your message"></textarea>-->
  <!--                    </div>-->

                      <!-- Phone -->
  <!--                    <div class="mb-4">-->
  <!--                        <label class="form-label">Contact No. <span class="text-danger">*</span></label>-->

  <!--                        <input type="tel" id="wa_phone" class="form-control popup-input" -->
  <!--                            oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,15);">-->

  <!--                          <p class="text-danger d-none" id="wa_error">-->
  <!--                              Contact number must be required-->
  <!--                          </p>  -->

                          <!-- hidden -->
  <!--                        <input type="hidden" name="number" id="wa_full_phone">-->
  <!--                        <input type="hidden" name="country" id="wa_country_name">-->
  <!--                    </div>-->

  <!--                    <div class="d-grid">-->
  <!--                        <button type="submit" class="btn popup-btn">-->
  <!--                            Start Chat with Us-->
  <!--                        </button>-->
  <!--                    </div>-->

  <!--                </form>-->
  <!--            </div>-->

  <!--        </div>-->
  <!--    </div>-->
  <!--</div>-->


<script>
function setScrollFlag() {
    sessionStorage.setItem("scrollToContact", "true");
}
</script>


  <script>
document.addEventListener("DOMContentLoaded", function () {

    const input = document.getElementById("wa_phone");
    const error = document.getElementById("wa_error");
    const form = document.getElementById("whatsappForm");
    const fullPhone = document.getElementById("wa_full_phone");
    const countryName = document.getElementById("wa_country_name");

    const iti = window.intlTelInput(input, {
        initialCountry: "auto",
        separateDialCode: true,
        preferredCountries: ["in", "ae", "us", "gb"],
        geoIpLookup: function (callback) {
            fetch("https://ipapi.co/json/")
                .then(res => res.json())
                .then(data => callback(data.country_code))
                .catch(() => callback("in"));
        },
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.4/build/js/utils.js",
    });

    // numbers only + live hide error
    input.addEventListener("input", function () {
        this.value = this.value.replace(/[^0-9]/g, '');

        if (this.value.length >= 10) {
            error.classList.add("d-none");
        }
    });

    // submit validation
    form.addEventListener("submit", function (e) {

        if (input.value.trim() === "") {
            error.innerText = "Contact number must be required";
            error.classList.remove("d-none");
            input.focus();
            e.preventDefault();
            return;
        }

        if (input.value.length < 10 || input.value.length > 15) {
            error.innerText = "Contact number must be 10 to 15 digits";
            error.classList.remove("d-none");
            input.focus();
            e.preventDefault();
            return;
        }

        // ✅ valid
        error.classList.add("d-none");

        const countryData = iti.getSelectedCountryData();
        fullPhone.value = "+" + countryData.dialCode + input.value;
        countryName.value = countryData.name;
    });

});
</script>


<!-- bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"
    crossorigin="anonymous"></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

     <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
<script src="{{asset('public/front/js/main.js')}}"></script>

<!-- WOW.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
  function initWowCenter() {
    new WOW({
      boxClass:     'wow',
      animateClass: 'animate__animated',
      offset:       window.innerHeight / 2, // trigger when element reaches center
      mobile:       true,
      live:         true
    }).init();
  }
  window.addEventListener("load", initWowCenter);
</script>
<script>
// Simple warning function
function showWarning(message) {
    // alert(message); // you can replace alert with custom toast
}

// Try to clear clipboard (limited browser support)
function clearClipboard() {
    try {
        navigator.clipboard.writeText("");
    } catch (err) {
        console.log("Clipboard clear not supported", err);
    }
}

// 1. Disable right-click
document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
    showWarning('Right-click is disabled');
});

// 2. Disable text selection and drag
document.addEventListener('selectstart', e => e.preventDefault());
document.addEventListener('dragstart', e => e.preventDefault());

// 3. Disable keyboard shortcuts
document.addEventListener('keydown', function(e) {
    const key = e.key.toLowerCase();

    // Developer tools & source
    if (e.key === "F12" || (e.ctrlKey && e.shiftKey && (key === "i" || key === "j")) || (e.ctrlKey && key === "u")) {
        e.preventDefault();
        showWarning("Developer tools disabled");
    }

    // Save / Print / Screenshot
    if ((e.ctrlKey && (key === "s" || key === "p")) || e.key === "PrintScreen") {
        e.preventDefault();
        showWarning("Saving/Printing/Screenshot not allowed");
        clearClipboard();
    }

    // Copy / Cut / Paste / Select All
    if (e.ctrlKey && ["a", "c", "v", "x"].includes(key)) {
        e.preventDefault();
        showWarning("Copy/Cut/Paste disabled");
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.4/build/js/intlTelInput.min.js"></script>

</body>

</html>
@include('layouts.header')
<section>
    <div class="container">
         <div class="banner_wrapper">
            <!-- <picture>-->
            <!--    <source media="(max-width:992px)" srcset="{{asset('public/front/images/flexibel_banner/onsite_services_m.webp')}}" alt="On-Site Services banner" class="banner img-fluid bd_rd_10">-->
            <!--    <img src="{{asset('public/front/images/flexibel_banner/onsite_services.webp')}}" alt="On-Site Services banner" class="banner img-fluid bd_rd_10">-->
            <!--</picture>-->
            <!--<img src="{{asset('public/front/images/onsite_Service_banner.png')}}" alt="On-Site Services" class="banner img-fluid">-->
            <div class="banner_text">
                <div class="">
                    <!--<h1 class="main_head">On-Site Services</h1>-->
                    <div class="breadcrumb d-none d-md-block">
                        <a href="{{url('/')}}">Home </a><a href="Javascript:void(0)">| Services</a><a href="javascript:void(0)">&nbsp;| Inspection & Quality Analysis</a>
                    </div>
                </div>
            </div>
         </div>
    </div>
</section>
<section class="mt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p class="sub_head ms-0">Inspection & Quality Analysis</p>
                <h1 class="main_head text-start">Inspection & Quality Analysis</h1>
                <p>Every expansion joint must deliver exactly what it was engineered for. At Flexibel, inspection and QA are embedded across the lifecycle from material verification to final commissioning. This discipline ensures joints don’t just meet standards; they prove performance in the field.</p>
            </div>
        </div>
    </div>
</section>
<section class="mt-100 service-list-detail">
    <div class="container-fluid">
        <div class=" prod_slider_wraper">
            <div class="container feature-list">
                <div class="text-md-center text-start">
                    <h2 class="main_head text-md-center text-start text-white">The QA & Inspection Process</h2>
                </div>
                <div class="row gx-5 mt-5">
                    <div class="col-lg-6">
                        <div class="feature-item">
                            <div class="feature-number">1</div>
                            <div class="feature-content">
                                <h3 class="test_name">Material Verification</h3>
                                <p>Alloys are validated through Positive Material Identification (PMI) before fabrication begins. Certified mill test reports are reviewed to ensure compliance with EJMA, ASME, and project specifications.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="feature-item">
                            <div class="feature-number">2</div>
                            <div class="feature-content">
                                <h3 class="test_name">Fabrication Hold-Points</h3>
                                <p>Critical stages: forming, welding, and convolution  are monitored through dimensional checks, weld inspection, and NDT (DPT, radiography, ultrasonic). Each stage is released only upon QA sign-off.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gx-5">
                    <div class="col-lg-6">
                        <div class="feature-item">
                            <div class="feature-number">3</div>
                            <div class="feature-content">
                                <h3 class="test_name">Pressure & Leak Testing</h3>
                                <p>Hydrostatic and helium leak testing validate both strength and tightness. No joint leaves the shop floor without documented proof of pressure integrity.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="feature-item">
                            <div class="feature-number">4</div>
                             <div class="feature-content">
                                <h3 class="test_name">Documentation & Traceability</h3>
                                <p>Digital records, inspection reports, and QR code tagging ensure every joint can be traced from raw material to commissioning.</p>
                            </div>
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
</section>

<section class="mt-100">
    <div class="container">
        <div class="row ">
            <div class="col-lg-7 mb-3 mb-lg-0">
                <h2 class="main_head text-start">FlexInspect™ — Structured Inspection Services</h2>
                <p>FlexInspect™ consolidates QA into a service you can rely on both before and after delivery.</p>
                <ul class="key_list">
                    <li><b>Basic Tier (included with all joints): </b> Fabrication QA, material traceability, NDT reports, PMI, weld inspections, hydro/leak tests, and QR-coded tracking.</li>
                    <li><b>Advanced Tier (on-site): </b>  Installation alignment verification, torque checks, and startup movement validation — preventing early failures during commissioning.</li>
                </ul>
            </div>
            <div class="col-lg-5 bd_left">
                <h2 class="main_head text-start">Key Benefits</h2>
                <ul class="key_list">
                    <li>Zero-defect assurance through structured hold-points.</li>
                    <li>Documented compliance with EJMA/ASME and client standards.</li>
                    <li>Reduced risk of early failure at both fabrication and commissioning.</li>
                    <li>Traceability built into every joint for accountability and audits.</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="mt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="main_head text-start text-unset">Add FlexInspect™ to your next order and secure full lifecycle assurance from fabrication to field.</h2>
                <a href="{{ route('contact-us') }}#contact" class="prod_btn" tabindex="0">
                    Request FlexInspect Package
                    <span class="svg ms-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">
                            <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>
@include('layouts.footer')
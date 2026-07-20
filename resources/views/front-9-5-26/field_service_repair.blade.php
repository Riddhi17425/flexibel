@include('layouts.header')
<section>
    <div class="container">
        <div class="banner_wrapper">
            <!-- <picture>-->
            <!--    <source media="(max-width:992px)" srcset="{{asset('public/front/images/flexibel_banner/logistics_m.webp')}}" alt="logistics banner" class="banner img-fluid bd_rd_10">-->
            <!--    <img src="{{asset('public/front/images/flexibel_banner/logistics.webp')}}" alt="logistics banner" class="banner img-fluid bd_rd_10">-->
            <!--</picture>-->
            <!--<img src="{{asset('public/front/images/onsite_Service_banner.png')}}" alt="On-Site Services" class="banner img-fluid">-->
            <div class="banner_text">
                <div class="">
                    <!--<h1 class="main_head">Logistics</h1>-->
                    <div class="breadcrumb d-none d-md-block">
                        <a href="{{url('/')}}">Home </a><a href="Javascript:void(0)">| Services</a><a href="javascript:void(0)">&nbsp;| Field Services & Repair</a>
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
                <p class="sub_head ms-0">Field Services & Repair</p>
                <h1 class="main_head text-start">Field Services & Repair</h1>
                <p>Flexibel’s Field Services ensure your expansion joints are installed, maintained, and restored with precision. From first fit-up to lifecycle repairs, our field specialists bring the same engineering rigor to site work that we apply in our factory. The result: safer installations, extended service life, and reduced risk of costly shutdowns.</p>
                <a href="{{ route('contact-us') }}#contact" class="prod_btn" tabindex="0">
                   Book On-Site Support
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
<section class="mt-100 service-list-detail">
    <div class="container-fluid">
        <div class=" prod_slider_wraper">
            <div class="container feature-list">
                <div class="text-center">
                    <h2 class="main_head text-white">Scope of Service</h2>
                </div>
                <div class="row gx-5 mt-5">
                    <div class="col-lg-6">
                        <div class="feature-item">
                            <div class="feature-number">1</div>
                            <div class="feature-content">
                                <h3 class="test_name">Installation & Supervision</h3>
                                <p>Correct installation is critical to reliability. Flexibel engineers provide on-site supervision during fit-up and commissioning, verifying alignment, torque, and QA checkpoints. This ensures every joint is installed correctly the first time, preventing early failures and unplanned costs.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="feature-item">
                            <div class="feature-number">2</div>
                            <div class="feature-content">
                                <h3 class="test_name">Refurbishment & Field Repairs</h3>
                                <p>Expansion joints under load are evaluated for leakage, deformation, and movement capacity. Where required, non-destructive testing (ultrasound, dye penetrant, PMI) confirms structural integrity.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gx-5">
                    <div class="col-lg-6">
                        <div class="feature-item">
                            <div class="feature-number">3</div>
                            <div class="feature-content">
                                <h3 class="test_name">Training & Technical Support</h3>
                                <p>We transfer knowledge directly to client teams. From installation practices to troubleshooting methods, Flexibel training programs build in-house expertise. The result: greater independence, fewer recurring issues, and long-term operational confidence.</p>
                <!--                 <a href="#" class="prod_btn" tabindex="0">-->
                <!--   Request a Site Assessment-->
                <!--    <span class="svg ms-2">-->
                <!--        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">-->
                <!--            <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>-->
                <!--        </svg>-->
                <!--    </span>-->
                <!--</a>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="feature-item">
                            <div class="feature-number">4</div>
                             <div class="feature-content">
                                <h3 class="test_name">Installed right. Maintained right. Built to last.</h3>
                                <p>With Flexibel on-site expertise, every joint leaves the site tested, traceable, and ready to perform. The result: maximum uptime, safer operations, and confidence in your systems.</p>
                <!--                 <a href="#" class="prod_btn" tabindex="0">-->
                <!--    Talk to an Engineer-->
                <!--    <span class="svg ms-2">-->
                <!--        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">-->
                <!--            <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>-->
                <!--        </svg>-->
                <!--    </span>-->
                <!--</a>-->
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
            <div class="col-lg-4">
                <h2 class="main_head text-start">Key Benefits</h2>
                <ul class="key_list">
                    <li>Reduce failures through expert installation</li>
                    <li>Extend service life with on-site repair options</li>
                    <li>Minimize downtime during interventions</li>
                    <li>Build in-house technical expertise with training</li>
                </ul>
            </div>
            <div class="col-lg-4 bd_left">
                <h2 class="main_head text-start">Use Cases</h2>
                <ul class="key_list">
                    <li>EPC projects requiring third-party supervision</li>
                    <li>Plant shutdowns where refurbishment is faster than replacement</li>
                    <li>Offshore sites where access to spares is limited</li>
                    <li>Long-term maintenance teams needing structured training</li>
                </ul>
            </div>
            <div class="col-lg-4 bd_left">
                <h2 class="main_head text-start">Deliverables</h2>
                <ul class="key_list">
                    <li>Supervision and QA documentation</li>
                    <li>Inspection and repair logs</li>
                    <li>Training manuals tailored to site conditions</li>
                    <li>Verified installation sign-off for commissioning</li>
                </ul>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')
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
                        <a href="{{url('/')}}">Home </a><a href="Javascript:void(0)">| Services</a><a href="javascript:void(0)">&nbsp;| Emergency Services & Turnaround Support</a>
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
                <p class="sub_head ms-0">Emergency Services & Turnaround Support</p>
                <h1 class="main_head text-start">Emergency Services & Turnaround Support</h1>
                <p>Unexpected failures and shutdowns demand immediate action. Flexibel’s Emergency Services provide rapid turnaround  from urgent design to on-site installation  within as little as 24 hours. Backed by UAE-based production, stocked raw materials, and an extensive design library, we respond faster than offshore suppliers to keep your systems online.</p>
                <!--<a href="#" class="prod_btn" tabindex="0">-->
                <!--  Request Emergency Support-->
                <!--    <span class="svg ms-2">-->
                <!--        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">-->
                <!--            <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>-->
                <!--        </svg>-->
                <!--    </span>-->
                <!--</a>-->
            </div>
            <div class="col-lg-12 mt-md-5 pt-md-3">
                <!--<p class="sub_head ms-0">Rapid Technical Assessment</p>-->
                <div class="red_card">
                    <h2 class="main_head text-center">Rapid Technical Assessment</h2>
                <p>Our engineers respond within 60 minutes to evaluate the failure and mobilize corrective action. Uptime starts with Flexibel.</p>
                <div class="sub_text_wrapper justify-content-center">
                    <div class="sub_box_1 me-3">
                        <a href="{{ route('contact-us') }}#contact" class="prod_btn" tabindex="0">
                          Book Consultation
                            <span class="svg ms-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">
                                    <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </a>
                        <p class="sub_txt">Discuss your case directly with a Flexibel engineer.</p>
                            </div>
                        <div class="sub_box_2">
                            <a href="{{route('enquiry-form')}}" class="prod_btn" tabindex="0">
                          Get Emergency Quote
                            <span class="svg ms-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">
                                    <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </a>
                        <p class="sub_txt">
                            Provide your details for an immediate cost and delivery response.
                        </p>
                    </div>
                </div>
                </div>
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
                                <h3 class="test_name">24-Hour Turnaround</h3>
                                <p>From drawing board to delivery, Flexibel can design, manufacture, and dispatch custom expansion joints within 24 hours. This capability is made possible by our centralized production facility, stocked inventory, and pre-engineered designs, ensuring projects are not held hostage by long lead times.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="feature-item">
                            <div class="feature-number">2</div>
                            <div class="feature-content">
                                <h3 class="test_name">Emergency Failure Response</h3>
                                <p>Pipeline ruptures, flange leaks, and expansion joint blowouts can shut down entire operations. Flexibel field teams mobilize quickly to site, assess the failure, and provide either immediate repair solutions or rapid replacement joints. Our goal: contain the damage, restore integrity, and get you back online safely.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gx-5">
                    <div class="col-lg-6">
                        <div class="feature-item">
                            <div class="feature-number">3</div>
                            <div class="feature-content">
                                <h3 class="test_name">Turnaround & Shutdown Support</h3>
                                <p>Planned shutdowns are high-stakes, time-critical events. Flexibel integrates into your turnaround plan by supplying pre-built joints, staging emergency spares, and keeping response teams on standby. This reduces critical path delays and ensures smooth commissioning once systems restart.</p>
                <!--                 <a href="#" class="prod_btn" tabindex="0">-->
                <!--   Book a Turnaround Consultation-->
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
                                <h3 class="test_name">From failure to uptime. From urgency to assurance.</h3>
                                <p>With Flexibel Emergency Services, every response is designed to cut downtime, protect safety, and restore operations fast. You get resilience you can count on - when it matters most.</p>
                <!--                 <a href="#" class="prod_btn" tabindex="0">-->
                <!--    Get Emergency Help Now-->
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
                    <li>24-hour build capability for urgent replacements</li>
                    <li>Rapid mobilization of field teams for on-site failures</li>
                    <li>Integration into planned shutdown schedules</li>
                    <li>Reduced downtime and minimized financial loss</li>
                </ul>
            </div>
            <div class="col-lg-4 bd_left">
                <h2 class="main_head text-start">Use Cases</h2>
                <ul class="key_list">
                    <li>Power plants facing sudden expansion joint rupture during peak load</li>
                    <li>Marine vessels requiring urgent dockside repair before voyage</li>
                    <li>Petrochemical shutdowns needing 48-hour turnaround on critical spools</li>
                    <li>EPC contractors managing compressed commissioning timelines</li>
                </ul>
            </div>
            <div class="col-lg-4 bd_left">
                <h2 class="main_head text-start">Deliverables</h2>
                <ul class="key_list">
                    <li>Emergency build and delivery of joints within 24 hours</li>
                    <li>Field failure assessment and repair reports</li>
                    <li>Spare stock planning for shutdowns</li>
                    <li>Verified commissioning support documentation</li>
                </ul>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')
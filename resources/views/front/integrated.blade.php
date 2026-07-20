@include('layouts.header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<section>
    <div class="container">
        <div class="banner_wrapper">
            <!-- <picture>-->
            <!--    <source media="(max-width:992px)" srcset="{{asset('public/front/images/flexibel_banner/quality_m.webp')}}" alt="Quality banner" class="banner img-fluid bd_rd_10">-->
            <!--    <img src="{{asset('public/front/images/flexibel_banner/quality.webp')}}" alt="Quality banner" class="banner img-fluid bd_rd_10">-->
            <!--</picture>-->
            <!--<img src="{{asset('public/front/images/quality_banner.png')}}" alt="Quality" class="banner img-fluid">-->
            <div class="banner_text">
                <div class="">
                    <!--<h1 class="main_head">Quality & Compliance</h1>-->
                    <div class="breadcrumb  d-none d-md-block">
                        <a href="{{url('/')}}">Home </a><a href="javascript:void(0)">&nbsp;| Quality</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Quality & Compliance -->
<section class="mt-100 position-relative">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-6 col-xl-6">
                <p class="sub_head ms-0">Quality & Compliance</p>
                <h1 class="main_head text-start">Our Quality</h1>
                <h4 class="f_24 mb-3"><b>FLEXIBEL® IS THE TESTAMENT.</b></h4>
                <p>
                    FLEXIBEL® IS THE TESTAMENT. At Flexibel, we understand the critical role expansion joints play in the integrity and performance of your piping systems and equipment. That's why we are committed to delivering the highest quality products through a rigorous Quality Assurance (QA) and Quality Control (QC) program.
                </p>
            </div>
            <div class="col-lg-6 col-xl-6 col-md-12 mb-2 mb-lg-0">
                <img src="{{asset('public/front/images/engineered-reliability-perform.png')}}" alt="Engineered for Reliability" class=" img-fluid">
            </div>
        </div>
    </div>
</section>
<!-- Quality & Compliance -->
<!-- Research -->
<section class="products certification_compliance mt-100">
    <div class="container-fluid">
        <h2 class="main_head">Multi-Stage QA/QC Procedures</h2>
        <div class="prod_slider_wraper ">
            <div class="container position-relative">
                <div class="qcprocedures_slider slider_slick_dots ">
                    @foreach ($qualities as $qualitiy)
                        <div class="Procedures_slide">
                            <div class="row align-items-center ">
                                <div class="col-md-5">
                                    <p class="sub_head ms-0 mb-md-5">{{$qualitiy->stages ?? ''}}</p>
                                    <h4 class="main_head lightwhite_text text-start">{{$qualitiy->text ?? ''}}</h4>
                                </div>
                                <div class="col-md-6 offset-md-1">
                                    <img src="{{asset('public/quality_stages/'.$qualitiy->image)}}" alt="{{ str_replace(['-', '_'], ' ', pathinfo($qualitiy->alt_tag, PATHINFO_FILENAME)) }}" class=" img-fluid">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Research -->
<!-- Expansion Joint -->
<section class="mt-100 quality_wraper">
    <div class="container">
        <div class="row">
            <p class="sub_head ms-0">Expansion Joint</p>
            <h2 class="main_head text-start">Testing & Inspection</h2>
            <div class="row">
                <div class="col-md-4  pe-lg-3">
                    <h2 class="blog_detailsub_head text-start">Reliable Performance:</h2>
                    <p>Our rigorous QA and QC program guarantees consistent quality and dependable performance for your critical applications.</p>
                </div>
                <div class="col-md-4 bd_left pe-lg-3">
                    <h2 class="blog_detailsub_head text-start">Enhanced Safety:</h2>
                    <p>Expansion joints that meet or exceed industry standards contribute to a safer operating environment for your personnel and equipment.</p>
                </div>
                <div class="col-md-4 bd_left">
                    <h2 class="blog_detailsub_head text-start">Reduced Downtime:</h2>
                    <p>Our focus on quality minimizes the risk of premature failure, leading to increased system uptime and reduced maintenance costs.</p>
                </div>
            </div>
        </div>
        <div class="row mt-100 justify-content-center">
            <div class="col-md-8">
                <img src="{{asset('public/front/images/testing_inspection.png')}}" alt="testing inspection" class=" img-fluid">
            </div>
        </div>
    </div>
</section>
<!-- Research -->
<section class="products  mt-100 certification_compliance lightwhite_text">
    <div class="container-fluid">
        <h2 class="main_head">Research & Development</h2>
        <div class="prod_slider_wraper ">
            <div class="container position-relative">

                <div class="row row-gap-4  align-items-center">
                    <div class="col-md-12">
                        <p>At Flexibellows, quality isn’t just a department — it’s built into every product we manufacture. From design to final inspection, we follow strict quality control processes that ensure long-term performance and safety across all industries we serve. Whether your application demands high-pressure resistance, extreme temperature endurance, or chemical compatibility, our products are tested and certified to meet or exceed industry standards.</p>
                    </div>

                    <div class="col-md-7">
                        <h4 class="research_title">Engineering for Tomorrow’s Challenges</h4>
                        <p>Our R&D division is equipped with advanced tools and simulation software that enable us to test, analyze, and optimize expansion joints, bellows, and flexible connectors for a variety of industrial environments. Whether it’s high-pressure, high-temperature applications or systems exposed to corrosive media, we design with performance and longevity in mind.</p>
                        <h4 class="research_title mt-md-4">Core Capabilities</h4>
                        <ul class="item_disc_ul">
                            <li> Finite Element Analysis (FEA) for stress simulation and performance prediction</li>
                            <li> Thermal and Pressure Cycle Testing for real-world reliability</li>
                            <li> Customized Design Development based on client-specific requirements</li>
                            <li>Material Research & Metallurgy Analysis for enhanced durability</li>
                            <li>Design Validation in compliance with EJMA, ASME, and international standards</li>
                        </ul>
                    </div>
                    <div class="col-md-4 offset-md-1">
                        <img src="{{asset('public/front/images/research_development.png')}}" alt="research development" class=" img-fluid">
                    </div>
                    <div class="col-md-12">
                        <h4 class="research_title">Commitment to Excellence</h4>
                        <p>We believe that progress is driven by curiosity, expertise, and a deep understanding of industry needs. At Flexibellows, R&D is not just a department—it’s the foundation of our promise to deliver safe, efficient, and durable flexible solutions that meet the evolving demands of industries worldwide.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Research -->
<section class="mt-100">
    <div class="container">
        <div class="row">
            <p class="sub_head ms-0">Expansion Joint</p>
            <h2 class="main_head text-start">Testing & Inspection</h2>
            <p>All Flexibellows products go through comprehensive inspection and testing procedures to verify structural integrity and functional reliability. Depending on the application, our tests may include hydrostatic or pneumatic pressure testing, dye penetrant testing (DPT), ultrasonic testing (UT), radiographic testing (RT), and helium leak detection. These processes help detect any flaws in materials or welds and ensure each product operates safely under real-world conditions.</p>
            <p>Visual inspections and dimensional verifications are conducted throughout the production cycle to maintain precision. Our team adheres to strict quality protocols aligned with ASME, PED, and EJMA standards, and we provide full inspection documentation with every order when required.</p>

        </div>
        <div class="row quality_accordion justify-content-center mt-4">
            <div class="col-md-12">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Non-Destructive Testing (NDT)
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                To ensure the integrity of welds, materials, and overall product structure without causing damage, we employ a range of Non-Destructive Testing methods:
                                <ul>
                                     <li><strong>Radiographic Test (RT)</strong> – for detecting internal flaws in welds</li>
                                    <li><strong>Liquid Penetrant Test (LPT)</strong> – for identifying surface cracks and discontinuities</li>
                                    <li><strong>Ultrasonic Test (UT)</strong> – to detect subsurface defects and verify wall thickness</li>
                                    <li><strong>Magnetic Particle Test (MPT)</strong> – for surface and near-surface discontinuities in ferromagnetic materials</li>
                                    <li><strong>Pneumatic Pressure & Leak Detection Tests</strong> – to confirm sealing integrity under air or gas pressure</li>
                                    <li><strong>Hydraulic Pressure Test</strong> – for evaluating strength and leakage under fluid pressure</li>
                                    <li><strong>Chemical & Mechanical Analysis</strong> – to verify the material composition and mechanical properties used in bellows</li>
                                    <li><strong>Spring Rate Test</strong> – to validate flexibility and resistance within specified movement parameters</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Destructive Testing
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>In specific cases, we also perform Destructive Testing to evaluate the ultimate performance limits of our products:</p>
                                <ul>
                                    <li><strong>Fatigue Life Cycle Test –</strong> measures durability and service life under repeated movement cycles</li>
                                    <li><strong>Burst Test –</strong> determines the maximum pressure the bellow can withstand before failure</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Accordion Item #3
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Expansion Joint -->
@include('layouts.footer')
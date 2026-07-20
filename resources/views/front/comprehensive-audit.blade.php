@include('layouts.header')
<section>
    <div class="container">
        <div class="banner_wrapper">
            <!--<picture>-->
            <!--<source media="(max-width:992px)" srcset="{{asset('public/front/images/flexibel_banner/design_calculation_m.webp')}}" alt="On-Site Services" class="banner img-fluid bd_rd_10">-->
            <!--<img src="{{asset('public/front/images/flexibel_banner/design_calculation.webp')}}" alt="On-Site Services" class="banner img-fluid bd_rd_10">-->
            <!--</picture>-->
            <!--<img src="{{asset('public/front/images/onsite_Service_banner.png')}}" alt="On-Site Services" class="banner img-fluid">-->
            <div class="banner_text">
                <div class="">
                    <!--<h1 class="main_head">Design & Calculation</h1>-->
                    <div class="breadcrumb d-none d-md-block">
                        <a href="{{url('/')}}">Home </a><a href="Javascript:void(0)">| Services</a><a href="javascript:void(0)">&nbsp;| Comprehensive Audit</a>
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
                <p class="sub_head ms-0">Comprehensive Audit</p>
                <h1 class="main_head text-start">Operational Integrity Check</h1>
                <p>Expansion joints operate in demanding conditions where fatigue is inevitable. Without periodic evaluation, minor defects can escalate into failures that disrupt operations and inflate costs. Flexibel’s Independent Audit provides a full operational assessment, confirming joint condition, benchmarking performance, and supporting lifecycle-driven maintenance strategies.</p>
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
                    <div class="col-md-6">
                        <div class="feature-item">
                            <div class="feature-number">1</div>
                            <div class="feature-content">
                                <h3 class="test_name">Condition Assessment</h3>
                                <p>Audits begin with visual and dimensional checks, alignment verification, and material condition analysis. Surface wear, weld fatigue, or misalignment are flagged before they escalate into failures.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-item">
                            <div class="feature-number">2</div>
                            <div class="feature-content">
                                <h3 class="test_name">Performance Verification</h3>
                                <p>Expansion joints under load are evaluated for leakage, deformation, and movement capacity. Where required, non-destructive testing (ultrasound, dye penetrant, PMI) confirms structural integrity.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gx-5">
                    <div class="col-md-6">
                        <div class="feature-item">
                            <div class="feature-number">3</div>
                            <div class="feature-content">
                                <h3 class="test_name">Lifecycle Benchmarking</h3>
                                <p>Operational data — cycle counts, temperature history, and vibration exposure — are compared against the joint’s design envelope. This benchmarking highlights overstressed or nearing-end-of-life components.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="feature-item">
                            <div class="feature-number">4</div>
                             <div class="feature-content">
                                <h3 class="test_name">Documentation & Reporting</h3>
                                <p>Every audit produces a structured technical report including findings, risk classification, and recommended corrective actions. This becomes a preventive maintenance record for EPCs, operators, and insurers.</p>
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
                <h2 class="main_head text-start">FlexAudit™ — Preventive Assurance</h2>
                <p>FlexAudit™ is Flexibel’s structured audit program designed for expansion joints already in service. The program gives asset owners and EPCs a clear picture of joint health and actionable recommendations to prevent costly failures.</p>
                <ul class="key_list">
                    <li><b>Scheduled on-site audits of operating joints.</b></li>
                    <li><b>Preventive maintenance plans with clear intervention timelines.</b></li>
                    <li><b>Full traceability and condition records for compliance and insurance.</b></li>
                </ul>
            </div>
            <div class="col-lg-5 bd_left">
                <h2 class="main_head text-start">Key Benefits</h2>
                <ul class="key_list">
                    <li><b>Prevent failures before they happen — </b>  detect cracks, leaks, and overstress early.</li>
                    <li><b>Optimize maintenance budgets — </b> prioritize only the joints that need intervention.</li>
                    <li><b>Extend service life — </b> proactive upkeep reduces replacement frequency.</li>
                    <li><b>Ensure safety & compliance — </b> maintain defensible records for audits and regulators.</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="mt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="main_head text-start">Add FlexAudit™ to your maintenance program and secure uptime with confidence.</h2>
                <a href="{{ route('contact-us') }}#contact" class="prod_btn" tabindex="0">
                    Request FlexAudit Package
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
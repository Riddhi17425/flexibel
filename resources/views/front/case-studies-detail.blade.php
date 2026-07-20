@include('layouts.header')
@include('layouts.casestudy_form')
<style>
    .prod_btn{
        color:white!important;
    }
</style>
<section>
    <div class="container">
        <div class="banner_wrapper">
        <!--    <picture>-->
        <!--    @if (!empty($caseStudy->top_banner_mobile))-->
        <!--        <source media="(max-width: 767px)" srcset="{{ asset('public/case_studies/banner/mobile/' . $caseStudy->top_banner_mobile) }}">-->
        <!--    @endif-->
        <!--    @if (!empty($caseStudy->top_banner_desktop))-->
        <!--        <source media="(min-width: 768px)" srcset="{{ asset('public/case_studies/banner/desktop/' . $caseStudy->top_banner_desktop) }}">-->
        <!--    @endif-->
        <!--    <img src="{{ asset('public/case_studies/banner/desktop/' . $caseStudy->top_banner_desktop) }}" alt="Blog Banner" class="img-fluid bd_rd_10">-->
        <!--</picture>-->
        <!--<img src="./images/case_studies_banner.png" alt="Case Studies banner" class="banner img-fluid">-->
        <div class="banner_text">
            <div class="">
                <!--<p class="main_head">Case Studies</p>-->
                <div class="breadcrumb d-none d-md-block">
                    <a href="{{ url('/') }}">Home </a><a href="javascript:void(0)">&nbsp;| Case Studies</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
<section class="mt-100 blog-detail">
    <div class="container">
        <div class="row ">
            {!! $caseStudy->company_des !!}
            <!--<p class="sub_head ms-0"> Date: May 2024</p>-->
            <!--<h2 class="main_head text-start">Custom Metallic Bellows for Gas Compression Trains</h2>-->
            <!--<p><strong>Industry: </strong>Oil & Gas – Onshore Processing Facility</p>-->
            <!--<p><strong>Application: </strong>Gas Dehydration & Compression Unit</p>-->
            <!--<p><strong>Region: </strong>GCC</p>-->
            
            <a href="#" class="prod_btn" data-bs-toggle="modal" data-bs-target="#case_studies">Enquiry Now
                <span class="svg  ms-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15" fill="none">
                        <path d="M1.98047 13.5L11.9805 1.5M11.9805 1.5H1.98047M11.9805 1.5V12.4091" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </span>
            </a>
        </div>
    </div>
</section>
<section class="mt-100">
    <div class="container">
        <div class="row">
            @if(!empty($caseStudy->section1_title) || !empty($caseStudy->section1_description))
                <div class="col-md-6 mb-4">
                    <div class="service_box">
                        <h4 class="sub_title_f34">{{ $caseStudy->section1_title }}</h4>
                        {!! $caseStudy->section1_description !!}
                    </div>
                </div>
            @endif

            @if(!empty($caseStudy->section2_title) || !empty($caseStudy->section2_description))
                <div class="col-md-6 mb-4">
                    <div class="service_box">
                        <h4 class="sub_title_f34">{{ $caseStudy->section2_title }}</h4>
                        {!! $caseStudy->section2_description !!}
                    </div>
                </div>
            @endif

            @if(!empty($caseStudy->section3_title) || !empty($caseStudy->section3_description))
                <div class="col-md-6 mb-4">
                    <div class="service_box">
                        <h4 class="sub_title_f34">{{ $caseStudy->section3_title }}</h4>
                        {!! $caseStudy->section3_description !!}
                    </div>
                </div>
            @endif
             @if(!empty($caseStudy->main_title))
                <div class="col-md-6 mb-4">
                    <div class="service_box">
                        <h4 class="sub_title_f34">{!! $caseStudy->main_title !!}</h4>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
<!--<section class="mt-100">-->
<!--    <div class="container ">-->
<!--        <div class="row justify-content-md-center">-->
<!--            <div class="col-md-7 ">-->
<!--                {!! $caseStudy->main_title !!}-->
<!--                <h2 class="main_head">Results Achieved</h2>-->
<!--                <p class="text-center mb-5">Lorem ipsum dolor sit amet consectetur. Tortor et in arcu massa commodo augue at sed amet. Viverra quisque mollis convallis mauris. Porttitor nulla nulla suscipit ipsum. Mi urna non lorem.</p>-->
<!--            </div>-->
<!--            <div class="case_studies_slider dot_img2 slider_arrow  slider_slick_dots">-->
<!--                <div class="case_slider_item">-->
<!--                    <div class="d-flex justify-content-center">-->
<!--                        <img src="{{asset('public/case_studies/detail_imgs/'.$caseStudy->detail_img)}}" alt="{{  str_replace(['-', '_'],' ', pathinfo($caseStudy->detail_img, PATHINFO_FILENAME)) }}" class="img-fluid">-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!--modal form-->



@include('layouts.footer')





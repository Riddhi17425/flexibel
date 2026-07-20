@include('layouts.header')
<section>
    <div class="container">
        <div class="banner_wrapper">
            <!--<picture>-->
            <!--    <source media="(max-width:992px)" srcset="{{asset('public/front/images/flexibel_banner/certificates_m.webp')}}" alt="certificates" class="banner img-fluid bd_rd_10">-->
            <!--    <img src="{{asset('public/front/images/banner_img.png')}}" alt="certificates" class="banner img-fluid bd_rd_10">-->
            <!--</picture>-->
            <!--<img src="{{asset('public/front/images/banner_img.png')}}" alt="certificates" class="banner">-->
            <div class="banner_text">
                <div class="">
                    <!--<h1 class="main_head">Certifications</h1>-->
                    <div class="breadcrumb d-none d-md-block">
                        <a href="{{url('/')}}">Home </a><a href="javascript:void(0)">&nbsp;| Certifications</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about mt-100 position-relative">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p class="sub_head ms-0">Core Certifications</p>
                <h1 class="main_head text-start">Our Certifications You Can Trust</h1>
                <p>At Flexibel, quality isn’t just a checklist—it’s the foundation of every product we engineer. Our
                    relentless commitment to excellence is validated by globally recognized certifications, ensuring
                    your operations benefit from uncompromising safety, durability, and compliance</p>
            </div>
            <div class="col-lg-2 mb-4 mb-lg-auto">
                <img src="{{ asset('public/front/images/certi_top.png')}}" alt="Core Certifications" class="img-fluid">
            </div>
            <div class="col-lg-10">
                <h5 class="certi_head">
                    ADNOC Approved Expansion Joint:
                    Trusted Partner in Powering the UAE’s Oil & Gas Legacy
                </h5>
                <p>At Flexibel, earning ADNOC (Abu Dhabi National Oil Company) approval isn’t just a certification—it’s
                    a testament to our ability to meet the world’s most rigorous energy sector standards. As a strategic
                    supplier to ADNOC, we deliver expansion joints and compensators that ensure operational continuity,
                    safety, and efficiency across upstream, midstream, and downstream operations.</p>
            </div>
        </div>
    </div>
</section>

<section class="mt-5">
    <div class="container">
        <div class="row">
            @foreach ($certificates as $certificate )
                <div class="col-lg-3 mb-4">
                    <div class="certibox_wrapper">
                        <div class="certi_box">
                            <!--<a href="{{ asset('public/certificate_pdfs/'.$certificate->pdf)}}" data-fancybox="gallery">-->
                            <!--    <img src="{{ asset('public/certificate_images/'.$certificate->image)}}" alt="{{  str_replace(['-', '_'],' ', pathinfo($certificate->alt_tag, PATHINFO_FILENAME)) }}" class="img-fluid">-->
                            <!--    <h6 class="test_name">{{$certificate->title}}</h6>-->
                            <!--</a>-->
                            <a href="javascript:void(0)" >
                                <img src="{{ asset('public/certificate_images/'.$certificate->image)}}" alt="{{  str_replace(['-', '_'],' ', pathinfo($certificate->alt_tag, PATHINFO_FILENAME)) }}" class="img-fluid">
                                <h6 class="test_name">{{$certificate->title}}</h6>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach         
        </div>
    </div>
</section>
@include('layouts.footer')
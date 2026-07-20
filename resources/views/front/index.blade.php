@include('layouts.header', [
    'og_image' => asset('public/front/images/hero_slide_4.png')
    ])

@include('layouts.aside')
@include('layouts.testimonial_form')
<style>
     .gsap_text span {
      display: inline-block;
      /*transform: translateY(20px);*/
      opacity: 0.1;
    }
    .gsap_text{font-size:36px;line-height:42px;}
    .btn-close:hover{filter: invert(0)!important;}
</style>


<!-- <section class="hero" id="list-item-1">
        <div class="container-fluid">
            <div class="hero_wrapper">
                <div class="hero_slider">
                    <div class="slide">
                        <img src="images/hero_slide_1.jpg" alt="Metallic" class="img-fluid">
                    </div>
                    <div class="slide">
                        <img src="" alt="Non-Metallic" class="img-fluid">
                    </div>
                    <div class="slide">
                        <img src="" alt="Rubber" class="img-fluid">
                    </div>
                </div>

                <div class="custom-nav">
                    <div class="containers">
                        <div class="nav-item" data-slide="0">
                            <h3>METALIC EXPANSION JOINTS</h3>
                            <p>Lorem ipsum dolor sit amet, consectet adipiscing elit. Quisque suscipit sem.</p>
                        </div>
                        <div class="nav-item" data-slide="1">
                            <h3>NON-METALIC EXPANSION JOINTS</h3>
                            <p>Lorem ipsum dolor sit amet, consectet adipiscing elit. Quisque suscipit sem.</p>
                        </div>
                        <div class="nav-item" data-slide="2">
                            <h3>RUBBER EXPANSION JOINTS</h3>
                            <p>Lorem ipsum dolor sit amet, consectet adipiscing elit. Quisque suscipit sem.</p>
                        </div>
                    </div>
                </div>
            </div>
</section> -->
<section class="hero" id="list-item-1">
    <div class="">
        <div class="hero_wrapper">
            <div class="hero_slider">
                <div class="slide">
                    <picture>
                        <source media="(min-width:768px)" srcset="{{asset('public/front/images/hero_slide_4.png')}}" class="img-fluid" style="height:100vh;width:100vw;" loading="lazy">
                        <img src="{{asset('public/front/images/banner_1_M.jpg')}}" alt="Expansion Joints" class="img-fluid" style="height:100vh;width:100vw;" loading="lazy">
                    </picture>
                    <div class="customslider-text col-xxl-5 col-md-7 col-lg-5">
                        <h1>RESILIENCE<br> ENGINEERED</h1>
                        <p class="mb-md-5 mb-4 col-xxl-9 col-md-11 col-lg-12  col-sm-6" >At Flexibel, engineering means turning system complexity into dependable performance. Our expansion joints protect critical piping systems, manage stress, extend service life, and secure operational continuity. Every project carries our promise: resilience, precision, and trust engineered in the Emirates.
</p>
                        <!--<p>Strengthen your systems with precision-engineered expansion joints</p>-->
                        <div class="sub_text_wrapper justify-content-start">
                            <div class="sub_box_1 me-2">
                            <a href="{{ route('contact-us') }}#contact" class="prod_btn" tabindex="0" style="white-space: nowrap;">
                                                      Book Consultation
                            <span class="svg ms-2">
                            <svg width="10" height="10" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.36917 12.6559L12.6903 1.33423M12.6903 1.33423H2.69035M12.6903 1.33423V12.2433" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                            </span>
                            </a>
                            <p class="sub_txt">Discuss your case directly with a Flexibel engineer.</p>
                            </div>
                            <div class="sub_box_2">
                            <a href="{{route('enquiry-form')}}" class="prod_btn" tabindex="0" style="white-space: nowrap;">
                                                      Get Quote
                            <span class="svg ms-2">
                            <svg width="10" height="10" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.36917 12.6559L12.6903 1.33423M12.6903 1.33423H2.69035M12.6903 1.33423V12.2433" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                            </span>
                            </a>
                            <p class="sub_txt col-12 col-md-9 col-lg-12">
                                                        Provide your details for an immediate cost and delivery response.
                            </p>
                            </div>
                            </div>
                            </div>
                    </div>
                </div>
                <!--<div class="slide">-->
                <!--    <picture>-->
                <!--        <source media="(min-width:768px)" srcset="{{asset('public/front/images/banner_2.webp')}}" class="img-fluid bd_rd_10">-->
                <!--        <img src="{{asset('public/front/images/banner_2_M.webp')}}" alt="Flowers" class="img-fluid bd_rd_10">-->
                <!--    </picture>-->
                <!--    <div class="customslider-text">-->
                <!--        <h3>make it in the Emirates</h3>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
            <!-- <div class="industries_slider">
                <div class="industries_slide">
                    <div class="ind_slide_img">
                        <img src="./images/indsutry_img.png" alt="" class="img-fluid">
                        <div class="indus_slide_content">
                            <div class="indus_left">
                                <h2 class="indus_head mb-2">MMShip Building and Marine Industry</h2>
                                <p class="text-white text-start">Lorem ipsum dolor sit amet consectetur. Nisl dui risus mi
                                    platea ut
                                    volutpat. Neque amet venenatis.</p>
                            </div>
                            <div class="indus_right">
                                <a href="javascript:void(0)" class="prod_btn" tabindex="0">
                                    Explore Now
                                    <span class="svg ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                            fill="none">
                                            <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="industries_slide">
                    <div class="ind_slide_img">
                        <img src="./images/indsutry_img.png" alt="" class="img-fluid">
                        <div class="indus_slide_content">
                            <div class="indus_left">
                                <h2 class="indus_head mb-2">KCShip Building and Marine Industry</h2>
                                <p class="text-white text-start">Lorem ipsum dolor sit amet consectetur. Nisl dui risus mi
                                    platea ut
                                    volutpat. Neque amet venenatis.</p>
                            </div>
                            <div class="indus_right">
                                <a href="javascript:void(0)" class="prod_btn" tabindex="0">
                                    Explore Now
                                    <span class="svg ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                            fill="none">
                                            <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="industries_slide">
                    <div class="ind_slide_img">
                        <img src="./images/indsutry_img.png" alt="" class="img-fluid">
                        <div class="indus_slide_content">
                            <div class="indus_left">
                                <h2 class="indus_head mb-2">Sumi Ship Building and Marine Industry</h2>
                                <p class="text-white text-start">Lorem ipsum dolor sit amet consectetur. Nisl dui risus mi
                                    platea ut
                                    volutpat. Neque amet venenatis.</p>
                            </div>
                            <div class="indus_right">
                                <a href="javascript:void(0)" class="prod_btn" tabindex="0">
                                    Explore Now
                                    <span class="svg ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                            fill="none">
                                            <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div> -->
        </div>
</section>
<!-- certificate -->
<section class="certificate mt-100" id="list-item-2">
    <div class="container">
        <h2 class="main_head">Our Trusted Clients</h2>
        <div class="certi_slider">
            @foreach ($clients as $client)
                <div class="certi_slide">
                    <img src="{{asset('public/Addonclient_images/'.$client->image)}}" alt="{{  str_replace(['-', '_'],' ', pathinfo($client->alt_tag, PATHINFO_FILENAME)) }}" class="img-fluid" loading="lazy">
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- certificate -->
<!-- about -->
<section class="about pb-4 mt-100 position-relative " id="list-item-3">
    <div class="container">
        <div class="row step-1 mb-2 mb-md-5">
            <div class="col-lg-4">
                <p class="mb-0"><b>SINCE 2012</b></p>
            </div> 
            <div class="col-lg-8">
                <h2 class="main_head text-start gsap_text">We Engineer for the Real World.</h2>
                  <p class="mb-0 gsap_text">We believe performance is proven only when systems operate seamlessly. </p>
                    <p class="mb-0 gsap_text"><b>Our mission is simple:</b> deliver products that work under real-world conditions, and back them with services that extend their lifecycle.</p>
                    <p class="mb-0 gsap_text"><b>The result:</b> Maximum resilience, zero failure, and operations that never skip a beat.</p>
            </div>
            
           
        </div>
        <div class="row  step-2 ">
            <div class="col-lg-12 my-0 my-md-5 mt-md-0 mt-4">
                <p class="sub_head pt-3">Our Focus</p>
            </div>
            <div class="col-lg-4">
                <h2 class="main_head text-start">Zero Failure</h2>
                <p>Flexibel expansion joints are engineered to meet international standards and verified through rigorous quality control. Every unit undergoes <b>PMI, NDT, hydrostatic testing, and helium leak detection* </b> before dispatch. With full documentation and traceability, you can be confident that no unproven joint ever reaches your site ensuring safety, compliance, and reliability in operation.</p>
            </div>
            <div class="col-lg-4 position-relative start_model">
                 <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/4.0.0/model-viewer.min.js"></script>
                 <model-viewer
                        id="scrollModel"
                        src="{{asset('public/front/images/models/SINGLE_TIED_EXPANSION_JOINT.glb')}}"
                       {{--src="./images/models/single_expansion_joint_logo.glb"--}}
                        alt="3D model of a single expansion joint"
                        shadow-intensity="1"
                        camera-controls
                        touch-action="pan-x pan-y"
                        exposure="0.5"
                        disable-zoom
                        auto-rotate
                        disable-tap
                        interaction-policy="allow-when-focused"
                        {{--camera-orbit="0deg 180deg 100%"--}}
                        interaction-prompt="none"
                          style="width:100%; height:400px;position:absolute; top:-55%;"
                    ></model-viewer>
            </div>
            <div class="col-lg-4"></div>
        </div>
        <div class="row  step-3 wow animate__animated animate__fadeInUp" >
            <div class="col-lg-4"></div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4 d-flex flex-column justify-content-end">
                   <h2 class="main_head text-start">Minimal Downtime</h2>
                  <p>Flexibel’s operations are structured for speed and continuity. Our <b>centralized UAE production facility</b>, combined with a <b>ready stock of raw materials</b> and an extensive design library, allows us to respond faster. In critical cases, this setup enables us to manufacture and dispatch within 24 hours, ensuring shutdowns are minimized and commissioning schedules are protected.</p>
            </div>
        </div>
        <div class="row  step-4 wow animate__animated animate__fadeInUp">
             <div class="col-lg-4 mt-4">
                <h2 class="main_head text-start">Maximum Resilience</h2>
                <p>Pipelines face constant stresses, pressure fluctuations, thermal expansion, vibration, and misalignment risks. Flexibel joints are engineered with precise material selection, robust weld integrity, and tailored movement capability to handle these conditions. The result is longer service life, fewer unplanned failures, and lower total cost of ownership across your operations.</p>
            </div>
            <!--<div class="col-md-6 mt-4 stop_model">-->

            <!--</div>-->
        </div>
    </div>
</section>
<!-- about -->

<!-- products -->
<!--<section class="products mt-100 our_Products_slider" id="list-item-4">-->
<!--    <div class="products_bg">-->
<!--        <div class="container">-->
<!--            <p class="sub_head">Our Products</p>-->
<!--            <h2 class="main_head">Reliability - Durability - Flexibility</h2>-->
<!--            <div class="prod_slider_wraper d-none d-md-block ">-->
<!--                <div class="products_slider">-->
<!--                    @foreach($home_product_slider as $index => $data)-->
<!--                    <div class="product_slide">-->
<!--                        <div class="row">-->
<!--                            <div class="col-lg-4 col-xl-4 col-xxl-4">-->
<!--                                <div>{!! $data->title !!}</div>-->
<!--                                 <h6>expansion joint</h6> -->
<!--                                <p class="my-lg-5 text-white">-->
<!--                                    {!! strip_tags(html_entity_decode($data->description ?? '' )) !!}-->
<!--                                </p>-->
<!--                                <a href="javascript:void(0)" class="prod_btn">-->
<!--                                    Explore Now-->
<!--                                    <span class="svg ms-2">-->
<!--                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14"-->
<!--                                            viewBox="0 0 13 14" fill="none">-->
<!--                                            <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white"-->
<!--                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />-->
<!--                                        </svg>-->
<!--                                    </span>-->
<!--                                </a>-->
<!--                            </div>-->
<!--                            <div class="col-lg-4 col-xl-4 col-xxl-4">-->
<!--                                <img src="{{ asset('public/home_product_slider/desktop/' . $data->image_desktop) }}" alt="{{ str_replace(['-', '_'],' ', pathinfo($data->desktop_alt_tag, PATHINFO_FILENAME)) }}" class="img-fluid">-->
<!--                            </div>-->
<!--                            <div class="col-lg-4 col-xl-4 col-xxl-4 ps-xxl-5">-->
<!--                                <ul class="product_points">-->
<!--                                    {!! $data->detail_description !!}-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    @endforeach-->
<!--                </div>-->
<!--                <div class="product_face">-->
<!--                    <div class="product_face_slider">-->
<!--                        @foreach($home_product_slider as $index => $data)-->
<!--                            <div class="product_face_slide">-->
<!--                                <img src="{{ asset('public/home_product_slider/mobile/' . $data->image_mobile) }}" alt="{{ str_replace(['-', '_'],' ', pathinfo($data->mobile_alt_tag, PATHINFO_FILENAME)) }}" class="img-fluid">-->
<!--                            </div>-->
<!--                        @endforeach-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="prod_slider_wraper d-block d-md-none ">-->
<!--                <div class="products_slider slider_slick_dots">-->
<!--                    @foreach($home_product_slider as $index => $data)-->
<!--                    <div class="product_slide">-->
<!--                        <ul class="nav nav-pills mb-3" id="pills-tab{{ $index }}" role="tablist">-->
<!--                            <li class="nav-item" role="presentation">-->
<!--                                <button class="nav-link active" id="Overview-tab{{ $index }}" data-bs-toggle="pill" data-bs-target="#pills-Overview{{ $index }}" type="button" role="tab" aria-controls="pills-Overview{{ $index }}" aria-selected="true">Overview</button>-->
<!--                            </li>-->
<!--                            <li class="nav-item" role="presentation">-->
<!--                                <button class="nav-link" id="Product-tab{{ $index }}" data-bs-toggle="pill" data-bs-target="#pills-Product{{ $index }}" type="button" role="tab" aria-controls="pills-Product{{ $index }}" aria-selected="false">Product</button>-->
<!--                            </li>-->
<!--                            <li class="nav-item" role="presentation">-->
<!--                                <button class="nav-link" id="range-tab{{ $index }}" data-bs-toggle="pill" data-bs-target="#pills-range{{ $index }}" type="button" role="tab" aria-controls="pills-range{{ $index }}" aria-selected="false">Operating Range</button>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                        <div class="tab-content" id="pills-tabContent{{ $index }}">-->
<!--                            <div class="tab-pane fade show active" id="pills-Overview{{ $index }}" role="tabpanel" aria-labelledby="Overview-tab{{ $index }}">-->
<!--                                <div class=" mt-4 mt-md-1 g-md-5">-->
<!--                                    <div>{!! $data->title !!}</div>-->
                                    
<!--                                    <p class="my-lg-5 text-white">-->
<!--                                        {!! strip_tags(html_entity_decode($data->description ?? '' )) !!}-->
                                        
<!--                                    </p>-->
<!--                                    <a href="javascript:void(0)" class="prod_btn">-->
<!--                                        Explore Now-->
<!--                                        <span class="svg ms-2">-->
<!--                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14"-->
<!--                                                viewBox="0 0 13 14" fill="none">-->
<!--                                                <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white"-->
<!--                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />-->
<!--                                            </svg>-->
<!--                                        </span>-->
<!--                                    </a>-->

<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="tab-pane fade" id="pills-Product{{ $index }}" role="tabpanel" aria-labelledby="Product-tab{{ $index }}">-->
<!--                                <div class=" mt-4 mt-md-1 g-md-5">-->
                                    
<!--                                    <img src="{{ asset('public/home_product_slider/desktop/' . $data->image_desktop) }}" alt="product" class="img-fluid">-->
                                
                                     
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="tab-pane fade" id="pills-range{{ $index }}" role="tabpanel" aria-labelledby="range-tab{{ $index }}">-->
<!--                                <div class=" mt-4 mt-md-1 g-md-5">-->
<!--                                    <ul class="product_points">-->
<!--                                        {!! $data->detail_description !!}-->
                                       
<!--                                    </ul>-->

<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    @endforeach-->
<!--                </div>-->

<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<section class="what_wedo mt-100 position-relative"  id="list-item-4">
    <div class="container-fluid">
            <h2 class="main_head wow animate__animated animate__fadeInUp" >Our Products</h2>
        <div class="hero_wrapper2">
            <div class="">
                <div class="what_wedo_slider slider_slick_dots">
                @foreach($home_product_slider as $index => $data)
                    <div class="slide">
                        <div class="row">
                            <div class="col-lg-4 col-xl-4 col-xxl-4">
                                <div class="text-white">{!! $data->title !!}</div>
                                 <!--<h6 class="text-white">expansion joint</h6> -->
                                <p class="mt-lg-5 mb-lg-3 text-white">
                                    {!! strip_tags(html_entity_decode($data->description ?? '' )) !!}
                                </p>
                                <a href="{{ route('products.by.category', ['category' => $data->category->url]) }}" class="prod_btn mb-2"> 
                                    Explore Products
                                    <span class="svg ms-2">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.36917 12.6559L12.6903 1.33423M12.6903 1.33423H2.69035M12.6903 1.33423V12.2433" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                                    </span>
                                </a> <br/>
                                
                                <a href="{{route('contact-us')}}"  onclick="setScrollFlag()" class="prod_btn"> 
                                    Enquire Now
                                    <span class="svg ms-2">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.36917 12.6559L12.6903 1.33423M12.6903 1.33423H2.69035M12.6903 1.33423V12.2433" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                                    </span>
                                </a>
                            </div>
                            <div class="col-lg-4 col-xl-4 col-xxl-4 d-flex align-items-center">
                                <img src="{{ asset('public/home_product_slider/desktop/' . $data->image_desktop) }}" alt="{{ str_replace(['-', '_'],' ', pathinfo($data->desktop_alt_tag, PATHINFO_FILENAME)) }}" class="img-fluid op_img mx-auto" loading="lazy">
                            </div>
                            <div class="col-lg-4 col-xl-4 col-xxl-4 ">
                                <div class="table-responsive">
                                    {!! $data->detail_description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </div>

            <div class="what_wedocustom_nav">
                <div class="containers">
                    <div class="nav-item" data-slide="0">
                        <div class="what_wedo_item">
                            <p class="mb-0">01</p>
                            <h3>Metallic
                            Expansion Joint</h3>
                        </div>
                    </div>
                    <div class="nav-item" data-slide="1">
                        <div class="what_wedo_item">
                            <p class="mb-0">02</p>
                            <h3>Rubber Expansion Joints </h3>
                        </div>
                    </div>
                    <div class="nav-item" data-slide="2">
                        <div class="what_wedo_item">
                            <p class="mb-0">03</p>
                            <h3>Fabric Expansion Joints</h3>
                        </div>
                    </div>
                    <div class="nav-item" data-slide="3">
                        <div class="what_wedo_item">
                            <p class="mb-0">04</p>
                            <h3>Metal Hoses </h3>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
</section>
<!-- products -->

<!-- stats -->
<section class="stats mt-100" id="list-item-5">
    <div class="container">
        <h2 class="main_head">Statistics</h2>
        <div class="stats_box">
            <div class="stats_item">
                <div class="count"><span data-target="98">0</span>%</div>
                <h3 class="sub_title">Client Satisfaction Rate</h3>
                <p>Industry-leading reliability, backed by your feedback.</p>
            </div>
            <div class="stats_item">
                <div class="count"><span data-target="10000">0</span>+</div>
                <h3 class="sub_title">Mission-Critical Units Deployed</h3>
                <p>Trusted where failure is not an option.</p>
            </div>
            <div class="stats_item">
                <div class="count"><span data-target="99">0</span>%</div>
                <h3 class="sub_title">On-time Delivery</h3>
                <p>Trusted by businesses for consistent, timely delivery.</p>
            </div>
            <div class="stats_item">
                <div class="count"><span data-target="20">0</span>%</div>
                <h3 class="sub_title">Faster Turn around </h3>
                <p>Because downtime costs more than just time.</p>
            </div>
        </div>
    </div>
</section>
<!-- What We Do -->
<section class="products mt-100 our_Products_slider pb-0" id="list-item-6">
    <div class="products_bg">
        <div class="container">
            <!--<p class="sub_head">What We Do</p>-->
            <!--<h2 class="main_head">Our Services</h2>-->
              <!--<div class="Services_slider slider_slick_dots">-->
              <!--          <div class="Services_slide col-md-4 text-center">-->
              <!--               <div class="Services_slide_box">-->
              <!--                      <div class="">-->
              <!--                          <h2 class="test_name">Engineering & Design</h2>-->
              <!--                          <p>Expansion joints engineered for operating conditions, not assumptions. From application analysis to custom geometry and material selection, we design to EJMA and international codes for precise, reliable performance.</p>-->
              <!--                      </div>-->

              <!--                      <a href="javascript:void(0)" class="prod_btn">-->
              <!--                          Learn More-->
              <!--                          <span class="svg ms-2">-->
              <!--                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14"-->
              <!--                                  viewBox="0 0 13 14" fill="none">-->
              <!--                                  <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white"-->
              <!--                                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />-->
              <!--                              </svg>-->
              <!--                          </span>-->
              <!--                      </a>-->
                                     
              <!--              </div>-->

              <!--          </div>-->
              <!--          <div class="Services_slide col-md-4 text-center">-->
              <!--              <div class="Services_slide_box">-->
              <!--                      <div>-->
              <!--                          <h2 class="test_name">Inspection & QA</h2>-->
              <!--                          <p>Every joint verified before service. Our inspection and quality assurance programs cover fabrication checks, traceability, and on-site validation to prevent early failures and protect uptime.</p>-->
              <!--                      </div>-->

              <!--                      <a href="javascript:void(0)" class="prod_btn">-->
              <!--                          Learn More-->
              <!--                          <span class="svg ms-2">-->
              <!--                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14"-->
              <!--                                  viewBox="0 0 13 14" fill="none">-->
              <!--                                  <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white"-->
              <!--                                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />-->
              <!--                              </svg>-->
              <!--                          </span>-->
              <!--                      </a>-->
              <!--              </div>-->
              <!--          </div>-->
              <!--          <div class="Services_slide col-md-4 text-center">-->
              <!--              <div class="Services_slide_box">-->
              <!--                      <div>-->
              <!--                          <h2 class="test_name">Comprehensive Audit</h2>-->
              <!--                          <p>Know the true condition of your installed joints. FlexAudit™ delivers assessments, compliance verification, and risk reports. Service Level Agreements (SLAs) can be built in, ensuring scheduled inspections and maintenance support for long-term assurance.</p>-->
              <!--                      </div>-->

              <!--                      <a href="javascript:void(0)" class="prod_btn">-->
              <!--                          Learn More-->
              <!--                          <span class="svg ms-2">-->
              <!--                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14"-->
              <!--                                  viewBox="0 0 13 14" fill="none">-->
              <!--                                  <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white"-->
              <!--                                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />-->
              <!--                              </svg>-->
              <!--                          </span>-->
              <!--                      </a>-->
              <!--              </div>-->
              <!--          </div>-->
              <!--          <div class="Services_slide col-md-4 text-center">-->
              <!--              <div class="Services_slide_box">-->
              <!--                      <div>-->
              <!--                          <h2 class="test_name">Field Services & Repair</h2>-->
              <!--                          <p>Support that extends beyond delivery. From installation supervision and fit-up checks to emergency replacements, clamshell repairs, and on-site refurbishment, our teams ensure joints are installed, aligned, and restored to service quickly and safely.</p>-->
              <!--                      </div>-->

              <!--                      <a href="javascript:void(0)" class="prod_btn">-->
              <!--                          Learn More-->
              <!--                          <span class="svg ms-2">-->
              <!--                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14"-->
              <!--                                  viewBox="0 0 13 14" fill="none">-->
              <!--                                  <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white"-->
              <!--                                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />-->
              <!--                              </svg>-->
              <!--                          </span>-->
              <!--                      </a>-->
              <!--              </div>-->
              <!--          </div>-->
              <!--          <div class="Services_slide col-md-4 text-center">-->
              <!--              <div class="Services_slide_box">-->
              <!--                      <div>-->
              <!--                          <h2 class="test_name">Emergency & Turnaround Support</h2>-->
              <!--                          <p>When downtime isn’t an option, we deliver. UAE-based production, stocked materials, and a rapid-response team allow 24–48 hour emergency builds and shutdown support.</p>-->
              <!--                      </div>-->

              <!--                      <a href="javascript:void(0)" class="prod_btn">-->
              <!--                          Learn More-->
              <!--                          <span class="svg ms-2">-->
              <!--                              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14"-->
              <!--                                  viewBox="0 0 13 14" fill="none">-->
              <!--                                  <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white"-->
              <!--                                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />-->
              <!--                              </svg>-->
              <!--                          </span>-->
              <!--                      </a>-->
              <!--              </div>-->
              <!--          </div>-->
              <!--      </div>-->
              <div class="row">
                  <div class="col-md-6 mb-4">
                      <div class="our_serv_header">
                          <div>
                              <p class="sub_head">What We Do</p>
                          <h2 class="main_head mb-0">Our Services</h2>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6 mb-4">
                      <div class="our_serv_box">
                          <a class="Services_slide_box" href="javascript:void(0)">
                                    <div class="">
                                        <h2 class="test_name">Engineering & Design</h2>
                                        <p class="mb-0">Expansion joints engineered for operating conditions, not assumptions. From application analysis to custom geometry and material selection, we design to EJMA and international codes for precise, reliable performance.</p>
                                    </div>

                                    <!--<a href="javascript:void(0)" class="prod_btn">-->
                                    <!--    Learn More-->
                                    <!--    <span class="svg ms-2">-->
                                    <!--        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">-->
                                    <!--            <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>-->
                                    <!--        </svg>-->
                                    <!--    </span>-->
                                    <!--</a>-->
                                     
                            </a>
                      </div>
                  </div>
                  <div class="col-md-6 mb-4">
                      <a class="Services_slide_box" href="javascript:void(0)">
                                    <div>
                                        <h2 class="test_name">Inspection &amp; QA</h2>
                                        <p class="mb-0">Every joint verified before service. Our inspection and quality assurance programs cover fabrication checks, traceability, and on-site validation to prevent early failures and protect uptime.</p>
                                    </div>

                                    <!--<a href="javascript:void(0)" class="prod_btn" tabindex="0">-->
                                    <!--    Learn More-->
                                    <!--    <span class="svg ms-2">-->
                                    <!--        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">-->
                                    <!--            <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>-->
                                    <!--        </svg>-->
                                    <!--    </span>-->
                                    <!--</a>-->
                            </a>
                  </div>
                  <div class="col-md-6 mb-4">
                      <a class="Services_slide_box" href="javascript:void(0)">
                                    <div>
                                        <h2 class="test_name">Comprehensive Audit</h2>
                                        <p class="mb-0">Know the true condition of your installed joints. FlexAudit™ delivers assessments, compliance verification, and risk reports. Service Level Agreements (SLAs) can be built in, ensuring scheduled inspections and maintenance support for long-term assurance.</p>
                                    </div>

                                    <!--<a href="javascript:void(0)" class="prod_btn" tabindex="0">-->
                                    <!--    Learn More-->
                                    <!--    <span class="svg ms-2">-->
                                    <!--        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">-->
                                    <!--            <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>-->
                                    <!--        </svg>-->
                                    <!--    </span>-->
                                    <!--</a>-->
                            </a>
                  </div>
                  <div class="col-md-6 mb-4">
                      <a class="Services_slide_box" href="javascript:void(0)">
                                    <div>
                                        <h2 class="test_name">Field Services & Repair</h2>
                                        <p class="mb-0">Support that extends beyond delivery. From installation supervision and fit-up checks to emergency replacements, clamshell repairs, and on-site refurbishment, our teams ensure joints are installed, aligned, and restored to service quickly and safely.</p>
                                    </div>

                                    <!--<a href="javascript:void(0)" class="prod_btn" tabindex="0">-->
                                    <!--    Learn More-->
                                    <!--    <span class="svg ms-2">-->
                                    <!--        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">-->
                                    <!--            <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>-->
                                    <!--        </svg>-->
                                    <!--    </span>-->
                                    <!--</a>-->
                            </a>
                  </div>
                  <div class="col-md-6 mb-4">
                      <a class="Services_slide_box" href="javascript:void(0)">
                                    <div>
                                        <h2 class="test_name">Emergency & Turnaround Support</h2>
                                        <p class="mb-0">When downtime isn’t an option, we deliver. UAE-based production, stocked materials, and a rapid-response team allow 24–48 hour emergency builds and shutdown support.</p>
                                    </div>

                                    <!--<a href="javascript:void(0)" class="prod_btn" tabindex="0">-->
                                    <!--    Learn More-->
                                    <!--    <span class="svg ms-2">-->
                                    <!--        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">-->
                                    <!--            <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>-->
                                    <!--        </svg>-->
                                    <!--    </span>-->
                                    <!--</a>-->
                            </a>
                  </div>
              </div>
        </div>
    </div>
</section>
<!-- What We Do -->
<!-- industries -->
  <section class="industries mt-100 pb-4 d-none" id="list-item-7">
    <div class="container">
        <p class="sub_head">Diverse Industries Served</p>
        <h2 class="main_head">Durable solutions for rigid applications</h2>
        <p class="text-center">Our State of the art fabrication premise , In-House Design Team and Professional
            Technical Personnel assures You the Best!.</p>
            <div class="d-md-none d-block text-center mb-4">
            <a href="{{route('industries')}}" class="prod_btn" tabindex="0">
                Explore Now
                <span class="svg ms-2">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.36917 12.6559L12.6903 1.33423M12.6903 1.33423H2.69035M12.6903 1.33423V12.2433" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                </span>
            </a>
        </div>
        <div class="industries_slider">
            @foreach ($industry_home_slider as $slider)
                @php
                    $desktopImages = $slider->image ?? [];
                    $mobileImages = $slider->mobile_image ?? [];
                @endphp

                @foreach ($desktopImages as $index => $desktopImage)
                    <div class="industries_slide">
                        <div class="ind_slide_img">
                            <picture>
                                @if (!empty($mobileImages[$index]))
                                    <source media="(max-width: 767px)" srcset="{{ asset('public/Industry_Home_Slider/mobile/' . $mobileImages[$index]) }}">
                                @endif
                                <source media="(min-width: 768px)" srcset="{{ asset('public/Industry_Home_Slider/desktop/' . $desktopImage) }}">
                                <img src="{{ asset('public/Industry_Home_Slider/desktop/' . $desktopImage) }}" alt="{{ $slider->title }}" class="img-fluid" loading="lazy">
                            </picture>

                            <div class="indus_slide_content">
                                <div class="indus_left col-md-5">
                                    <h2 class="indus_head mb-2">{{ $slider->title }}</h2>
                                    <p class="text-white text-start">{{ html_entity_decode(strip_tags($slider->description ?? '')) }}</p>
                                </div>
                                <div class="indus_right col-md-5 d-none d-md-block">
                                    <a href="{{route('industries')}}" class="prod_btn" tabindex="0">
                                        Explore Now
                                        <span class="svg ms-2">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.36917 12.6559L12.6903 1.33423M12.6903 1.33423H2.69035M12.6903 1.33423V12.2433" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</section>
<!-- industries -->
<!-- testimonials -->
<section class="testimonials position-relative mt-100" id="list-item-8">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p class="sub_head">Testimonials</p>
                <h2 class="main_head">specification to satisfaction</h2>
                <div class="test_msg text-center">
                    <div class="test_msg_slider">
                        @foreach ($testimonials as $testimonial)
                        <div class="col-md-4 test_msg_slide">
                            <div class="testimonial-box">
                                {{-- <h3 class="sub_title">{{ $testimonial['title'] ?? 'Customer Testimonial'}}</h3> --}}
                                <div class="quote-icon">
                                        <i class="fa-solid fa-quote-left"></i>
                                    </div>
                                <p>{!! html_entity_decode($testimonial['description'] ?? 'Customer Testimonial') !!}</p>
                                <div class="test_writer">
                                    <div>
                                        <p class="test_name">{{ $testimonial['company_name'] ?? 'Anonymous' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    
                        {{-- <div class="test_msg_slide">
                            <h3 class="sub_title"> Quality and Service!</h3>
                            <p>We have been using Flexibellows products for years, and their expansion joints have
                                significantly improved our operations. The durability and precision of their designs are
                                unmatched. Highly recommended!</p>
                            <div class="test_writer">
                                <div>
                                    <p class="test_name">Sumita Thompson</p>
                                    <p class="test_post">Project Engineer</p>
                                </div>
                            </div>
                        </div>
                        <div class="test_msg_slide">
                            <h3 class="sub_title">Exceptional Quality and Service!</h3>
                            <p>We have been using Flexibellows products for years, and their expansion joints have
                                significantly improved our operations. The durability and precision of their designs are
                                unmatched. Highly recommended!</p>
                            <div class="test_writer">
                                <div>
                                    <p class="test_name">kc Thompson</p>
                                    <p class="test_post">Project Engineer</p>
                                </div>
                            </div>
                        </div>
                        <div class="test_msg_slide">
                            <h3 class="sub_title">Exceptional Quality and Service!</h3>
                            <p>We have been using Flexibellows products for years, and their expansion joints have
                                significantly improved our operations. The durability and precision of their designs are
                                unmatched. Highly recommended!</p>
                            <div class="test_writer">
                                <div>
                                    <p class="test_name">mm Thompson</p>
                                    <p class="test_post">Project Engineer</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="text-center pt-md-4">
                        <a href="javascript:void(0)" class="prod_btn" data-bs-toggle="modal" data-bs-target="#testimonialModal" tabindex="0">
                            Know More
                            <span class="svg ms-2">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.36917 12.6559L12.6903 1.33423M12.6903 1.33423H2.69035M12.6903 1.33423V12.2433" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                            </span>
                        </a>
                    </div>
                </div>
                <!--<div class="test_face">-->
                <!--    <div class="test_face_slider">-->
                <!--        <div class="test_face_slide">-->
                <!--            <div class="face_slide_bg">-->
                <!--                <img src="./images/test_1.svg" alt="testimonial" class="img-fluid">-->
                <!--                <svg class="progress-circle">-->
                <!--                    <circle class="circle-bg" cx="40" cy="40" r="35"></circle>-->
                <!--                    <circle class="circle-progress" cx="40" cy="40" r="35"></circle>-->
                <!--                </svg>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="test_face_slide">-->
                <!--            <div class="face_slide_bg">-->
                <!--                <img src="./images/test_1.svg" alt="testimonial" class="img-fluid">-->
                <!--                <svg class="progress-circle">-->
                <!--                    <circle class="circle-bg" cx="40" cy="40" r="35"></circle>-->
                <!--                    <circle class="circle-progress" cx="40" cy="40" r="35"></circle>-->
                <!--                </svg>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="test_face_slide">-->
                <!--            <div class="face_slide_bg">-->
                <!--                <img src="./images/test_1.svg" alt="testimonial" class="img-fluid">-->
                <!--                <svg class="progress-circle">-->
                <!--                    <circle class="circle-bg" cx="40" cy="40" r="35"></circle>-->
                <!--                    <circle class="circle-progress" cx="40" cy="40" r="35"></circle>-->
                <!--                </svg>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--        <div class="test_face_slide">-->
                <!--            <div class="face_slide_bg">-->
                <!--                <img src="./images/test_1.svg" alt="testimonial" class="img-fluid">-->
                <!--                <svg class="progress-circle">-->
                <!--                    <circle class="circle-bg" cx="40" cy="40" r="35"></circle>-->
                <!--                    <circle class="circle-progress" cx="40" cy="40" r="35"></circle>-->
                <!--                </svg>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
            <div class="col-lg-1 col-xl-1 d-none d-lg-block"></div>
        </div>
    </div>
</section>
<!-- testimonials -->
<!-- environment -->

<section class="sus environment mt-100" id="list-item-9">
    <div class="container-fluid">
         <p class="sub_head">Environmental Responsibility</p>
        <h2 class="main_head">Sustainability</h2>
        <div class="sus_wrapper mobile_slider slider_slick_dots">
            <div class="sus_box sus_1 active">
                <div>
                    
                    <img src="{{asset('public/front/images/sus1.png')}}" alt="Globe Green Initiatives" class="img-fluid" loading="lazy">
                </div>
                <div>
                    <h2 class="blog_detailsub_head text-white">Environmental</h2>
                    <p>
                       Zero-waste commitment: 95% of manufacturing scrap metal recycled and repurposed.ISO 14001 certified for robust environmental management practices.Water stewardship: Closed-loop cooling systems implemented, reducing freshwater use by 25%.
                    </p>
                </div>
            </div>
            <div class="sus_box sus_2">
                <div>
                    <img src="{{asset('public/front/images/sus2.png')}}" alt="Start Green initiatives" class="img-fluid" loading="lazy">
                </div>
                <div>
                    <h2 class="blog_detailsub_head text-white">Social</h2>
                    <p>
                        Local sourcing: 50% of raw materials procured from regional SMEs to boost economic growth.Workforce empowerment: Regular training and upskilling programs for employees at all levels.Community engagement: Actively supporting regional initiatives that promote education and sustainability.
                       
                    </p>
                </div>
            </div>
            <div class="sus_box sus_3">
                <div>
                    <img src="{{asset('public/front/images/sus3.png')}}" alt="Green initiatives" class="img-fluid" loading="lazy">
                </div>
                <div>
                    <h2 class="blog_detailsub_head text-white">Governance</h2>
                    <p>
                        Client data safeguarded with 100% GDPR and regional privacy law compliance.Supplier Code of Conduct: Mandatory vendor signing ensures fair pricing and ethical practices.Strong compliance: 100% of contracts reviewed for anti- bribery and anti-corruption compliance.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- SUS -->
<!-- environment -->
<!--<h2>Instagram Feed</h2>-->
            
<!-- linedin -->
@if (!empty($feed) && count($feed) > 0)
<section class="linkedin mt-100" id="list-item-10">
    <div class="container">
        <div class="row align-items-center mb-lg-0 mb-5">
            <div class="col-lg-8">
                <p class="sub_head ms-0">LinkedIn Feed</p>
                <h2 class="main_head text-start">LinkedIn Newest Insights</h2>
            </div>
            <div class="col-lg-4 d-flex justify-content-left justify-content-md-end">
                <div class="linkedin_btn me-5">
                    <a href="{{ route('view.feeds') }}" class="comman-btn">
                        <span class="default-text">View All Feeds</span>
                        <div class="hover-content">
                            <span>View All Feeds</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row g-4 mobile_slider slider_slick_dots">
            @foreach (collect($feed)->slice(0, 3) as $post)
                @php
                    $description = $post['text']['text'] ?? '';

                    $media = $post['content']['contentEntities'][0]['thumbnails'][0]['imageSpecificContent']['url']
                        ?? $post['content']['contentEntities'][0]['entityLocation']
                        ?? asset('images/default-placeholder.jpg');

                    $activityUrn = $post['activity'] ?? ($post['id'] ?? '');
                    preg_match('/urn:li:activity:(\d+)/', $activityUrn, $matches);
                    $activityId = $matches[1] ?? null;

                    if (!$activityId) {
                        preg_match('/urn:li:share:(\d+)/', $activityUrn, $matches);
                        $activityId = $matches[1] ?? null;
                    }

                    $permalink = $activityId
                        ? "https://www.linkedin.com/feed/update/urn:li:activity:$activityId"
                        : '#';
                @endphp

                <div class="col-lg-4 d-flex">
                    <div style="border: 1px solid #ccc; padding: 10px; border-radius: 5px">
                        @if ($media)
                            <img src="{{ $media }}" alt="LinkedIn Image" class="linkedin_img img-fluid" loading="lazy">
                        @endif

                        @if (!empty($description))
                            <p class="mt-3" style="font-size: 16px">
                                {{ Str::limit($description, 100) }}
                            </p>
                        @endif

                        <div class="text-center">
                            <a href="{{ $permalink }}" target="_blank" class="prod_btn">
                                View on LinkedIn
                                <span class="svg ms-2">
                                    <!-- SVG -->
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    <!--<div class="row expansion_slider slider_slick_dots">-->
    <!--    <div class="col-lg-4 mb-lg-0 mb-3">-->
    <!--        <div class="linkedin-card">-->
    <!--            <img src="{{asset('public/front/images/linkedin_post.png')}}" alt="linkedin" class="img-fluid">-->
    <!--            <div class="linkedin-content">-->
    <!--                <p><strong>DN1200</strong> – Designed, Manufactured, Tested and Supplied for Power plant in-->
    <!--                    Middle East.</p>-->
    <!--            </div>-->
    <!--        </div>-->

    <!--    </div>-->
    <!--    <div class="col-lg-4 mb-lg-0 mb-3">-->
    <!--        <div class="linkedin-card">-->
    <!--            <img src="{{asset('public/front/images/linkedin_post.png')}}" alt="linkedin" class="img-fluid">-->
    <!--            <div class="linkedin-content">-->
    <!--                <p><strong>DN1200</strong> – Designed, Manufactured, Tested and Supplied for Power plant in-->
    <!--                    Middle East.</p>-->
    <!--            </div>-->
    <!--        </div>-->

    <!--    </div>-->
    <!--    <div class="col-lg-4 mb-lg-0 mb-3">-->
    <!--        <div class="linkedin-card">-->
    <!--            <img src="{{asset('public/front/images/linkedin_post.png')}}" alt="linkedin" class="img-fluid">-->
    <!--            <div class="linkedin-content">-->
    <!--                <p><strong>DN1200</strong> – Designed, Manufactured, Tested and Supplied for Power plant in-->
    <!--                    Middle East.</p>-->
    <!--            </div>-->
    <!--        </div>-->

    <!--    </div>-->
    <!--</div>-->
</section>
@endif

<!-- linedin -->

<!-- certificate -->
<section class="certificate mt-100" id="list-item-11">
    <div class="container">
        <h2 class="main_head">Approved By</h2>
        <div class="certi_slider">
            @foreach ($certificates as $certificate)
                <div class="certi_slide">
                    <img src="{{ asset('public/home_certificate/'.$certificate->image)}}" alt="{{  str_replace(['-', '_'],' ', pathinfo($certificate->image, PATHINFO_FILENAME)) }}" class="img-fluid" style="max-height:60px;" loading="lazy">
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- certificate -->
</div>
<!--adipec popup-->

<!-- Modal -->
<!--<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--  <div class="modal-dialog modal-dialog-centered">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-header border-0 p-0">-->
<!--        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style=" position: absolute; right: 5%; top: 6%; z-index: 99; opacity: 1;scale: 0.8;filter: invert(1);"></button>-->
<!--      </div>-->
<!--      <div class="modal-body">-->
<!--         <a href="https://www.adipec.com/" target="_blank">-->
<!--            <img src="{{asset('public/front/images/intro_poup.jpg')}}" class="img-fluid">-->
<!--        </a>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
<!--<script>-->
<!--  document.addEventListener("DOMContentLoaded", function() {-->
<!--    setTimeout(function() {-->
<!--      var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));-->
<!--      myModal.show();-->
    <!--}, 2000); // 2000ms = 2 seconds-->
<!--  });-->
<!--</script>-->
<!--adipec popup-->
@include('layouts.footer')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const asideBar = document.querySelector('.aside-bar');
        const section1 = document.querySelector('#list-item-1');
        const footer = document.querySelector('footer');

        let isSection1Visible = false;
        let isFooterVisible = false;

        const checkVisibility = () => {
            if (isSection1Visible || isFooterVisible) {
                asideBar.classList.add('hidden');
            } else {
                asideBar.classList.remove('hidden');
            }
        };

        const observerOptions = {
            threshold: 0.1
        };

        const sectionObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                isSection1Visible = entry.isIntersecting;
                checkVisibility();
            });
        }, observerOptions);

        const footerObserver = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                isFooterVisible = entry.isIntersecting;
                checkVisibility();
            });
        }, observerOptions);

        sectionObserver.observe(section1);
        footerObserver.observe(footer);
    });
</script>
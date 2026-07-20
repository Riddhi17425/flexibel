@php
    $firstIndustry = $industries->first();

    $ogImage = (!empty($firstIndustry) && !empty($firstIndustry->image))
        ? url('public/industry_images/' . $firstIndustry->image)
        : null;
@endphp

@include('layouts.header', [
    'og_image' => $ogImage
])
<section>
    <div class="container">
         <div class="banner_wrapper">
            <!-- <picture>-->
            <!--    <source media="(max-width:992px)" srcset="{{asset('public/front/images/flexibel_banner/industries_m.webp')}}" alt="Industries banner" class="banner img-fluid bd_rd_10">-->
            <!--    <img src="{{asset('public/front/images/flexibel_banner/industries.webp')}}" alt="Industries banner" class="banner img-fluid bd_rd_10">-->
            <!--</picture>-->
            <!--<img src="{{ asset('public/front/images/industries_banner.png')}}" alt="Industries" class="banner img-fluid">-->
            <div class="banner_text">
                <div class="">
                    <!--<h1 class="main_head">Industries</h1>-->
                    <div class="breadcrumb d-none d-md-block">
                        <a href="{{url('/')}}">Home </a><a href="javascript:void(0)">&nbsp;| Industries</a>
                    </div>
                </div>
            </div>
         </div>
    </div>
</section>
<section class=" mt-100 ">
    <div class="container-fluid me-0">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12 ">
                <p class="sub_head ms-0">Industries we Serve</p>
                <h1 class="main_head text-start">Industries we Serve</h1>
                <p>
                    At Flexibel, our precision engineered expansion joints & metal bellows are designed to meet the stringent demands of today’s most challenging industrial environments. By compensating for thermal growth, vibration, misalignment and pressure fluctuations our products protect critical equipment along with extending service life and minimize costly downtime. Supported by in house manufacturing, advanced quality controls and decades of engineering expertise, we deliver bespoke bellows solutions that perform reliably whether you’re offshore or underground or in the heart of a processing plant.
                </p>
                <p>From concept a& material selection through fabrication and on-site installation, Flexibel partners with you at every step to ensure a perfect fit for your piping or ductwork system.</p>
            </div>
            <!--<div class="col-lg-5 pe-lg-0">-->
            <!--    <img src="{{ asset('public/front/images/tailored_solutions_for_sector.png')}}" alt="Tailored Solutions for Your Sector" class=" img-fluid">-->
            <!--</div>-->
        </div>
    </div>
</section>
<section class="mt-100 ">
    <div class="container">
        <div class="timeline">
            @foreach ($industries as $industry )
                <div class="timeline-item" id="timeline1">
                    <div class="timeline-icon"></div>
                    <div class="row ms-4">
                        <div class="label col-md-4">{{$industry->industry_name ?? 'No title available.'}}</div>
                        <div class="timeline-content col-md-8">
                            <h3 class="timeline_title">{{$industry->industry_name ?? 'No title available.'}}</h3>
                            <img src="{{ asset('public/industry_images/'.$industry->image)}}" alt="{{  str_replace(['-', '_'],' ', pathinfo($industry->alt_tag, PATHINFO_FILENAME)) }}" class="img-fluid" />
                            <p>{!! html_entity_decode($industry->description ?? 'No description available.') !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<script>
  function activateTimeline() {
    document.querySelectorAll(".timeline-item").forEach((item) => {
      const icon = item.querySelector(".timeline-icon");
      const label = item.querySelector(".label");
      const rect = item.getBoundingClientRect();

      if (rect.top < window.innerHeight / 2 && rect.bottom > 0) {
        icon.classList.add("active");
        label.classList.add("active");
      } else {
        icon.classList.remove("active");
        label.classList.remove("active");
      }
    });
  }

  window.addEventListener("scroll", activateTimeline);
  window.addEventListener("load", activateTimeline);
</script>
@include('layouts.footer')
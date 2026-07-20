@include('layouts.header')
@include('layouts.product_form')

<style>
   .image-wrapper {
  position: relative;
  cursor: none;
}

.custom-cursor {
  position: fixed;
  top: 0;
  left: 0;
  width: 120px;
  height: 120px;
  background-color: rgba(0, 0, 0, 0.75);
  color: #fff;
  border-radius: 50%;
  text-align: center;
  line-height: 120px;
  font-weight: bold;
  font-size: 14px;
  pointer-events: none;
  transform: translate(-50%, -50%);
  z-index: 9999;
  opacity: 0;
  transition: opacity 0.2s ease;
}
.hr_mr{margin:30px 0;}
model-viewer {
            width: 100%;
            height: 100%;
            margin: 0 auto;
            display: block;
            
        }

</style>

<div class="custom-cursor">360째 view</div>
<section>
    <div class="container">
        <div class="banner_wrapper">
    
            {{-- <img src="{{asset('public/front/images/mej_detail_banner.png')}}" alt="Metallic Expansion Joints" class="banner img-fluid"> --}}
            <div class="banner_text">
                <div class="">
                    
                    <div class="breadcrumb d-none d-md-block">
                        
                        <a href="{{url('/')}}">Home </a><a href="Javascript:void(0)">&nbsp;| Products</a><a href="Javascript:void(0)">&nbsp;| {{ \Illuminate\Support\Str::title(strtolower($product_detail->name ?? '')) }}</a><a
                            href="Javascript:void(0)">&nbsp;| {{$product_detail->title ?? ''}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mt-100">
    <div class="container">
        <p class="sub_head ms-0">{{$product_detail->title ?? ''}}</p>
        <h1 class="main_head text-start">{{$product_detail->name ?? ''}}</h1>
        {!! $product_detail->short_description ?? '' !!}
        <a href="{{route('enquiry-form')}}" class="prod_btn" data-bs-toggle="modal" data-bs-target="#productModal" tabindex="0">
            Enquire Now
            <span class="svg ms-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">
                    <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </span>
        </a>
    </div>
</section>

<section class="mt-100 product_subdetail">
    <div class="container-fluid">
        <div class="prod_slider_wraper d-none d-md-block">
            <div class="product_slide">
                <div class="row">
                    <div class="col-lg-4 ">
                        {!! $product_detail->product_title !!}
                        <div class="my-lg-5 text-white">
                            {!! $product_detail->product_description !!}
                        </div>
                        @if(!empty($product_detail->pdf))
                        <a href="{{ asset('public/products/pdfs/' . $product_detail->pdf) }}" target="_blank" class="prod_btn">
                            Technical Datasheet
                            <span class="svg ms-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                    fill="none">
                                    <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                        @endif
                    </div>
                    <div class="col-lg-4 image-wrapper text-center">
                        <a class="productwrapperModel" 
                            <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/4.0.0/model-viewer.min.js"></script>
                            <model-viewer
                              class="productModel"
                                data-variant="1"
                                src="{{ asset('public/products/3d_images/' . $product_detail->image_3d) }}"
                                alt="{{ trim(preg_replace('/\s+/', ' ', strip_tags($product_detail->product_title))) }}"
                                reveal="auto"
                                loading="lazy"
                                auto-rotate
                                shadow-intensity="1"
                                camera-controls="pan-x pan-y"
                                touch-action="none"
                                exposure="0.8"
                                disable-zoom
                                disable-tap
                                interaction-policy="always-allow"
                                camera-orbit="0deg 90deg 100%">
                            </model-viewer>
                            @if ($product_detail->subcategory_id)
                                <model-viewer
                                   class="productModel"
                                    data-variant="2"
                                    src="{{ asset('public/product_subcategory/image/'.$product_detail->subcategory->image) }}"
                                    alt="{{ trim(preg_replace('/\s+/', ' ', strip_tags($product_detail->product_title))) }}"
                                    reveal="auto"
                                    loading="lazy"
                                    auto-rotate
                                    shadow-intensity="1"
                                    camera-controls="pan-x pan-y"
                                    touch-action="none"
                                    exposure="0.8"
                                    disable-zoom
                                    disable-tap
                                    interaction-policy="always-allow"
                                    camera-orbit="0deg 90deg 100%"
                                    style="display:none;">
                                </model-viewer>
                            @endif
                        </a>

 <!-- Toggle Buttons -->
    @if ($product_detail->subcategory_id)
        <div class="product-switch">
            <div class="form-check form-switch mt-3 d-flex justify-content-center align-items-center gap-2">
            <label class="form-check-label" for="modelToggle">{{ \Illuminate\Support\Str::before($product_detail->title, '/') }}</label>
            <input class="form-check-input custom-switch modelToggle" type="checkbox" >
            <label class="form-check-label" for="modelToggle">{{$product_detail->subcategory->name}}</label>
          </div>
        </div>
    @endif                 
                    </div>
                    <div class="col-lg-4">
                        {!! $product_detail->product_detail_desc !!}
                        
                    </div>
                </div>
            </div>
        </div>
            <div class="prod_slider_wraper d-block d-md-none ">
                <div class="products_slider ">
                    <div class="product_slide">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="Overview-tab" data-bs-toggle="pill" data-bs-target="#pills-Overview" type="button" role="tab" aria-controls="pills-Overview" aria-selected="true">Overview</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="Product-tab" data-bs-toggle="pill" data-bs-target="#pills-Product" type="button" role="tab" aria-controls="pills-Product" aria-selected="false">Product</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="range-tab" data-bs-toggle="pill" data-bs-target="#pills-range" type="button" role="tab" aria-controls="pills-range" aria-selected="false">Operating Range</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-Overview" role="tabpanel" aria-labelledby="Overview-tab">
                                <div class=" mt-4 mt-md-1 g-md-5 text-white">
                                    {{-- <h2 class="main_head">Metallic</h2>
                                    <h6>expansion joint</h6> --}}
                                       {!! $product_detail->product_title !!}
                                    <p class="my-lg-5 text-white">
                                       {!! $product_detail->product_description !!}
                                    </p>
                                    <!--<a href="javascript:void(0)" class="prod_btn">-->
                                    <!--    Explore Now-->
                                    <!--    <span class="svg ms-2">-->
                                    <!--        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14"-->
                                    <!--            viewBox="0 0 13 14" fill="none">-->
                                    <!--            <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white"-->
                                    <!--                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />-->
                                    <!--        </svg>-->
                                    <!--    </span>-->
                                    <!--</a>-->

                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-Product" role="tabpanel" aria-labelledby="Product-tab">
                                <div class=" mt-4 mt-md-1 g-md-5 mb-5">
                                
                                   
                                   <a class="productwrapperModel" >
                                      <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/4.0.0/model-viewer.min.js"></script>

                                        <model-viewer
                                        class="productModel"
                                          data-variant="1"
                                            src="{{ asset('public/products/3d_images/' . $product_detail->image_3d) }}"
                                            @if(!empty($product_detail->image_3d_ios))
                                                ios-src="{{ asset('products/3d_images/' . $product_detail->image_3d_ios) }}"
                                            @endif
                                            alt="{{ strip_tags($product_detail->product_title) }}"
                                            auto-rotate
                                            shadow-intensity="1"
                                            camera-controls
                                            interaction-policy="always-allow"
                                            style="width:100%; height:400px;display:block;">
                                        </model-viewer>
                                    </a>
                                    @if ($product_detail->subcategory_id)
                                        <a class="productwrapperModel">
                                            <model-viewer
                                             class="productModel"
                                              data-variant="2"
                                                src="{{ asset('public/product_subcategory/image/'.$product_detail->subcategory->image) }}"
                                               
                                                alt="{{ strip_tags($product_detail->subcategory->name) }}"
                                                auto-rotate
                                                shadow-intensity="1"
                                                camera-controls
                                                interaction-policy="always-allow"
                                                style="width:100%; height:400px; display:none;">
                                            </model-viewer>
                                        </a>
                                    @endif
                                    @if ($product_detail->subcategory_id)
                                        <div class="product-switch">
                                            <div class="form-check form-switch mt-3 d-flex justify-content-center align-items-center gap-2">
                                            <label class="form-check-label" for="modelToggle">{{ \Illuminate\Support\Str::before($product_detail->title, '/') }}</label>
                                            <input class="form-check-input custom-switch modelToggle" type="checkbox" >
                                            <label class="form-check-label" for="modelToggle">{{$product_detail->subcategory->name}} </label>
                                          </div>
                                        </div>
                                        @endif
                                   
                                </div> 
                            </div>
                            <div class="tab-pane fade" id="pills-range" role="tabpanel" aria-labelledby="range-tab">
                                <div class=" mt-4 mt-md-1 g-md-5 ">
                                    {!! $product_detail->product_detail_desc !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>
<section class="mt-100 ">
    <div class="container">
      <div class="paroduct-tab"> 
          <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-application-tab" data-bs-toggle="pill" data-bs-target="#pills-application" type="button" role="tab" aria-controls="pills-application" aria-selected="true">{{$product_detail->app_heading ?? ''}}</button>
            </li>
            
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-advantages-tab" data-bs-toggle="pill" data-bs-target="#pills-advantages" type="button" role="tab" aria-controls="pills-advantages" aria-selected="false">{{$product_detail->adv_heading ?? ''}}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-accessories-tab" data-bs-toggle="pill" data-bs-target="#pills-accessories" type="button" role="tab" aria-controls="pills-accessories" aria-selected="false">{{$product_detail->item_desc_heading ?? ''}}</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-application" role="tabpanel" aria-labelledby="pills-application-tab">
                <div class="row">
                     {!! $product_detail->application !!}
                </div>
            </div>
           
            <div class="tab-pane fade" id="pills-advantages" role="tabpanel" aria-labelledby="pills-advantages-tab">
                <div class="row">
                     <div class="two-col-list">
                         {!! $product_detail->adv_description ?? ''!!}
                     </div>
                </div>
                
            </div>
            <div class="tab-pane fade" id="pills-accessories" role="tabpanel" aria-labelledby="pills-accessories-tab">
                <div class="row gx-5 gy-4 gy-lg-0">
            <div class="col-lg-6">
                <img src="{{asset('public/products/adv_image/'.$product_detail->adv_image)}}" alt="{{  str_replace(['-', '_'],' ', pathinfo($product_detail->adv_image, PATHINFO_FILENAME)) }}" class="img-fluid">
            </div>
            <div class="col-lg-6">
                {!! $product_detail->item_description ?? ''!!} 
            </div>
        </div>
            </div>

        </div>
      </div>
        
    </div>
</section>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('3dModal');
        const modelViewer = modal.querySelector('model-viewer');
        const modalTitle = document.getElementById('exampleModalLabel');

        modal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const modelSrc = button.getAttribute('data-src');
            const title = button.getAttribute('data-title');

            modelViewer.src = modelSrc;
            modalTitle.textContent = title;
        });
    });
</script>
    <script>
  const customCursor = document.querySelector('.custom-cursor');
  const image = document.querySelector('.product-image');

  document.addEventListener('mousemove', (e) => {
    customCursor.style.left = `${e.clientX}px`;
    customCursor.style.top = `${e.clientY}px`;
  });

  image.addEventListener('mouseenter', () => {
    customCursor.style.opacity = 1;
  });

  image.addEventListener('mouseleave', () => {
    customCursor.style.opacity = 0;
  });
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  function centerActiveTab(container) {
    const active = container.querySelector('.nav-link.active');
    if (!active) return;

    const containerRect = container.getBoundingClientRect();
    const activeRect = active.getBoundingClientRect();

    const scrollLeft = container.scrollLeft + 
      (activeRect.left - containerRect.left) - 
      (container.clientWidth / 2 - active.offsetWidth / 2);

    container.scrollTo({
      left: scrollLeft,
      behavior: 'smooth'
    });
  }

  document.querySelectorAll('.paroduct-tab .nav-pills').forEach(pills => {
    pills.addEventListener('shown.bs.tab', function () {
      centerActiveTab(pills);
    });
  });
});

</script>

<script>
document.addEventListener("change", function(e) {
  if (e.target.classList.contains("modelToggle")) {
    const wrapper = e.target.closest(".tab-pane, .col-lg-4, .mt-4"); 
    const models = wrapper.querySelectorAll(".productModel");

    if (e.target.checked) {
      models.forEach(m => {
        if (m.dataset.variant === "1") m.style.display = "none";
        if (m.dataset.variant === "2") m.style.display = "block";
      });
    } else {
      models.forEach(m => {
        if (m.dataset.variant === "1") m.style.display = "block";
        if (m.dataset.variant === "2") m.style.display = "none";
      });
    }
  }
});


</script>

@include('layouts.footer')
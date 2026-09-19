@include('layouts.header', [
    'og_image' => asset('public/blogs/detail_image/'.$blog_details->detail_image)
])

<style>

  /* DEFAULT HEADER (CLOSED) */
.accoding-faq .according_head {
    background: #e6edf5; /* light version */
    color: #182a41;
    padding: 15px 20px;
    margin: 0;
    border-radius: 5px;
    cursor: pointer;
    position: relative;
    font-size: 18px;
    transition: 0.3s ease;
}

/* ACTIVE (OPEN) HEADER */
.accoding-faq  .according_head[aria-expanded="true"] {
    background: #c02628 !important;
    color: #ffffff !important;
}

/* ARROW ICON */
.accoding-faq  .according_head::after {
    content: "\25BC"; /* down arrow */
    font-size: 16px;
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%) rotate(0deg);
    transition: 0.3s ease;
    color: inherit;
}

/* ROTATE ARROW WHEN OPEN */
.accoding-faq  .according_head[aria-expanded="true"]::after {
    transform: translateY(-50%) rotate(180deg);
    color: #ffffff;
}

/* CONTENT AREA */
.accoding-faq  .accordion-collapse {
    padding: 15px 20px;
    background: #f8f9fc;
    border: 1px solid #182a41;
    border-top: none;
    border-radius: 0 0 5px 5px;
}
 .blogs_details_content h3
 {
     font-size:24px;
     margin-top:15px;
 }

    ul li,ol li
    {
        margin-bottom:14px;
    }
    blockquote {
    font-weight: 500;
    font-style: italic;
    color:#c02628;
}
table {
  width: 100%;
  border-collapse: collapse;
  margin: 20px 0;
  font-family: Arial, sans-serif;
  border: 1px solid #ddd;
  overflow: hidden;
  border-radius: 8px;
  margin:15px 0;
}

table thead {
  background-color: #c12729;
  color: #fff;
}

table th,
table td {
  padding: 14px 16px;
  border: 1px solid #e5e5e5;
  text-align: left;
}

table th {
  font-size: 16px;
  font-weight: 600;
}

table tbody tr:nth-child(even) {
  background-color: #f9f9f9;
}

table tbody tr:hover {
  background-color: #fceaea;
  transition: 0.3s ease;
}

table tbody td:first-child {
  font-weight: 600;
  color: #c12729;
}

/* Mobile Responsive */
@media (max-width: 768px) {
  table {
    display: block;
    overflow-x: auto;
    white-space: nowrap;
  }

  table th,
  table td {
    padding: 12px;
    font-size: 14px;
  }
}
</style>

<section >
    <div class="container">
        <div class="banner_wrapper">
            {{-- <img src="{{asset('public/front/images/blog_banner.png')}}" alt="blog banner" class="banner img-fluid"> --}}
        <!--<picture>-->
        <!--    @if (!empty($blog_details->top_banner_mobile))-->
        <!--        <source media="(max-width: 767px)" srcset="{{ asset('public/blogs/top_banner_mobile/' . $blog_details->top_banner_mobile) }}" alt="{{  str_replace(['-', '_'],' ', pathinfo($blog_details->top_banner_mobile, PATHINFO_FILENAME)) }}">-->
        <!--    @endif-->
        <!--    @if (!empty($blog_details->top_banner_desktop))-->
        <!--        <source media="(min-width: 768px)" srcset="{{ asset('public/blogs/top_banner_desktop/' . $blog_details->top_banner_desktop) }}" alt="{{  str_replace(['-', '_'],' ', pathinfo($blog_details->top_banner_desktop, PATHINFO_FILENAME)) }}">-->
        <!--    @endif-->
        <!--    <img src="{{ asset('public/blogs/top_banner_desktop/' . $blog_details->top_banner_desktop) }}" alt="Blog Banner" class="img-fluid bd_rd_10">-->
        <!--</picture>-->
        <div class="banner_text">
            <div class="">
                <!--<p class="main_head">Blogs</p>-->
                <div class="breadcrumb d-none d-md-block">
                    <a href="{{url('/')}}">Home </a><a href="javascript:void(0)">&nbsp;| Blogs</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
<section class="mt-100 blog-detail">
    <div class="container">
        <div class="row ">
            <h1 class="main_head text-start">{{$blog_details->title}}</h1>
            <p>{!! html_entity_decode($blog_details->short_description) !!}</p>
            <div class="row">
                <div class=" col-lg-6 col-xl-6">
                    {!! html_entity_decode($blog_details->description ?? 'No description available.') !!}
                </div>
                <div class="col-lg-6">
                    <img src="{{asset('public/blogs/detail_image/'.$blog_details->detail_image)}}" alt="{{  str_replace(['-', '_'],' ', pathinfo($blog_details->detail_alt_tag, PATHINFO_FILENAME)) }}" class=" img-fluid">
                </div>
            </div>
            <div class="row mt-5 blogs_details_content">
                {!! html_entity_decode($blog_details->detail_description ?? 'No description available.') !!}
            </div>
        </div>
    </div>
</section>
<section class="mt-100 d-none">
    <div class="container">
        <div class="row">
            @if(isset($blog_details->slider_top_title) && $blog_details->slider_top_title != '')<h2 class="main_head">{{$blog_details->slider_top_title}}</h2>@endif
            <p class="text-center mb-5">{!! html_entity_decode($blog_details->slider_description) !!}</p>
            <div class="applications_slider slider_slick_dots ">
                @php
                    $ctaBlocks = json_decode($blog_details->cta ?? '[]', true);
                @endphp

                @if (!empty($ctaBlocks))
                    @foreach ($ctaBlocks as $cta)
                        <div class="industries_slide">
                            <div class="ind_slide_img mx-auto">
                                <img src="{{ asset('public/blogs/cta/' . $cta['image']) }}" alt="{{  str_replace(['-', '_'],' ', pathinfo($cta['alt'], PATHINFO_FILENAME)) }}" class="img-fluid">
                                <div class="indus_slide_content">
                                    <div class="indus_left">
                                        <h2 class="indus_head mb-2">{{ $cta['title'] ?? '' }}</h2>
                                        <div class="text-white text-start">{!! $cta['description'] ?? '' !!}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <!--<p class="text-center mt-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit repellat fugiat cumque eos! Obcaecati deleniti quo itaque dignissimos</p>-->
        </div>
    </div>
    
</section>
<section class="mt-100">
    <div class="container">
        <a href="{{route('contact-us')}}">
            <img src="{{asset('public/blogs/banner_image/'.$blog_details->banner_image)}}" alt="{{ $blog_details->banner_alt_tag ?? '' }}" class="img-fluid">
        </a>
    </div>
    <div class="container ">
        <div class="row">
            <!--<h3 class="blog_detailsub_head ">Conclusion</h3>-->
            <p>{!! html_entity_decode($blog_details->conclusion) !!}</p>
        </div>
    </div>
</section>

<section class="accoding-faq">
    <div class="container">
        @if (!empty($blog_details->title_description) && count($blog_details->title_description) > 0)
            <h2 class="text-center mb-5" style="color:#c02628;">Frequently Asked Questions</h2>
            <div class="row">
                <div class="col-lg-12">
                    <div id="accordionExample">
                        @foreach ($blog_details->title_description as $index => $faq)
                            <div class="mb-4">
                                <h3 class="according_head {{ $index !== 0 ? 'collapsed' : '' }}" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $index }}"
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-controls="collapse{{ $index }}">
                                    {{ $faq['faq_title'] }}
                                </h3>
                                <div id="collapse{{ $index }}" 
                                    class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                    data-bs-parent="#accordionExample">
                                    <div>
                                        {!! $faq['faq_description'] !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@if (!empty($blog_details->title_description) && count($blog_details->title_description) > 0)
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    @foreach ($blog_details->title_description as $faq)
    {
      "@type": "Question",
      "name": "{{ strip_tags($faq['faq_title']) }}",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "{{ strip_tags($faq['faq_description']) }}"
      }
    }@if (!$loop->last),@endif
    @endforeach
  ]
}
</script>
@endif

@include('layouts.footer')
@include('layouts.header')
@if(!empty($faqs))
@php
    $schemaFaq = [];

    foreach ($faqs as $faq) {
        $items = json_decode($faq->title_description, true) ?: [];

        foreach ($items as $item) {
            $question = trim(strip_tags($item['title'] ?? ''));
            $answer = trim(strip_tags($item['description'] ?? ''));

            if ($question && $answer) {
                $schemaFaq[] = [
                    "@type" => "Question",
                    "name" => $question,
                    "acceptedAnswer" => [
                        "@type" => "Answer",
                        "text" => $answer
                    ]
                ];
            }
        }
    }
@endphp

<script type="application/ld+json">
{!! json_encode([
    "@context" => "https://schema.org",
    "@type" => "FAQPage",
    "mainEntity" => $schemaFaq
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endif
<section>
    <div class="container">
        <div class="banner_wrapper">
            <!--<picture>-->
            <!--    <source media="(max-width:992px)" srcset="{{asset('public/front/images/flexibel_banner/faq_m.webp')}}" alt="FAQ banner" class="banner img-fluid bd_rd_10">-->
            <!--    <img src="{{asset('public/front/images/flexibel_banner/faq.webp')}}" alt="FAQ banner" class="banner img-fluid bd_rd_10">-->
            <!--</picture>-->
            <!--<img src="{{ asset('public/front/images/faq_banner.png')}}" alt="FAQ" class="banner img-fluid">-->
            <div class="banner_text">
                <div class="">
                    <!--<h1 class="main_head">FAQ's</h1>-->
                    <div class="breadcrumb d-none d-md-block">
                        <a href="{{url('/')}}">Home </a><a href="javascript:void(0)">&nbsp;| Resources</a><a href="javascript:void(0)">&nbsp;| FAQ's</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mt-100 faq">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <p class="sub_head ms-0">Help Center</p>
        <h2 class="main_head text-start">Faqs</h2>
        <p>
          Our FAQ page provides answers to common questions about FlexiBellows products, materials,
          customization options, and maintenance.
        </p>
      </div>
    </div>

    <div class="row faq-navtab mt-100">
      <div class="faq-nav">
        <div class="nav flex-column nav-pills col-md-4 me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          @foreach ($faqs as $i => $faq)
              <button
                class="nav-link {{ $loop->first ? 'active' : '' }}"
                id="v-pills-btn-{{ $i }}"
                data-bs-toggle="pill"
                data-bs-target="#v-pills-pane-{{ $i }}"
                type="button"
                role="tab"
                aria-controls="v-pills-pane-{{ $i }}"
                aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                {{ $faq->faq_name }}
                <span class="svg ms-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 20 24" fill="none">
                                    <path d="M1 22.395L19 1.60498M19 1.60498H1M19 1.60498V20.505" stroke="#C12729" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
              </button>
          @endforeach
        </div>

        <div class="tab-content col-md-7" id="v-pills-tabContent">
          @foreach ($faqs as $i => $faq)
            @php
              $items = json_decode($faq->title_description, true) ?: [];
            @endphp

            <div
              class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
              id="v-pills-pane-{{ $i }}"
              role="tabpanel"
              aria-labelledby="v-pills-btn-{{ $i }}">
              <div class="row quality_accordion justify-content-center">
                <div class="col-12">
                  <div class="accordion" id="accordion-{{ $i }}">
                    @foreach ($items as $j => $item)
                      <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-{{ $i }}-{{ $j }}">
                          <button
                            class="accordion-button {{ $j ? 'collapsed' : '' }}"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapse-{{ $i }}-{{ $j }}"
                            aria-expanded="{{ $j === 0 ? 'true' : 'false' }}"
                            aria-controls="collapse-{{ $i }}-{{ $j }}"
                            style="background-color: #fff; color: #333; font-weight: 500; font-size: 20px;"
                          >
                            {{ $item['title'] ?? 'No title' }}
                          </button>
                        </h2>
                        <div
                          id="collapse-{{ $i }}-{{ $j }}"
                          class="accordion-collapse collapse {{ $j === 0 ? 'show' : '' }}"
                          aria-labelledby="heading-{{ $i }}-{{ $j }}"
                          data-bs-parent="#accordion-{{ $i }}"
                        >
                          <div class="accordion-body">
                            {!! $item['description'] ?? 'No description available.' !!}
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>

      </div>
    </div>
  </div>
</section>
@include('layouts.footer')

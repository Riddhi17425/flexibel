@include('layouts.header')
<section >
    <div class="container">
        <div class="banner_wrapper">
        <!--    <picture>-->
        <!--    <source media="(max-width:992px)" srcset="{{asset('public/front/images/flexibel_banner/case_studies_m.webp')}}" alt="Case Studies banner" class="banner img-fluid bd_rd_10">-->
        <!--    <img src="{{asset('public/front/images/flexibel_banner/case_studies.webp')}}" alt="Case Studies banner" class="banner img-fluid bd_rd_10">-->
        <!--</picture>-->
        <!--<img src="{{asset('public/front/images/case_studies_banner.png')}}" alt="Case Studies banner" class="banner img-fluid">-->
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
<section class="mt-100">
    <div class="container">
        <div class="row ">
            <p class="sub_head ms-0">Our Case Studies</p>
            <h1 class="main_head text-start">Latest Case-studies</h1>
            <p>Discover how our engineered expansion joints solve real-world industrial challenges, with performance you can rely on.</p>
        </div>
        <div class="row mt-1 mt-md-1 g-4 g-md-5">
            @foreach ($casestudies as $data)
                <div class="col-md-6">
                    <a href="{{ route('case-studies-detail', ['url' => $data->casestudy_url]) }}">
                        <div class="case_studies_card">
                            <!--<img src="{{asset('public/case_studies/front_images/'.$data->front_image)}}" alt="{{  str_replace(['-', '_'],' ', pathinfo($data->front_image, PATHINFO_FILENAME)) }}" class="img-fluid">-->
                            <div class="case_studies_content">
                                <p class="sub_head ms-0">
                                    <strong>Date: </strong> 
                                    {{ $data->date ? \Carbon\Carbon::parse($data->date)->format('F Y') : '' }}
                                </p>
                                <h3 class="blog_title fw-bolder ">{{$data->name ?? ''}}</h3>
                                <p><strong>Industry: </strong>{{$data->industry ?? ''}}</p>
                                <p><strong>Application: </strong>{{$data->application ?? ''}}</p>
                                <p><strong>Region: </strong>{{$data->region ?? ''}}</p>
                                
                                 <!--{!! html_entity_decode($data->short_description ?? '<p>No description available.</p>') !!}-->
                               
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@include('layouts.footer')
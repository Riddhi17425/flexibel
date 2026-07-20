@include('layouts.header', [
    'og_image' => asset('public/blogs/detail_image/understanding-expansion-joints-detail.png')
])
<style>
/*    .limit-to-4-lines {*/
/*  display: -webkit-box;*/
/*  -webkit-line-clamp: 4;*/
/*  -webkit-box-orient: vertical;*/
/*  overflow: hidden;*/
/*  text-overflow: ellipsis;*/
/*}*/
</style>
<section>
    <div class="container">
        <div class="banner_wrapper">
        <!--    <picture>-->
        <!--    <source media="(max-width:992px)" srcset="{{asset('public/front/images/flexibel_banner/blogs_m.webp')}}" alt="blog banner" class="banner img-fluid bd_rd_10">-->
        <!--    <img src="{{asset('public/front/images/flexibel_banner/blogs.webp')}}" alt="blog banner" class="banner img-fluid bd_rd_10">-->
        <!--</picture>-->
        <!--<img src="{{asset('public/front/images/blog_banner.png')}}" alt="blog banner" class="banner img-fluid">-->
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
<section class="mt-100">
    <div class="container">
        <div class="row ">
            <p class="sub_head ms-0">Our Blogs</p>
            <h1 class="main_head text-start">Latest Industries & Technologies Blogs</h1>
            <p> Explore our latest blogs to stay informed and up to date. Get insights, trends, and updates all in one place!</p>
        </div>
        <div class="row mt-2 mt-md-1 g-4 g-lg-5">
            @foreach ($blogs as $blog)
                <div class="col-md-6 col-lg-4">
                    <a href="{{route('blog-detail',['url'=>$blog->url])}}">
                        <div class="blog_card">
                            <img src="{{asset('public/blogs/front_image/'.$blog->front_image)}}" class="img-fluid " alt="{{  str_replace(['-', '_'],' ', pathinfo($blog->front_alt_tag, PATHINFO_FILENAME)) }}">
                            <div class="card-body px-0">
                                <p class="blog_date">{{$blog->date ?? ''}}</p>
                                <div class="d-flex justify-content-between">
                                    <h4 class="blog_title mb-2">{{$blog->title ?? ''}}</h4>
                                    <a href="{{route('blog-detail',['url'=>$blog->url])}}" class="svg_arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                                            <path d="M7.62109 17L17.6211 7M17.6211 7H7.62109M17.6211 7V17" stroke="#C12729" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                                <p class="blog_desc limit-to-4-lines">{!! $blog->short_description ?? '' !!}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@include('layouts.footer')
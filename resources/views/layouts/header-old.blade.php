<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>{{ $metatitle ?? '' }}</title>
    <meta name="description" content="{!! $metadescription ?? ''!!}">
         <link rel="icon" type="image/x-icon" href="{{asset('public/front/images/favicon.png')}}">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <!--Select2 CSS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- ✅ Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />

    <!-- ✅ Select2 JS (must come AFTER jQuery) -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Slick Slider CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css" />
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
    <!-- css -->
    <link rel="stylesheet" href="{{asset('public/front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/fonts/stylesheet.css')}}">
</head>
@include('layouts.loader')
<div class="circle"></div>
<!-- header -->
<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid position-relative">
            <!-- Logo -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('public/front/images/flexi_header_logo.svg')}}" alt="Flexibellows" class="img-fluid">
            </a>

            <!-- Mobile Toggle Button -->
            <!--<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">-->
            <!--    <span class="navbar-toggler-icon"></span>-->
            <!--</button>-->
            <button class="navbar-toggler collapsed custom-toggler border-0 shadow-none" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="toggler-bar top-bar"></span>
                <span class="toggler-bar middle-bar"></span>
                <span class="toggler-bar bottom-bar"></span>
            </button>

            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- About Dropdown -->
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{route('about')}}">About</a></li>

                    @php
                    use App\Models\ProductCategory;

                    $categories = ProductCategory::whereHas('products', function ($query) {
                            $query->whereNull('deleted_at');
                        })
                        ->with(['products' => function ($query) {
                            $query->whereNull('deleted_at')->orderBy('id', 'asc');
                        }])->orderBy('id', 'asc')->get();
                    @endphp
                    <!-- Our products Dropdown -->
                    <li class="nav-item dropdown" id="prod_menu">
                        <a class="nav-link dropdown-toggle {{ request()->is('product/*') ? 'active' : '' }}" href="#" id="expertiseDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Products
                            <span class="custom-dropdown-arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="9" viewBox="0 0 8 9"
                                    fill="none">
                                    <circle cx="4" cy="4.5" r="4" fill="#C12729" />
                                </svg>
                            </span>
                        </a>
                        {{-- <div class="dropdown-menu dropdown-menu_1" aria-labelledby="expertiseDropdown">
                            <ul class="nav nav-tabs main_nav" id="myTab" role="tablist">
                                @foreach ($categories as $index => $category)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link {{ $loop->first ? 'active' : '' }}" 
                                                id="tab-{{ $category->id }}-tab" 
                                                data-bs-toggle="pill" 
                                                data-bs-target="#tab-{{ $category->id }}" 
                                                type="button" role="tab" 
                                                aria-controls="tab-{{ $category->id }}" 
                                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                            {{ $category->name }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- MEJ -->
                            <div class="tab-content main_tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="MEJ" role="tabpanel" aria-labelledby="MEJ-tab">
                                    <div class="row g-0 inner_menu">
                                        <div class="nav flex-column nav-pills inner_nav col-lg-2 px-0" id="v-pills-tab" role="tablist"
                                            aria-orientation="vertical">
                                            @foreach ($categories as $category)
                                                @foreach ($category->products as $index => $product)
                                                    <button class="nav-link {{ $loop->first && $loop->parent->first ? 'active' : '' }}" id="v-pills-{{ $product->id }}-tab"
                                                        data-bs-toggle="pill" data-bs-target="#v-pills-{{ $product->id }}" type="button"
                                                        role="tab" aria-controls="v-pills-{{ $product->id }}"
                                                        aria-selected="true">{!! $product->title !!}</button>
                                                @endforeach
                                            @endforeach
                                        </div>
                                        <div class="tab-content inner_tab col-lg-9 px-0" id="v-pills-tabContent">
                                            @foreach ($categories as $index => $category)
                                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" 
                                                    id="tab-{{ $category->id }}" 
                                                    role="tabpanel" 
                                                    aria-labelledby="tab-{{ $category->id }}-tab">
                                                    
                                                    @foreach ($category->products as $product)
                                                        <div class="header_inner_wrapper mb-5">
                                                            <div class="row">
                                                                <div class="col-lg-12 mb-4">
                                                                    <img src="{{ asset($product->header_image ?? 'public/front/images/single_head.png') }}" 
                                                                        alt="{{ $product->title }}" 
                                                                        class="img-fluid w-100">
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="dropdown_inner_data">
                                                                        <div>
                                                                            <h3 class="header_inner_title mb-3">{{ $product->title }}</h3>
                                                                            <p>{!! $product->short_description !!}</p>
                                                                        </div>
                                                                        <img src="{{ asset($product->side_image ?? 'public/front/images/single_type_rightimg.png') }}" 
                                                                            alt="{{ $product->title }}" 
                                                                            class="img-fluid">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="NMJ" role="tabpanel" aria-labelledby="NMJ-tab">
                                    ...</div>
                                <div class="tab-pane fade" id="MH" role="tabpanel" aria-labelledby="MH-tab">
                                    ...</div>
                            </div>
                        </div> --}}
                        <div class="dropdown-menu dropdown-menu_1" aria-labelledby="expertiseDropdown">
                            <div class="service_menu d-block d-md-none">
                                <ul class="service_items">
                                    <li><a class="dropdown-item" href="{{ url('products/metallic-expansion-joints') }}">Metallic Expansion Joints</a></li>
                                </ul>
                            </div>
                            <ul class="nav nav-tabs main_nav d-none d-md-block" id="myTab" role="tablist">
                                @foreach ($categories as $index => $category)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link {{ $loop->first ? 'active' : '' }}" 
                                                id="tab-{{ $category->id }}-tab" 
                                                data-bs-toggle="tab" 
                                                data-bs-target="#tab-{{ $category->id }}" 
                                                type="button" role="tab" 
                                                aria-controls="tab-{{ $category->id }}" 
                                                aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                            {{ $category->name }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>

                            <!-- Content by Category -->
                            <div class="tab-content main_tab" id="myTabContent">
                                @foreach ($categories as $index => $category)
                                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" 
                                        id="tab-{{ $category->id }}" 
                                        role="tabpanel" 
                                        aria-labelledby="tab-{{ $category->id }}-tab">
                                        
                                        <div class="row g-0 inner_menu">
                                            <!-- Products nav for this category -->
                                            <div class="nav flex-column nav-pills inner_nav col-lg-2 px-0" id="v-pills-tab-{{ $category->id }}" role="tablist" aria-orientation="vertical">
                                                @foreach ($category->products as $index => $product)
                                                    <button class="nav-link {{ $loop->first ? 'active' : '' }}" 
                                                            id="v-pills-{{ $product->id }}-tab" 
                                                            data-bs-toggle="pill" 
                                                            data-bs-target="#v-pills-{{ $product->id }}" 
                                                            type="button" 
                                                            role="tab" 
                                                            aria-controls="v-pills-{{ $product->id }}" 
                                                            aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                                                            onclick="window.location.href='{{ route('product-detail', ['category' => $product->productcategory->url, 'url' => $product->url]) }}';"
                                                            >
                                                        {!! $product->title !!}
                                                    </a>
                                                    </button>
                                                @endforeach
                                            </div>

                                            <!-- Products content for this category -->
                                            <div class="tab-content inner_tab col-lg-9 px-0" id="v-pills-tabContent-{{ $category->id }}">
                                                @foreach ($category->products as $index => $product)
                                                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" 
                                                        id="v-pills-{{ $product->id }}" 
                                                        role="tabpanel" 
                                                        aria-labelledby="v-pills-{{ $product->id }}-tab">

                                                        <div class="header_inner_wrapper mb-5">
                                                            <div class="row">
                                                                <div class="col-lg-12 mb-4 position-relative">
                                                                    <img src="{{ asset('public/products/menu/banner/'.$product->menu_banner) }}" alt="{{ $product->title }}" 
                                                                        class="img-fluid w-100">
                                                                         <div class="header_inner_btn">
                                                                             <a href="{{ route('product-detail', ['category' => $product->productcategory->url, 'url' => $product->url]) }}" class="prod_btn View_btn" tabindex="0">
                                                                                View Details
                                                                                <span class="svg ms-2">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">
                                                                                        <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white" stroke-width="2"
                                                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                    </svg>
                                                                                </span>
                                                                            </a>
                                                                         </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="dropdown_inner_data">
                                                                        <div>
                                                                            <h3 class="header_inner_title mb-3">{{ $product->title }}</h3>
                                                                            <p>{!! $product->menu_description !!}</p>
                                                                            <!--<a href="{{ route('product-detail', ['category' => $product->productcategory->url, 'url' => $product->url]) }}" class="prod_btn" tabindex="0">-->
                                                                            <!--    View Details-->
                                                                            <!--    <span class="svg ms-2">-->
                                                                            <!--        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">-->
                                                                            <!--            <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white" stroke-width="2"-->
                                                                            <!--                stroke-linecap="round" stroke-linejoin="round"></path>-->
                                                                            <!--        </svg>-->
                                                                            <!--    </span>-->
                                                                            <!--</a>-->
                                                                        </div>
                                                                        <img src="{{ asset('public/products/menu/image/'.$product->menu_image) }}" alt="{{ $product->title }}" 
                                                                            alt="{{ $product->title }}" 
                                                                            class="img-fluid" style="max-width: 225px;max-height: 192px;">
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>

                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <!-- Our products Dropdown -->
                    <!-- Our service Dropdown -->
                    <li class="nav-item dropdown megamenu">
                        <a class="nav-link dropdown-toggle {{ 
    request()->routeIs('premium-service') || 
    request()->routeIs('onsite-service') || 
    request()->routeIs('design-calculation') || 
    request()->routeIs('logistics') ? 'active' : '' 
}}" href="#" id="expertiseDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Services<span class="custom-dropdown-arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="9" viewBox="0 0 8 9"
                                    fill="none">
                                    <circle cx="4" cy="4.5" r="4" fill="#C12729" />
                                </svg>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu_1" aria-labelledby="expertiseDropdown">
                            <div class="service_menu">
                                <ul class="service_items col-lg-2 px-0">
                                    <li><a class="dropdown-item" href="{{route('premium-service')}}">Premium Service</a></li>
                                    <li><a class="dropdown-item" href="{{route('onsite-service')}}">On-site Services</a></li>
                                    <li><a class="dropdown-item" href="{{route('design-calculation')}}">Design & Calculation</a></li>
                                    <li><a class="dropdown-item" href="{{route('logistics')}}">Logistics</a></li>
                                </ul>
                                <div class="service_image">
                                    <img src="{{ asset('public/front/images/service_menu.webp')}}" alt="service" class="img-fluid bd_rd_10">
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Our service Dropdown -->

                    <!-- Static Links -->
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('industries') ? 'active' : '' }}" href="{{route('industries')}}">Industries</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('quality') ? 'active' : '' }}" href="{{route('quality')}}">Quality</a></li>

                    <!-- Resources Dropdown -->
                    <li class="nav-item dropdown megamenu">
                        <a class="nav-link dropdown-toggle {{ 
    request()->routeIs('case-studies') || 
    request()->routeIs('blogs') || 
    request()->routeIs('faq') ? 'active' : '' 
}}" href="#" id="solutionsDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Resources <span class="custom-dropdown-arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="8" height="9" viewBox="0 0 8 9"
                                    fill="none">
                                    <circle cx="4" cy="4.5" r="4" fill="#C12729" />
                                </svg>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu_1" aria-labelledby="expertiseDropdown">
                            <div class="service_menu">
                                <ul class="service_items col-lg-2 px-0">
                                    <li><a class="dropdown-item" href="{{route('case-studies')}}">Case Studies</a></li>
                                    <li><a class="dropdown-item" href="{{route('blogs')}}">Blogs</a></li>
                                    <!--<li><a class="dropdown-item" href="{{route('datasheets')}}">Datasheets</a></li>-->
                                    <li><a class="dropdown-item" href="{{route('faq')}}">FAQ's</a></li>
                                </ul>
                                <div class="service_image">
                                    <img src="{{ asset('public/front/images/resource_menu.webp')}}" alt="resource" class="img-fluid bd_rd_10">
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- Resources Dropdown -->
                    <!--<li class="nav-item"><a class="nav-link" href="{{route('blogs')}}">Blogs</a></li>-->
                </ul>
                <!-- Right Icons (Search & Language) -->
                <div class="header_right">
                    <a class="nav-link header_btn1" href="{{route('contact-us')}}">Contact Us</a>
                    <a class="nav-link header_btn2" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Catalogue</a>
                    <!-- Search Icon -->
                    <span class="language-switch" style="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="23" viewBox="0 0 24 23" fill="none">
                            <path
                                d="M22.5075 6.81216C23.0364 5.61471 23.3398 4.53728 23.4098 3.60621C23.4972 2.44403 23.2224 1.53577 22.5933 0.906685C21.9642 0.277603 21.0554 0.00280762 19.8938 0.0901947C18.9627 0.16021 17.8853 0.463783 16.6878 0.992493C15.2463 0.348671 13.6735 0.00719451 12.0484 0.00052643C12.0321 0.000175476 12.016 0 12 0C11.984 0 11.9679 0.000175476 11.9516 0.00052643C8.89793 0.0131607 6.0289 1.20763 3.86826 3.36826C1.69622 5.54031 0.5 8.42829 0.5 11.5C0.5 13.1423 0.842178 14.7319 1.49249 16.1878C0.963608 17.3853 0.66021 18.4627 0.590195 19.3938C0.502808 20.556 0.777603 21.4642 1.40668 22.0933C1.95979 22.6464 2.72872 22.9256 3.69647 22.9256C3.82931 22.9256 3.966 22.9203 4.10621 22.9098C5.03728 22.8398 6.11471 22.5362 7.31216 22.0075C8.75387 22.6513 10.3265 22.9928 11.9516 22.9993C11.9679 22.9998 11.9842 23 12 23C12.0158 23 12.0321 22.9998 12.0484 22.9993C15.1021 22.9868 17.9711 21.7924 20.1317 19.6317C22.3038 17.4597 23.5 14.5717 23.5 11.5C23.5 9.85772 23.1578 8.26808 22.5075 6.81216ZM21.6405 1.85952C22.2162 2.43543 22.215 3.66815 21.668 5.26691C21.2292 4.58923 20.7161 3.9526 20.1317 3.36826C19.5474 2.78393 18.9108 2.27084 18.2331 1.83197C19.8318 1.28519 21.0646 1.28378 21.6405 1.85952ZM21.013 6.83076C20.4755 7.93257 19.7678 9.09142 18.9201 10.2659C18.4956 10.05 18.016 9.92756 17.508 9.92756C17.1653 9.92756 16.8354 9.98371 16.5266 10.0862C16.4155 7.65146 16.0189 5.39343 15.3814 3.61709C15.1028 2.84043 14.786 2.18011 14.4365 1.64386C17.2969 2.3512 19.683 4.27407 21.013 6.83076ZM19.2875 13.0545C19.2875 14.0356 18.4893 14.8339 17.5082 14.8339C16.5271 14.8339 15.7289 14.0356 15.7289 13.0545C15.7289 12.0735 16.5271 11.2752 17.5082 11.2752C18.4893 11.2752 19.2875 12.0735 19.2875 13.0545ZM12 1.34766C13.2924 1.34766 15.0763 4.93544 15.2038 10.8262H8.79616C8.92373 4.93544 10.7076 1.34766 12 1.34766ZM9.56351 1.64386C9.21397 2.18011 8.89723 2.84043 8.61858 3.61709C7.91685 5.57207 7.50694 8.11086 7.4485 10.8262H1.87064C2.16422 6.36732 5.34893 2.68601 9.56351 1.64386ZM2.35952 21.1405C1.78378 20.5646 1.78501 19.3318 2.33197 17.7331C2.77084 18.4108 3.28393 19.0474 3.86826 19.6317C4.4526 20.2161 5.08923 20.7292 5.76691 21.168C4.16815 21.715 2.93543 21.7162 2.35952 21.1405ZM7.33076 20.513C4.26431 18.9177 2.10964 15.8034 1.87064 12.1738H7.4485C7.50694 14.8891 7.91702 17.4279 8.61858 19.3829C8.6628 19.5061 8.70807 19.6261 8.75404 19.7433C8.27148 20.0288 7.79612 20.2859 7.33076 20.513ZM8.95075 21.1842C9.07604 21.114 9.20186 21.0419 9.32803 20.9682C9.40471 21.1042 9.48332 21.2331 9.56334 21.356C9.35663 21.3049 9.15237 21.2479 8.95075 21.1842ZM8.79616 12.1738H14.5083C14.426 12.4534 14.381 12.7487 14.381 13.0545C14.381 13.724 14.5932 14.3445 14.9529 14.8537C13.3036 16.48 11.585 17.8949 9.91885 19.0086C9.31609 17.38 8.85845 15.0518 8.79616 12.1738ZM12 21.6523C11.5236 21.6523 10.9805 21.1645 10.4781 20.254C11.8624 19.3443 13.2792 18.2372 14.665 16.9805C14.0097 19.9557 12.8886 21.6523 12 21.6523ZM14.4365 21.356C14.786 20.8199 15.1028 20.1596 15.3814 19.3829C15.7471 18.3641 16.0335 17.1867 16.2323 15.9085C16.6222 16.0834 17.0537 16.1815 17.508 16.1815C19.2322 16.1815 20.635 14.7788 20.635 13.0545C20.635 12.7487 20.5901 12.4534 20.508 12.1738H22.1294C21.8358 16.6327 18.6511 20.314 14.4365 21.356ZM20.1744 10.8262C20.7426 10.0237 21.249 9.22794 21.6842 8.45075C21.9233 9.20828 22.0753 10.0041 22.1294 10.8262H20.1744Z"
                                fill="#182A41" />
                        </svg>

                       <div class="ml-4" id="google_translate_element" class="translate-wrap">
                        <span class="custom-placeholder" style="padding-right:90px;">Select Language</span>
                       </div>

                    </span>
     

                    <!-- GOOGLE TRANSLATE SCRIPT -->
<!-- Google Translate Widget -->

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            includedLanguages: 'hi,bn,mr,te,ta,gu,ur,kn,or,ml,en,zh-CN,es,fr,ar,ru,pt'
        }, 'google_translate_element');
    }
</script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en'
        }, 'google_translate_element');
    }

    function toggleGoogleTranslate() {
        var translateElement = document.getElementById("google_translate_element");
        if (translateElement.style.display === "none") {
            translateElement.style.display = "block";
        } else {
            translateElement.style.display = "none";
        }

        console.log(translateElement)
    }
</script>
<script>
 if (window.innerWidth >= 768) {
  const observer = new MutationObserver(() => {
    const select = document.querySelector('#google_translate_element select');
    if (select && select.offsetParent !== null) {
      select.style.opacity = "1";
      const placeholder = document.querySelector('.custom-placeholder');
      if (placeholder) placeholder.style.display = 'none';
      observer.disconnect();
    }
  });

  observer.observe(document.getElementById('google_translate_element'), {
    childList: true,
    subtree: true
  });
}

</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll('.inner_nav .nav-link');

    navLinks.forEach((link) => {
      link.addEventListener('mouseenter', function () {
        const tab = new bootstrap.Tab(link);
        tab.show();
      });
    });
  });
</script>



                    <!-- Language Switch -->
                </div>
            </div>
        </div>
    </nav>
</header>
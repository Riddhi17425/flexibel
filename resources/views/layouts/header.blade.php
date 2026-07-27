<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{!! $metatitle ?? '' !!}</title>
        <meta name="description" content="{!! strip_tags($metadescription ?? '') !!}">
        <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large" />

        <link rel="icon" type="image/x-icon" href="{{ asset('fave-icon.png') }}">
        <link rel="canonical" href="{{ url()->current() }}" />
        <meta property="og:title" content="{!! $metatitle ?? '' !!}">
        <meta property="og:description" content="{!! strip_tags($metadescription ?? '') !!}">
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:type" content="website">
        <meta property="og:image" content="{{ $og_image ?? asset('public/front/images/favicon.png') }}" />
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="627">

        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <!--Select2 CSS -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <!-- ✅ Select2 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"
            rel="stylesheet" />

        <!-- ✅ Select2 JS (must come AFTER jQuery) -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <!-- Slick Slider CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css" />
        <link rel="stylesheet" type="text/css"
            href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css" />
        <!-- fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.4/build/css/intlTelInput.css">

        <!-- css -->
        <link rel="stylesheet" href="{{ asset('public/front/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('public/front/css/responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('public/front/fonts/stylesheet.css') }}">
        <!-- Animate.css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <!-- Select2 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <!-- Select2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <!--gsap-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
        <!-- Meta Pixel Code -->
        <script>
            ! function(f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function() {
                    n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = '2.0';
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s)
            }(window, document, 'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '1502808340956968');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
                src="https://www.facebook.com/tr?id=1502808340956968&ev=PageView&noscript=1" /></noscript>

        <style>
            /* Floating buttons wrapper */
            .float-buttons {
                position: fixed;
                top: 40%;
                right: 0;
                z-index: 900;
                /* container ko bhi animate karenge */
                animation: floatVertical 2.5s ease-in-out infinite;
            }

            /* WhatsApp Button */
            .WhatsAppButton {
                position: relative;
                transform: translate(120px, 0);
                width: 170px;
                overflow: hidden;
                background-color: #25d366;
                color: #fff;
                border-radius: 10px 0 0 10px;
                transition: all .5s ease-in-out;
                vertical-align: middle;
            }

            /* Icon */
            .WhatsAppButton i {
                font-size: 30px;
                color: #fff;
                line-height: 30px;
                margin-left: 4px;
                padding: 10px;
                transition: all .5s ease-in-out;
                text-align: center !important;
            }

            /* Text */
            .WhatsAppButton a span {
                color: #fff;
                font-size: 15px;
                padding-top: 8px;
                padding-bottom: 10px;
                position: absolute;
                line-height: 16px;
                font-weight: bolder;
            }

            /* Hover open */
            .WhatsAppButton:hover {
                color: #fff;
                background-color: var(--wb-red);
                transform: translate(0, 0);
            }

            /* TOP FLOAT ANIMATION */
            @keyframes floatVertical {
                0% {
                    top: 40%;
                }

                50% {
                    top: 38%;
                }

                /* thoda upar */
                100% {
                    top: 40%;
                }
            }
        </style>
    </head>

    <body>

        @include('layouts.loader')

        <div class="circle"></div>
        <!-- header -->
        <header class="header">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid position-relative">
                    <!-- Navigation Links -->
                    <a class="hamburger-btn me-2" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                        aria-controls="offcanvasExample">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                    <!-- Logo -->
                    <a class="navbar-brand d-block d-lg-none" href="{{ url('/') }}">
                        <img src="{{ asset('public/front/images/logo-white.png') }}" alt="Flexibellows"
                            class="img-fluid logo-white">
                        <img src="{{ asset('public/front/images/flexi_header_logo.svg') }}" alt="Flexibellows"
                            class="img-fluid logo-color">
                    </a>
                    <!-- Navigation Links -->
                    <div class="navbar-collapse d-lg-flex justify-content-between collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <!-- About Dropdown -->
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                                    href="{{ route('about') }}">About</a></li>
                            <!-- Static Links -->
                          <li class="nav-item" id="prod_menu" role="presentation" aria-expanded="true">
                                <a class="nav-link product-link" href="{{ route('product.metallic-expansion-joints') }}">Products</a>
                            </li>
                            <li class="nav-item" id="Ser_menu" role="presentation" aria-expanded="true">
                                <a class="nav-link services-link" href="{{ route('premium-service') }}">Services</a>
                            </li>
                        </ul>
                        <!-- Logo -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('public/front/images/logo-white.png') }}"
                                alt="Flexibel Expansion Joints" class="img-fluid logo-white">
                            <img src="{{ asset('public/front/images/flexi_header_logo.svg') }}"
                                alt="Flexibel Expansion Joints" class="img-fluid logo-color">
                        </a>
                        <!-- Right Icons (Search & Language) -->
                        <div class="header_right">

                            <!-- Phone Number -->
                            <a href="tel:+971529037473" class="header-phone d-none d-md-flex align-items-center me-3" aria-label="Call Flexibel +971 52 903 7473">
                                <i class="fa-solid fa-phone me-2"></i>
                                <span>+971 52 903 7473</span>
                            </a>

                            <!-- Search Icon -->
                            <span class="language-switch" style="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="23"
                                    viewBox="0 0 24 23" fill="none">
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
                                    includedLanguages: 'en,ar'
                                }, 'google_translate_element');
                            }

                            function toggleGoogleTranslate() {
                                var translateElement = document.getElementById("google_translate_element");
                                if (translateElement.style.display === "none") {
                                    translateElement.style.display = "block";
                                } else {
                                    translateElement.style.display = "none";
                                }
                            }
                        </script>
                            <script>

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

                            </script>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    const navLinks = document.querySelectorAll('.inner_nav .nav-link');

                                    navLinks.forEach((link) => {
                                        link.addEventListener('mouseenter', function() {
                                            const tab = new bootstrap.Tab(link);
                                            tab.show();
                                        });
                                    });
                                });
                            </script>

                            <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const translateEl = document.getElementById('google_translate_element');
                            const desktopSlot = translateEl.parentNode; // .language-switch span, its original home
                            const mobileSlot = document.getElementById('mobile_translate_slot');

                            function placeTranslateWidget() {
                                if (window.innerWidth < 992) {
                                    // Move into offcanvas sidebar
                                    if (mobileSlot && translateEl.parentNode !== mobileSlot) {
                                        mobileSlot.appendChild(translateEl);
                                    }
                                } else {
                                    // Move back to desktop header
                                    if (desktopSlot && translateEl.parentNode !== desktopSlot) {
                                        desktopSlot.appendChild(translateEl);
                                    }
                                }
                            }

                            placeTranslateWidget();
                            window.addEventListener('resize', placeTranslateWidget);
                        });
                        </script>

                            <!-- Language Switch -->
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Offcanvas -->
        <div class="offcanvas offcanvas-start custom-sidebar offcanvas-wide" tabindex="-1" id="offcanvasExample">

            <!-- Close Button -->
            <button type="button" class="custom-close-btn" data-bs-dismiss="offcanvas" aria-label="Close">
                <span class="close-icon"></span>
            </button>

            <div class="offcanvas-body d-flex flex-column justify-content-between">

                <!-- Main Menu Section -->
                <div id="mainMenu" class="sidebarmain-menu">
                    <div class="sidebar-topmenu">
                        <div class="main-area">
                            <ul class="nav flex-column menu-list-group">
                                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                                <li class="nav-item">
                                  <a class="nav-link product-link d-flex justify-content-between align-items-center" role="button" href="{{ route('product.metallic-expansion-joints') }}">
                                    Products
                                    <i class="fa-solid fa-chevron-right fs-6"></i>
                                </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link services-link d-flex justify-content-between align-items-center" role="button" href="{{ route('premium-service') }}">
                                        Services
                                        <i class="fa-solid fa-chevron-right fs-6"></i>
                                    </a>
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ route('industries') }}">Industries</a></li>

                            </ul>
                        </div>
                        <div class="secondary-area">
                            <ul class="nav flex-column secondary-list-group">
                                <li class="nav-item"><a class="nav-link" href="{{ route('case-studies') }}">Case
                                        Studies</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Blogs</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('faq') }}">FAQ's </a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ route('current.vacancies') }}">Career </a></li>

                            </ul>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="sidebar-footer">
                        <div class="nav-item">
                            <a class="nav-link"
                                href="https://standards.ejma.org/verify-subscription/cb2df984-119e-4ea7-8960-76f9bbc40ad1"
                                target="_blank">
                                <div>
                                    <img src="{{ asset('public/front/images/ejmalogo.png') }}"
                                        alt="EJMA Certified Badge" width="80px"><br>
                                    <sub class="mb-0" style="text-decoration:underline;">Officially EJMA Approved
                                        Standards Subscriber.</sub>
                                </div>
                            </a>
                        </div>
                        <div class="row g-2 border-top mt-4 pt-3 d-flex align-items-center">
                            <div class="col-6">
                                <a href="tel:+971529037473" class="nav-link d-flex align-items-center">
                                    <i class="fa-solid fa-phone me-2"></i> +971 52 903 7473
                                </a>
                            </div>
                            <div class="col-6">
                                <div id="mobile_translate_slot"></div>
                            </div>
                        </div>
                        <div class="row g-2 border-top mt-4">
                            <div class="col-6"><a href="{{ route('contact-us') }}" onclick="setScrollFlag()"><i
                                        class="bi bi-telephone"></i>Contact Us</a></div>
                           <div class="col-6"><a class="nav-link" href="{{ route('catalogue.form') }}" role="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Catalogue</a></div>
                        </div>
                    </div>

                </div>
                @php
                    use App\Models\ProductCategory;

                    $categories = ProductCategory::whereHas('products', function ($query) {
                        $query->whereNull('deleted_at');
                    })
                        ->with([
                            'products' => function ($query) {
                                $query->whereNull('deleted_at')->orderBy('id', 'asc');
                            },
                        ])
                        ->orderBy('id', 'asc')
                        ->get();
                @endphp
                <!-- Products Section -->
                <div class="productsSection d-none">
                    <button type="button" class="btn back-btn back-to-main">
                        <i class="fa-solid fa-chevron-left fs-6"></i> Menu
                    </button>
                    <h5 class="letter-area">Products</h5>
                    <div class="category-list">

                        <div class="sub-menu-item">
                            @foreach ($categories as $index => $category)
                                @php
                                    $productCount = $category->products->count();
                                @endphp

                                {{-- Skip empty categories --}}
                                @if ($productCount == 0)
                                    @continue
                                @endif

                                {{-- If only one product --}}
                                @if ($productCount === 1)
                                    @php
                                        $singleProduct = $category->products->first();
                                    @endphp
                                    <a class="direct-link sub-menu-list d-flex align-items-center link-{{ $category->id }} {{ $loop->first ? 'active' : '' }} mb-3"
                                        href="{{ route('product-detail', [
                                            'url' => $singleProduct->url,
                                        ]) }}">
                                        <div class="sub-menu-title">
                                            <span class="menu-label">{{ $category->name }}</span>
                                            <i class="fa-solid fa-chevron-right fs-6"></i>
                                        </div>
                                    </a>
                                @else
                                    {{-- Multiple products case --}}
                                    <a href="#"
                                        class="d-flex align-items-center sub-menu-list category-link link-{{ $category->id }} {{ $loop->first ? 'active' : '' }} mb-3"
                                        data-category-id="{{ $category->id }}">
                                        <div class="sub-menu-title">
                                            <span class="menu-label">{{ $category->name }}</span>
                                            <i class="fa-solid fa-chevron-right fs-6"></i>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Services Section -->
                <div class="ServicesSection d-none">
                    <button type="button" class="btn back-btn back-to-main">
                        <i class="fa-solid fa-chevron-left fs-6"></i> Menu
                    </button>
                    <h5 class="letter-area">Services</h5>
                    <div class="sub-menu-item">
                        <a class="sub-menu-list" href="{{ route('premium-service') }}">
                            <div class="sub-menu-title">
                                <span class="menu-label">Engineering & Design</span>
                            </div>
                        </a>
                        <a class="sub-menu-list" href="{{ route('Inspection-services') }}">
                            <div class="sub-menu-title">
                                <span class="menu-label">Inspection & QA</span>
                            </div>
                        </a>
                        <a class="sub-menu-list" href="{{ route('design-calculation') }}">
                            <div class="sub-menu-title">
                                <span class="menu-label">Comprehensive Audit</span>
                            </div>
                        </a>
                        <a class="sub-menu-list" href="{{ route('logistics') }}">
                            <div class="sub-menu-title">
                                <span class="menu-label">Field Services & Repair</span>
                            </div>
                        </a>
                        <a class="sub-menu-list" href="{{ route('emergency-services') }}">
                            <div class="sub-menu-title">
                                <span class="menu-label">Emergency & Turnaround Support</span>
                            </div>
                        </a>
                    </div>
                </div>

                @foreach ($categories as $index => $category)
                    @continue($category->products->count() <= 1)
                    <div class="sub-product-section sub-products-{{ $category->id }}" style="display:none;">
                        <button type="button" class="btn back-btn back-to-categories">
                            <i class="fa-solid fa-chevron-left fs-6"></i> Back
                        </button>
                        <h5 class="letter-area">{{ $category->name }}</h5>
                        @if ($category->url != 'metallic-expansion-joints')
                            <a href="{{ route('products.by.category', ['category' => $category->url]) }}"
                                class="view-all-btn">View All <i class="fa-solid fa-chevron-right fs-6"></i></a>
                        @else
                            <a href="{{ route('product.metallic-expansion-joints') }}" class="view-all-btn">View All
                                <i class="fa-solid fa-chevron-right fs-6"></i></a>
                        @endif
                        <div class="sub-menu-item">
                            @foreach ($category->products as $subProduct)
                                <a class="direct-link sub-menu-list"
                                    href="{{ route('product-detail', ['url' => $subProduct->url]) }}">
                                    <div class="sub-menu-img">

                                        <img src="{{ asset('public/products/sidemenu/' . $subProduct->side_menu_image ?? 'public/front/images/favicon.png') }}"
                                            class="img-fluid me-2" width="40" alt="{{ $subProduct->title }}">
                                    </div>
                                    <div class="sub-menu-title">
                                        <span class="menu-label">{{ $subProduct->title }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
        </div>

        <script>
            function setScrollFlag() {
                sessionStorage.setItem("scrollToContact", "true");
            }
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const header = document.querySelector('.header');
                const path = window.location.pathname;

                // Normalize trailing slash removal for comparison
                const normalizedPath = path.replace(/\/$/, '');

                if (
                    normalizedPath === '/flexibellowlaravel' || // /flexibellow/
                    normalizedPath === '' || // /
                    path.endsWith('/index.php') ||
                    path.endsWith('/index.html')
                ) {
                    header.classList.add('header--home'); // homepage → white
                } else {
                    header.classList.add('header--inner'); // other pages → black
                }
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const header = document.querySelector('.header');

                window.addEventListener('scroll', function() {
                    if (window.scrollY > 50) {
                        header.classList.add('sticky');
                    } else {
                        header.classList.remove('sticky');
                    }
                });
            });
        </script>

<!-- Sidebar -->
<div class="sidebar px-4 py-4 py-md-4 me-0">
    <div class="d-flex flex-column h-100">
        <a href="{!! route('home') !!}" class="mb-0 brand-icon">
            <span class="logo-icon">
                <img src="{{ url('/') }}/public/admin_public/dist/assets/images/favicon_flexi.png" alt="Logo" class="img-fluid" style="width:30px; height:auto;">
            </span>
            <span class="logo-text">{{ Auth::user()->name }}</span>
        </a>

        <ul class="menu-list flex-grow-1 mt-3">

            <!-- Dashboard -->
            <li>
                <a class="m-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{!! route('admin/dashboard') !!}">
                    <i class="icofont-dashboard-web fs-5"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Home Page -->
            <li class="collapsed {{ Request::is('admin/clienthome*') || Request::is('admin/clientsays*') ? 'active' : '' }}">
                <a class="m-link {{ Request::is('admin/clienthome*') || Request::is('admin/clientsays*') ? ' active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-home" href="#">
                    <i class="icofont-ui-home fs-5"></i>
                    <span>Home Page</span>
                    <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
                </a>
                <ul class="sub-menu collapse {{ Request::is('admin/clienthome*') || Request::is('admin/clientsays*') ? 'show' : '' }}" id="menu-home">
                    <li class="{{ Request::is('admin/clienthome*') ? 'active' : '' }}">
                        <a class="ms-link {{ Request::routeIs('clienthome.index') ? 'active' : '' }}" href="{{ route('clienthome.index') }}">
                            <i class="icofont-users-alt-3 fs-5"></i>
                            <span>Our Client</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Certificates -->
            <li class="{{ Request::is('admin/certificate*') ? 'active' : '' }}">
                <a class="m-link {{ Request::is('admin/certificate*') ? 'active' : '' }}" 
                    href="{!! route('certificate.index') !!}">
                    <i class="icofont-award fs-5"></i>
                    <span>Certificates</span>
                </a>
            </li>

            <!-- FAQ -->
            <li class="{{ Request::is('admin/faq*') ? 'active' : '' }}">
                <a class="m-link {{ Request::is('admin/faq*') ? 'active' : '' }}"
                    href="{!! route('faq.index') !!}">
                    <i class="icofont-question-circle fs-5"></i>
                    <span>FAQ</span>
                </a>
            </li>

            <!-- Milestone -->
             <li class="{{ Request::is('admin/milestone*') ? 'active' : '' }}">
                <a class="m-link {{ Request::is('admin/milestone*') ? 'active' : '' }}"
                    href="{!! route('milestone.index') !!}">
                    <i class="icofont-flag-alt-2 fs-5"></i>
                    <span>Milestone</span>
                </a>
            </li>

            <!-- Blogs -->
            <li class="{{ Request::is('admin/blog*') ? 'active' : '' }}">
                <a class="m-link {{ Request::is('admin/blog*') ? 'active' : '' }}"
                    href="{!! route('blog.index') !!}">
                    <i class="icofont-newspaper fs-5"></i>
                    <span>Blogs</span>
                </a>
            </li>

            <!-- Testimonials -->
            <li class="{{ Request::is('admin/testimonials*') ? 'active' : '' }}">
                <a class="m-link {{ Request::is('admin/testimonials*') ? 'active' : '' }}"
                    href="{!! route('testimonials.index') !!}">
                    <i class="icofont-quote-left fs-5"></i>
                    <span>Testimonials</span>
                </a>
            </li>
            <!-- Industries -->
            <li class="{{ Request::is('admin/industry') ? 'active' : '' }}">
                <a class="m-link {{ Request::is('admin/industry') ? 'active' : '' }}"
                    href="{!! route('industry.index') !!}">
                    <i class="icofont-gear fs-5"></i>
                    <span>Industries</span>
                </a>
            </li>

            <!-- Life Images -->
            <li class="{{ Request::is('admin/lifeimage*') ? 'active' : '' }}">
                <a class="m-link {{ Request::is('admin/lifeimage*') ? 'active' : '' }}"
                    href="{!! route('lifeimage.index') !!}">
                    <i class="icofont-image fs-5"></i>
                    <span>Life Images</span>
                </a>
            </li>

            <!-- Quality -->
            <li class="{{ Request::is('admin/quality*') ? 'active' : '' }}">
                <a class="m-link {{ Request::is('admin/quality*') ? 'active' : '' }}"
                    href="{!! route('quality.index') !!}">
                    <i class="icofont-check-circled fs-5"></i>
                    <span>Quality Stages</span>
                </a>
            </li>
            <!-- WhatWeDo -->
            <li class="{{ Request::is('admin/what-we-do*') ? 'active' : '' }}">
                <a class="m-link {{ Request::is('admin/what-we-do*') ? 'active' : '' }}"
                    href="{!! route('what-we-do.index') !!}">
                    <i class="icofont-tasks-alt fs-5"></i>
                    <span>WhatWeDo</span>
                </a>
            </li>
            <!-- Industry Home Slider -->
            <li class="{{ Request::is('admin/industry-home-slider*') ? 'active' : '' }}">
                <a class="m-link {{ Request::is('admin/industry-home-slider*') ? 'active' : '' }}"
                 href="{!! route('industry-home-slider.index') !!}">
                    <i class="icofont-refresh fs-5"></i>
                    <span>Industry Home Slider</span>
                </a>
            </li>
             <!-- Homepage Certification -->
            <li class="{{ Request::is('admin/home-certificate*') ? 'active' : '' }}">
                <a class="m-link {{ Request::is('admin/home-certificate*') ? 'active' : '' }}"
                    href="{{ route('home-certificate.index') }}">
                    <i class="icofont-certificate fs-5"></i>
                    <span>HomePage Certificate</span>
                </a>
            </li>
            <!-- Home Product Slider -->
           <li class="{{ Request::is('admin/home-product-slider*') ? 'active' : '' }}">
                <a class="m-link {{ Request::is('admin/home-product-slider*') ? 'active' : '' }}"
                    href="{!! route('home-product-slider.index') !!}">
                    <i class="icofont-layout fs-5"></i>
                    <span>Home Product Slider</span>
                </a>
            </li>
            <!-- Case Study -->
            <li class="{{ Request::is('admin/casestudy*') ? 'active' : '' }}">
                <a class="m-link {{ Request::is('admin/casestudy*') ? 'active' : '' }}"
                    href="{!! route('casestudy.index') !!}">
                    <i class="icofont-read-book fs-5"></i>
                    <span>Case Study</span>
                </a>
            </li>

            {{-- <!-- News -->
            <li class="{{ Request::is('admin/news*') ? 'active' : '' }}">
                <a class="m-link" href="{!! route('news.index') !!}">
                    <i class="icofont-news fs-5"></i>
                    <span>News</span>
                </a>
            </li> --}}

            <!-- Products -->
            <li class="collapsed {{ Request::is('admin/product*') || Request::is('admin/product-category*') ? 'active' : '' }}">
                <a class="m-link {{ Request::is('admin/product*') || Request::is('admin/product-category*') ? ' active' : '' }}" 
                    data-bs-toggle="collapse" href="#menu-products" role="button" aria-expanded="false" aria-controls="menu-products">
                    <i class="icofont-box fs-5"></i>
                    <span>Products</span>
                    <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
                </a>
                <ul class="sub-menu collapse {{ Request::is('admin/product*') || Request::is('admin/product-category*') ? 'show' : '' }}" id="menu-products">
                    <li class="{{ Request::is('admin/product') ? 'active' : '' }}">
                        <a class="ms-link {{ Request::routeIs('product.index') ? 'active' : '' }}" href="{{ route('product.index') }}">
                            <i class="icofont-label fs-5"></i>
                            <span>All Products</span></a>
                    </li>
                    <li class="{{ Request::is('admin/product-category*') ? 'active' : '' }}">
                        <a class="ms-link {{ Request::routeIs('product-category.index') ? 'active' : '' }}" href="{{ route('product-category.index') }}">
                            <i class="icofont-label fs-5"></i>
                            <span>Product Category</span></a>
                    </li>
                    <li class="{{ Request::is('admin/product-subcategory*') ? 'active' : '' }}">
                        <a class="ms-link {{ Request::routeIs('product-subcategory.index') ? 'active' : '' }}" href="{{ route('product-subcategory.index') }}">
                            <i class="icofont-label fs-5"></i>
                            <span>Product Sub Category</span></a>
                    </li>
                </ul>
            </li>
            <!-- Datasheets -->
            <li class="collapsed {{ Request::is('admin/datasheet-category*') || Request::is('admin/datasheet-subcategory*') ? 'active' : '' }}">
                <a class="m-link {{ Request::is('admin/datasheet-category*') || Request::is('admin/datasheet-subcategory*') ? ' active' : '' }}" data-bs-toggle="collapse" data-bs-target="#menu-category" href="#">
                    <i class="icofont-table fs-5"></i>
                    <span>Datasheets</span>
                    <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
                </a>
                <ul class="sub-menu collapse {{ Request::is('admin/datasheet-category*') || Request::is('admin/datasheet-subcategory*') ? 'show' : '' }}" id="menu-category">
                    <li class="{{ Request::is('admin/datasheet-category*') ? 'active' : '' }}">
                        <a class="ms-link {{ Request::routeIs('datasheet-category.index') ? 'active' : '' }}" href="{!! route('datasheet-category.index') !!}">
                            <i class="icofont-tags fs-5"></i>
                            <span>Category</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/datasheet-subcategory*') && !Request::is('admin/datasheet-category*') ? 'active' : '' }}">
                        <a class="ms-link {{ Request::routeIs('datasheet-subcategory.index') ? 'active' : '' }}" href="{!! route('datasheet-subcategory.index') !!}">
                            <i class="icofont-tags fs-5"></i>
                            <span>Sub Category</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Job -->
            <li class="collapsed {{ Request::is('admin/jobcategory*') || Request::is('admin/job*') ? 'active' : '' }}">
                <a class="m-link  {{ Request::is('admin/jobcategory*') || Request::is('admin/job*') ? ' active' : '' }}" 
                    data-bs-toggle="collapse" data-bs-target="#menu-job" href="#">
                    <i class="icofont-briefcase fs-5"></i>
                    <span>Job</span>
                    <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
                </a>
                <ul class="sub-menu collapse {{ Request::is('admin/jobcategory*') || Request::is('admin/job*') ? 'show' : '' }}" id="menu-job">
                    <li class="{{ Request::is('admin/jobcategory*') ? 'active' : '' }}">
                        <a class="ms-link {{ Request::routeIs('jobcategory.index') ? 'active' : '' }}" href="{!! route('jobcategory.index') !!}">
                            <i class="icofont-tags fs-5"></i>
                            <span>Job Category</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/job*') && !Request::is('admin/jobcategory*') ? 'active' : '' }}">
                        <a class="ms-link {{ Request::routeIs('job.index') ? 'active' : '' }}" href="{!! route('job.index') !!}">
                            <i class="icofont-business-man fs-5"></i>
                            <span>Job</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Sidebar Mini Button -->
        <button type="button" class="btn btn-link sidebar-mini-btn text-light">
            <span class="ms-2"><i class="icofont-bubble-right"></i></span>
        </button>
    </div>
</div>

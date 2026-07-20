@include('layouts.header')
<section>
    <div class="container">
        <!--<img src="{{ asset('public/front/images/vacancies_banner.png') }}" alt="Current Vacancies" class="banner img-fluid">-->
        <div class="banner_wrapper">
            <!-- <picture>-->
            <!--    <source media="(max-width:992px)" srcset="{{asset('public/front/images/flexibel_banner/careers_m.webp')}}" alt="Current Vacancies" class="banner img-fluid bd_rd_10">-->
            <!--    <img src="{{asset('public/front/images/vacancies_banner.png')}}" alt="Current Vacancies" class="banner img-fluid bd_rd_10">-->
            <!--</picture>-->
            <div class="banner_text">
                <div class="">
                    <!--<p class="main_head">Current Vacancies</p>-->
                    <div class="breadcrumb d-none d-md-block">
                        <a href="{{ url('/') }}">Home </a><a href="javascript:void(0)">&nbsp;| Career</a><a href="javascript:void(0)">&nbsp;| Current Vacancies</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mt-100  current-vacancies">
    <div class="container">
        <div class="row  mb-4">
            <div class="col-md-6">
                <h1 class="main_head text-start">Find Your Perfect Fit</h1>
            </div>
            <div class="col-md-6  d-flex justify-content-lg-end">
                <div class=" d-inline-block">
                    <select class="form-select select_vacancies mb-3" id="categoryFilter">
                        <option value="all" selected>Select Category</option>
                            @foreach($job_categories as $category)
                             <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        <!--<option value="engineering">Engineering</option>-->
                        <!--<option value="sales">Sales</option>-->
                        <!--<option value="Operations">Operations</option>-->
                    </select>
                </div>
            </div>
            <p>
                We believe that every role contributes to our shared success. That’s why we provide diverse opportunities across various departments, ensuring you can find a career path that excites and challenges you.                
            </p>
        </div>
        <div class="category-item">
            @foreach($job_categories as $category)
            <div class="row" id="{{ $category->id }}">
                <div class="col-md-5">
                    <h2 class="main_head_red">{{ $category->name}}</h2>
                    <p>{!! html_entity_decode($category->description ?? '') !!}</p>
                </div>
                <div class="col-md-6 offset-md-1">
                     @foreach($jobs[$category->id] ?? [] as $job)
                    <div class="apply-card {{ !$loop->first ? 'mt-4 mt-md-5' : '' }}">
                        <h4 class="sub_title_f34">{{ $job->title }}</h4>
                        <p>{!! html_entity_decode($job->short_description ?? '') !!}</p>
                        <a href="{{ route('vacancy.details',['url'=>$job->url ]) }}" class="prod_btn">Apply Now
                            <span class="svg  ms-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15" fill="none">
                                    <path d="M1.98047 13.5L11.9805 1.5M11.9805 1.5H1.98047M11.9805 1.5V12.4091" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                    </div>
                    @endforeach
                </div>
                @if(!$loop->last)
                <hr>
                @endif
            </div>
            @endforeach
            <!--<div class="row" id="engineering">-->
            <!--    <div class="col-md-5">-->
            <!--        <h2 class="main_head_red">Engineering & Technical</h2>-->
            <!--        <p>Be at the forefront of innovation by working on cutting-edge projects that shape the future. From product design to system engineering, your expertise can make a real impact.</p>-->
            <!--    </div>-->
            <!--    <div class="col-md-6 offset-md-1">-->
            <!--        <div class="apply-card">-->
            <!--            <h4 class="sub_title_f34">Mechanical Design Engineer</h4>-->
            <!--            <p>Lorem ipsum dolor sit amet consectetur. Sed nunc pretium mollis egestas volutpat tellus a. Ac fusce ullamcorper semper ut et lorem laoreet dictumst laoreet. Elit tincidunt felis cursus est. Quisque.</p>-->
            <!--            <a href="#" class="prod_btn">Apply Now-->
            <!--                <span class="svg  ms-2">-->
            <!--                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15" fill="none">-->
            <!--                        <path d="M1.98047 13.5L11.9805 1.5M11.9805 1.5H1.98047M11.9805 1.5V12.4091" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />-->
            <!--                    </svg>-->
            <!--                </span>-->
            <!--            </a>-->
            <!--        </div>-->
            <!--        <div class="apply-card mt-4">-->
            <!--            <h4 class="sub_title_f34">Electrical Design Engineer</h4>-->
            <!--            <p>Lorem ipsum dolor sit amet consectetur. In euismod donec morbi aliquam eu gravida tempor in. Duis magna hendrerit arcu eu dictum non convallis. Duis dui gravida massa cras id sit in nisl lobortis eget.</p>-->
            <!--            <a href="#" class="prod_btn">Apply Now-->
            <!--                <span class="svg  ms-2">-->
            <!--                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15" fill="none">-->
            <!--                        <path d="M1.98047 13.5L11.9805 1.5M11.9805 1.5H1.98047M11.9805 1.5V12.4091" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />-->
            <!--                    </svg> -->
            <!--                </span>-->
            <!--            </a>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--    <hr>-->
            <!--</div>-->
            <!--<div class="row" id="sales">-->
            <!--    <div class="col-md-5">-->
            <!--        <h2 class="main_head_red">Sales & Marketing</h2>-->
            <!--        <p>Drive business growth by crafting compelling strategies, building strong client relationships, and making our brand stand out in the industry.</p>-->
            <!--    </div>-->
            <!--    <div class="col-md-6 offset-md-1">-->
            <!--        <div class="apply-card">-->
            <!--            <h4 class="sub_title_f34">Sales Executive</h4>-->
            <!--            <p>Lorem ipsum dolor sit amet consectetur. Sed nunc pretium mollis egestas volutpat tellus a. Ac fusce ullamcorper semper ut et lorem laoreet dictumst laoreet. Elit tincidunt felis cursus est. Quisque.</p>-->
            <!--            <a href="#" class="prod_btn">Apply Now-->
            <!--                <span class="svg  ms-2">-->
            <!--                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15" fill="none">-->
            <!--                        <path d="M1.98047 13.5L11.9805 1.5M11.9805 1.5H1.98047M11.9805 1.5V12.4091" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />-->
            <!--                    </svg> -->
            <!--                </span>-->
            <!--            </a>-->
            <!--        </div>-->
            <!--        <div class="apply-card mt-4">-->
            <!--            <h4 class="sub_title_f34">Digital Marketing Specialist</h4>-->
            <!--            <p>Lorem ipsum dolor sit amet consectetur. In euismod donec morbi aliquam eu gravida tempor in. Duis magna hendrerit arcu eu dictum non convallis. Duis dui gravida massa cras id sit in nisl lobortis eget.</p>-->
            <!--            <a href="#" class="prod_btn">Apply Now-->
            <!--                <span class="svg  ms-2">-->
            <!--                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15" fill="none">-->
            <!--                        <path d="M1.98047 13.5L11.9805 1.5M11.9805 1.5H1.98047M11.9805 1.5V12.4091" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />-->
            <!--                    </svg> -->
            <!--                </span>-->
            <!--            </a>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--    <hr>-->
            <!--</div>-->
            <!--<div class="row" id="Operations">-->
            <!--    <div class="col-md-5">-->
            <!--        <h2 class="main_head_red">Operations & Supply Chain</h2>-->
            <!--        <p>Ensure seamless business operations through efficient logistics, production management, and process optimization that keep everything running smoothly.</p>-->
            <!--    </div>-->
            <!--    <div class="col-md-6 offset-md-1">-->
            <!--        <div class="apply-card">-->
            <!--            <h4 class="sub_title_f34">Procurement Specialist</h4>-->
            <!--            <p>Lorem ipsum dolor sit amet consectetur. Sed nunc pretium mollis egestas volutpat tellus a. Ac fusce ullamcorper semper ut et lorem laoreet dictumst laoreet. Elit tincidunt felis cursus est. Quisque.</p>-->
            <!--            <a href="#" class="prod_btn">Apply Now-->
            <!--                <span class="svg  ms-2">-->
            <!--                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15" fill="none">-->
            <!--                        <path d="M1.98047 13.5L11.9805 1.5M11.9805 1.5H1.98047M11.9805 1.5V12.4091" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />-->
            <!--                    </svg> -->
            <!--                </span>-->
            <!--            </a>-->
            <!--        </div>-->
            <!--        <div class="apply-card mt-4">-->
            <!--            <h4 class="sub_title_f34">Warehouse Supervisor</h4>-->
            <!--            <p>Lorem ipsum dolor sit amet consectetur. In euismod donec morbi aliquam eu gravida tempor in. Duis magna hendrerit arcu eu dictum non convallis. Duis dui gravida massa cras id sit in nisl lobortis eget.</p>-->
            <!--            <a href="#" class="prod_btn">Apply Now-->
            <!--                <span class="svg  ms-2">-->
            <!--                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="15" viewBox="0 0 13 15" fill="none">-->
            <!--                        <path d="M1.98047 13.5L11.9805 1.5M11.9805 1.5H1.98047M11.9805 1.5V12.4091" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />-->
            <!--                    </svg> -->
            <!--                </span>-->
            <!--            </a>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--    <hr>-->
            <!--</div>-->
           
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categoryFilter = document.getElementById('categoryFilter');
        const categorySection = document.querySelectorAll('.category-section');
        
        categoryFilter.addEventListener('change', function() {
            const selectedValue = this.value;
            
            if (selectedValue === 'all') {
                categorySection.forEach(section => {
                    section.style.display = 'flex';
                });
            } else {
                categorySection.forEach(section => {
                    if (section.dataset.categoryId === selectedValue) {
                        section.style.display = 'flex';
                    } else {
                        section.style.display = 'none';
                    }
                });
            }
        });
    });
</script>
@include('layouts.footer')
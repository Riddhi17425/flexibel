@include('layouts.header')
<section>
    <div class="container">
        <div class="banner_wrapper">
            <!-- <picture>-->
            <!--    <source media="(max-width:992px)" srcset="{{asset('public/front/images/flexibel_banner/terms_condition_m.webp')}}" alt="terms condition banner" class="banner img-fluid bd_rd_10">-->
            <!--    <img src="{{asset('public/front/images/flexibel_banner/terms_condition.webp')}}" alt="terms condition banner" class="banner img-fluid bd_rd_10">-->
            <!--</picture>-->
            <!--<img src="{{asset('public/front/images/privacy_banner.png')}}" alt="privacy" class="banner img-fluid">-->
            <div class="banner_text">
                <div class="">
                    <!--<h1 class="main_head">Terms & Conditions</h1>-->
                    <div class="breadcrumb d-none d-md-block">
                        <a href="{{url('/')}}">Home </a><a href="javascript:void(0)">&nbsp;| Terms & Conditions</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mt-100">
    <div class="container">
        <p>Welcome to the Flexibel. These Terms & Conditions (“Terms”) govern your access to and use of our site, services, and any related content. By visiting or placing an order through the site you agree to abide by these Terms. If you do not agree, please do not use or access our services.</p>
        <div class="mt-3 mt-md-5">
            <h1 class="test_name mb-3">Our Terms And Condition</h1>
            <p>When you use or register on this website, you confirm that you are of legal age to enter into binding contracts. You agree to comply with all applicable laws and these Terms, as well as any policies posted elsewhere on the site. Flexibel reserves the right to update or modify these Terms at any time; changes take effect upon posting, and your continued use constitutes acceptance of the revised Terms.</p>
        </div>
        <div class="mt-3 mt-md-5">
            <h2 class="test_name mb-3">Use of the Website</h2>
            <p>You may browse and download content for personal or internal business use only. Any commercial reproduction, distribution, or resale of site materials without prior written consent is prohibited. You agree not to introduce viruses, malware, or other harmful code, and not to interfere with or disrupt the site’s operation or servers.</p>
        </div>
        <div class="mt-3 mt-md-5">
            <h2 class="test_name mb-3">Intellectual Property Rights</h2>
            <p>All text, graphics, logos, images, and software on this site are the property of Flexibel or its licensors and are protected by copyright, trademark, and other laws. You may not use our trademarks or brand assets without express permission. If you believe any content infringes your rights, please notify us immediately at legal@Flexibel.com.</p>
        </div>
        <div class="mt-3 mt-md-5">
            <h2 class="test_name mb-3">Limitation of Liability and Governing Law</h2>
            <p>Your use of the site and any downloadable resources is at your own risk. Flexibel & its affiliates shall not be liable for indirect, incidental or consequential damages arising from your use of the site. These Terms are governed by the laws of the United Arab Emirates, and any dispute will be subject to the exclusive jurisdiction of the courts in Dubai. </p>
        </div>

    </div>
</section>
@include('layouts.footer')
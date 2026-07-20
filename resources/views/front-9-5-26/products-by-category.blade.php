@include('layouts.header')

<section >
    <div class="container">
        <div class="banner_wrapper">
        
         
            <div class="banner_text">
                <div class="">
                    <!--<p class="main_head">Metallic Expansion Joints</p>-->
                    <div class="breadcrumb d-none d-md-block">
                        <a href="{{ url('/')}}">Home </a><a href="javascript:void(0)">&nbsp;| Products</a> | <a href="{{ route('products.by.category',['category' => $category->url]) }}">{{ $category->name }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mt-100">
    <div class="container">
        <div class="row ">
            <?php  if(url()->current() == 'https://flexibel.ae/product/metallic-expansion-joints') { ?>
            <p class="sub_head ms-0">Our Products</p>
            <h1 class="main_head text-start">Reliable Metal Bellows Solutions for Complex Piping Movements</h1>
            <p>
                Metallic Expansion Joints are flexible components designed to absorb thermal expansion, vibration, and movement in piping systems. Made from stainless steel bellows, they ensure durability and high performance in demanding environments such as power plants, chemical processing, and HVAC systems. Their robust design allows them to handle extreme temperatures and pressures while maintaining system integrity and reducing stress on connected equipment.
            </p>
            <?php } else if(url()->current() == 'https://flexibel.ae/products/rubber-expansion-joints') { ?>
            <p class="sub_head ms-0">Our Products</p>
            <h1 class="main_head text-start">Rubber Expansion Joint
</h1>
            <p>
                Flexible and durable, these joints absorb vibration, noise, and thermal movement while reducing stress on pipelines and equipment. Designed for resilience, they ensure smooth, reliable operation across demanding industrial applications.
            </p>
            <?php }else if(url()->current() == 'https://flexibel.ae/products/metal-hoses') { ?>
            <p class="sub_head ms-0">Our Products</p>
            <h1 class="main_head text-start">metal-hoses</h1>
            <p>
                Engineered for flexibility under extreme conditions, our metal hoses safely handle pressure, temperature, and movement. They deliver leak-proof performance and long-lasting reliability in critical industrial systems.
            </p>
            <?php } ?>
        </div>
        <div class="row mt-0 mt-md-5 g-md-5 gy-5">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="product_card">
                        <a href="{{ route('product-detail', $product->url) }}">
                            <img src="{{asset('public/products/front_image/'.$product->front_image)}}" alt="{{  str_replace(['-', '_'],' ', pathinfo($product->front_image, PATHINFO_FILENAME)) }}" class="img-fluid bd_rd_10">
                            <div class="card-body px-0">
                                <h4 class="card_sub_title mb-2">{{$product->name}}</h4>
                                <div class="card-text">{!! $product->short_description !!}</div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('layouts.footer')
@include('layouts.header')
<section>
    <div class="container">
        <div class="banner_wrapper">
         <div class="banner_text">
            <div class="">
                <div class="breadcrumb d-none d-md-block">
                    <a href="{{ url('/') }}">Home </a><a href="javascript:void(0)">&nbsp;| Products</a><a href="javascript:void(0)">&nbsp;| Metallic Expansion Joints</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>

<section class="mt-100">
    <div class="container">
        <div class="row ">
            <p class="sub_head ms-0">111</p>
            <h2 class="main_head text-start">Reliable Metal Bellows Solutions for Complex Piping Movements</h2>
            <p>
                Metallic Expansion Joints are flexible components designed to absorb thermal expansion, vibration, and movement in piping systems. Made from stainless steel bellows, they ensure durability and high performance in demanding environments such as power plants, chemical processing, and HVAC systems. Their robust design allows them to handle extreme temperatures and pressures while maintaining system integrity and reducing stress on connected equipment.
            </p>
        </div>
        <div class="row mt-5 g-md-5">
            @foreach ($products as $product)
                <div class="col-md-6 col-lg-4">
                    <div class="product_card">
                        <a href="{{route('product-detail',['url'=>$product->url])}}">
                            <img src="{{asset('public/products/front_image/'.$product->front_image)}}" alt="single " class="img-fluid">
                            <div class="card-body px-0">
                                <h4 class="card_sub_title mb-2">{{$product->name}}</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur. Magna at hendrerit augue a in. Mauris molestie eget amet ut.</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('layouts.footer')
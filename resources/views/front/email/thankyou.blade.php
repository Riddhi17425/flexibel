@include('layouts.header')
<style>
    .thank_head{font-size:66px;margin-bottom:0;line-height:70px;}
    .thank_p{font-size:24px;line-height:36px;text-align:center;}
</style>
<div class="container">
    <div class="d-flex flex-column align-items-center gap-3 gap-md-4 mt-4 mt-md-5">
        <h2 class="main_head thank_head">Thank You</h2>
     
        
        @if(session('form_source') === 'consultation')
            <p class="thank_p">
                Thank you for booking a consultation!  
                Our team will review your request and one of our Flexibel engineers will connect with you shortly to discuss your case in detail.  
                You’ll also receive a confirmation email with the meeting details.
            </p>
        @elseif(session('form_source') === 'catalogue')
            <p class="thank_p">
                Thank you for your interest in our catalogue. <br>
                 It will be sent to your email shortly.
            </p>
        @else
            <p class="thank_p">Your enquiry has been submitted successfully.<br>
                    We will get in touch with you shortly.</p>
        @endif
        <img src="{{asset('public/front/images/thankyou_image.webp')}}" alt="thankyou" class="img-fluid">
        <br>
        <a href="{{ url('/') }}" class="prod_btn" tabindex="0">
            Back to Home
            <span class="svg ms-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">
                    <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </span>
        </a>
    </div>
</div>

@include('layouts.footer')
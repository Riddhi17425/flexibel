<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Software;
use App\Models\AboutIndustry;
use App\Models\EmpoweringOperation;
use Illuminate\Support\Facades\Log;
use App\Models\Testimonial;
use App\Models\Clienthome;
use App\Models\Resources;
use App\Models\Blog;
use App\Models\Industry;
use App\Models\HomeCertificate;
use Illuminate\Support\Facades\Http;
use App\Models\Certificate;
use App\Models\Contact;
use App\Models\EnquiryForm;
use App\Models\CaseStudy;
use App\Models\Lifeimage;
use App\Models\Quality;
use App\Models\DataSheetForm;
use App\Models\DatasheetCategory;
use App\Models\DatasheetSubCategory;
use App\Models\WhatWeDo;
use App\Models\HomeProductSlider;
use App\Models\IndustryHomeSlider;
use App\Models\Faq;
use App\Models\Milestone;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobForm;
use App\Models\CaseStudyForm;
use App\Models\TestimonialForm;
use App\Models\Catalogue;
use App\Models\Country;
use App\Mail\SendContactMailToUser;
use App\Mail\SendContactMailToAdmin;
use App\Mail\SendCatalogueMailToUser;
use Google\Client;
use Google\Service\Sheets;
use Carbon\Carbon;
use App\Services\GoogleSheetsService;
use App\Mail\SendCatalogueMailToAdmin;
use App\Mail\SendTestimonialMailToUser;
use App\Mail\SendTestimonialMailToAdmin;
use App\Mail\SendCurrentVacancyMailToUser;
use App\Mail\SendCurrentVacancyMailToAdmin;
use App\Mail\SendCaseStudyMailToUser;
use App\Mail\SendCaseStudyMailToAdmin;
use App\Mail\EnquiryFormMail;
use Illuminate\Support\Str;
use Pdf;
use App\Models\ProductInquiry;
use App\Models\WhatsappInquiry;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    
    public function login(){
        return view('auth.login');
    }
    public function admin(){
        return view('admin.admin');
    }
   public function index()
    {
        $metatitle = "Expansion Joint Suppliers In UAE | Flexibel";
        $metadescription = "Flexibel Expansion Joints is the UAE based manufacturer and suppliers of expansion joints bellows with highest quality standard in the Middle East.";
    
        $certificates = HomeCertificate::whereNull('deleted_at')->get();
        $testimonials = Testimonial::whereNull('deleted_at')->get();
        $clients = Clienthome::whereNull('deleted_at')->get();
        $industries = Industry::whereNull('deleted_at')->get();
        $whatWeDo = WhatWeDo::whereNull('deleted_at')->get();
        $industry_home_slider = IndustryHomeSlider::whereNull('deleted_at')->get();
        $home_product_slider = HomeProductSlider::with('category')->whereNull('deleted_at')->get();
    
        $feed = [];
        $hasLinkedinFeed = false;
    
        try {
            $accessToken = env('LINKEDIN_ACCESS_TOKEN');
            $organizationUrn = 'urn:li:organization:101343518';
    
            if ($accessToken) {
                $url = "https://api.linkedin.com/v2/shares?q=owners&owners={$organizationUrn}&sortBy=LAST_MODIFIED";
    
                $response = Http::withToken($accessToken)
                    ->acceptJson()
                    ->timeout(10)
                    ->get($url);
    
                if ($response->successful()) {
                    $feed = $response->json()['elements'] ?? [];
                    $hasLinkedinFeed = count($feed) > 0;
                }
            }
        } catch (\Exception $e) {
            \Log::error('LinkedIn Feed Exception', [
                'message' => $e->getMessage()
            ]);
        }
    
        return view('front.index', compact(
            'metatitle',
            'metadescription',
            'certificates',
            'testimonials',
            'clients',
            'industries',
            'whatWeDo',
            'industry_home_slider',
            'home_product_slider',
            'feed',
            'hasLinkedinFeed'
        ));
    }

    public function about()
    {
        $metatitle = "About Us | Flexibel Expansion Joints";
        $metadescription = "Flexibel® is a proud participant in the UAE’s “Make it in the Emirates” campaign—part of the nation’s Operation 300Bn strategy to boost industrial growth and reduce reliance on oil.";
        $certificates = HomeCertificate::whereNull('deleted_at')->get();
        $milestones = Milestone::whereNull('deleted_at')->get();
        return view('front.about',compact('certificates','metatitle','metadescription','milestones'));
    }
    public function certificates()
    {
        $metatitle = "Our Globally Recognized Certifications You Can Trust";
        $metadescription = "Our commitment to excellence is validated by globally recognized certifications, ensuring your operations benefit from uncompromising safety, durability, and compliance.";
        $certificates = Certificate::whereNull('deleted_at')->get();
        return view('front.certificates',compact('certificates','metatitle','metadescription'));
    }
    public function Industries()
    {
        $metatitle = "Industries we Serve | Tailored Solutions for Your Sector";
        $metadescription = "Using our precision engineered expansion joints & metal bellows, we make sure a perfect fit for your piping or ductwork system.";
        $industries = Industry::whereNull('deleted_at')->get();
        return view('front.industries',compact('industries','metatitle','metadescription'));
    }
    public function ContactUs()
    {
        $metatitle = "Contact Us | Flexibel Expansion Joints";
        $metadescription = "Have questions about our products or need a custom solution? We’re here to help! Contact us for inquiries, quotes, or technical support.";
        $productCategories = ProductCategory::whereNull('deleted_at')->get();
        return view('front.contact',compact('metatitle','metadescription', 'productCategories'));
    }
    public function Quality()
    {
        $metatitle = "Quality & Compliance of Our Products";
        $metadescription = "At Flexibel, we are committed to delivering the highest quality products through a rigorous Quality Assurance (QA) and Quality Control (QC) program.";
        $qualities = Quality::whereNull('deleted_at')->get();
        return view('front.quality',compact('qualities','metatitle','metadescription'));
    }
    public function Integrated()
    {
        $metatitle = "Quality & Compliance of Our Products";
        $metadescription = "At Flexibel, we are committed to delivering the highest quality products through a rigorous Quality Assurance (QA) and Quality Control (QC) program.";
        $qualities = Quality::whereNull('deleted_at')->get();
        return view('front.integrated',compact('qualities','metatitle','metadescription'));
    }
    public function DesignCalculation()
    {
        $metatitle = "Our Operational Integrity at Flexibel";
        $metadescription = "At Flexibel, our Independent Audit provides a full operational assessment, confirming joint condition, and benchmarking performance.";
        return view('front.comprehensive-audit',compact('metatitle','metadescription'));
    }
    public function PremiumService()
    {
        $metatitle = "Our Engineering & Design Approach | Flexibel Expansion Joints";
        $metadescription = "At Flexibel Expansion Joints, every joint starts with design. And a good design prevents failures, extends service life, and lowers total cost of ownership.";
        return view('front.engineering-design',compact('metatitle','metadescription'));
    }
    public function OnsiteService()
    {
        $metatitle = "Experience Our Flexibel On-Site Service";
        $metadescription = "At Flexibel, our on-site services bring our specialized knowledge and capabilities directly to your facility, ensuring optimal performance and minimizing disruptions.";
        return view('front.onsite_service',compact('metatitle','metadescription'));
    }
     public function InspectionServices()
    {
        $metatitle = "Our Quality Assurance & Inspection Process";
        $metadescription = "At Flexibel, inspection and QA are embedded  for material verification to ensure joints don’t just meet standards; but prove performance in the field.";
        return view('front.inspection-and-qa',compact('metatitle','metadescription'));
    }
     public function EmergencyServices()
    {
        $metatitle = "Our Emergency Services & Turnaround Support";
        $metadescription = "At Flexibel our Emergency Services & Support provide rapid turnaround from urgent design to on-site installation  within as little as 24 hours.";
        return view('front.emergency-turnaround-support',compact('metatitle','metadescription'));
    }
    public function Logistics()
    {
        $metatitle = "Our Field Services & Repair at Flexibel";
        $metadescription = "Our Flexibel’s Field Services ensure your expansion joints are installed, maintained, and restored with precision for safer installation & extended service life.";
        return view('front.field_service_repair',compact('metatitle','metadescription'));
    }
    public function ProductInquiryStore(Request $request)
    {
        // 🔒 Honeypot check
    if (!empty($request->website_url)) {
        // If the hidden field is filled → block as spam
        return back()->with('error', 'Invalid form submission.');
    }
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:50',
            'company_name' => 'required|string|max:50',
            'product_name' => 'nullable|string|max:50',
            'email' => 'required|email|max:60',
            'mobile' => 'required|digits_between:10,15',
            'country' => 'nullable|string|max:50',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // ✅ Store in DB (example)
        ProductInquiry::create([
            'name' => $request->fullname,
            'company_name' => $request->company_name,
            'product_name' => $request->product_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'country' => $request->country,
            
        ]);
        $sheetData = [
                    'form_type'=>'Product Form',
                    'name' => $request->name ?? $request->fullname ?? '',
                    'product_name' => $request->product_name ?? '',
                    'company_name' => $request->company_name ?? '', 
                    'contact' => $request->contact ?? $request->mobile ?? '',
                    'email' => $request->email ?? '',
                    'country' => $request->country ?? '',
                    'message' => $request->message ?? '',
                    'date' => now()->format('Y-m-d H:i:s')
                ];
            $response = Http::timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/json'
                ])
                ->post('https://script.google.com/macros/s/AKfycbyYHXGsCEykTxRvd600fQZR_IvtS9qNXknn0d17ZbDhWawJ8VUuPSjMUOxp8-WFle4G/exec', $sheetData);
 
            // Check response
            if ($response->successful()) {
                $responseData = $response->json();
                if (isset($responseData['status']) && $responseData['status'] === 'success') {
                    Log::info('Data successfully sent to Google Sheets', [
                        'email' => $request->email,
                        'response' => $responseData
                    ]);
                                return redirect()->route('thank-you')->with('success', 'Your message has been sent successfully.');
 
                } else {
                    Log::warning('Google Sheets API returned error', [
                        'response' => $responseData,
                        'email' => $request->email
                    ]);
                    return redirect()->route('thank-you')->with('success', 'Your message has been sent successfully.');
 
                }
            } else {
                Log::error('Google Sheets API request failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'email' => $request->email
                ]);
                    return redirect()->route('thank-you')->with('success', 'Your message has been sent successfully.');
 
            }
        // return redirect("thank-you")->with('success', 'Your enquiry has been submitted successfully.');
    }
    // public function submit(Request $request)
    // {
    // // 🔒 Honeypot check
    // if (!empty($request->website_url)) {
    //     // If the hidden field is filled → block as spam
    //     return back()->with('error', 'Invalid form submission.');
    // }
    //     $validated = $request->validate([
    //         'fullname' => 'required|string|max:255',
    //         'company_name' => 'required|string|max:255',
    //         'mobile' => 'nullable|string|max:20',
    //         'email' => 'required|email|max:255',
    //         'message' => 'required|string',
    //         // 'g-recaptcha-response' => 'required|captcha',
    //     ]);
    //     $contactData = [
    //         'fullname' => $validated['fullname'],
    //         'company_name' => $validated['company_name'],
    //         'mobile' => $validated['mobile'],
    //         'email' => $validated['email'],
    //         'message' => $validated['message'],
    //     ];
    //     Contact::create($contactData);
    //         $sheetData = [
    //                 'form_type'=>'Contact Form',
    //                 'name' => $request->name ?? $request->fullname ?? '',
    //                 'product_name' => $request->product_name ?? '',
    //                 'company_name' => $request->company_name ?? '', 
    //                 'contact' => $request->contact ?? $request->mobile ?? '',
    //                 'email' => $request->email ?? '',
    //                 'country' => $request->country ?? '',
    //                 'message' => $request->message ?? '',
    //                 'date' => now()->format('Y-m-d H:i:s')
    //             ];
    //     try {
    //         Mail::to($validated['email'])->send(new SendContactMailToUser());
    //         Mail::to(['arvind@intelliworkz.com','webdeveloper11.intelliworkz@gmail.com','jeet@intelliworkz.tech'])->send(new SendContactMailToAdmin($contactData));
    //       return redirect()->route('thank-you')->with([
    //         'success' => true,
    //         'form_source' => $request->form_source ?? 'inquiry'
    //     ]);
    //     } catch (\Exception $e) {
    //         Log::error('Email sending failed: ' . $e->getMessage());
    //         // dd($e);
    //         return back()->with('error', 'Failed to send the email. Please try again later.');
    //     }
    //     $response = Http::timeout(30)
    //             ->withHeaders([
    //                 'Content-Type' => 'application/json'
    //             ])
    //             ->post('https://script.google.com/macros/s/AKfycbyYHXGsCEykTxRvd600fQZR_IvtS9qNXknn0d17ZbDhWawJ8VUuPSjMUOxp8-WFle4G/exec', $sheetData);
 
    //         // Check response
    //         if ($response->successful()) {
    //             $responseData = $response->json();
    //             if (isset($responseData['status']) && $responseData['status'] === 'success') {
    //                 Log::info('Data successfully sent to Google Sheets', [
    //                     'email' => $request->email,
    //                     'response' => $responseData
    //                 ]);
    //                 return redirect()->route('thank-you')->with('success', 'Your message has been sent successfully.');
 
    //             } else {
    //                 Log::warning('Google Sheets API returned error', [
    //                     'response' => $responseData,
    //                     'email' => $request->email
    //                 ]);
    //                 return redirect()->route('thank-you')->with('success', 'Your message has been sent successfully.');
 
    //             }
    //         } else {
    //             Log::error('Google Sheets API request failed', [
    //                 'status' => $response->status(),
    //                 'body' => $response->body(),
    //                 'email' => $request->email
    //             ]);
    //                 return redirect()->route('thank-you')->with('success', 'Your message has been sent successfully.');
 
    //         }
    // }
    public function submit(Request $request)
    {
        // Honeypot check
        if (!empty($request->website_url)) {
            return back()->with('error', 'Invalid form submission.');
        }
      
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'mobile' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);
    
        $contactData = [
            'fullname' => $validated['fullname'],
            'company_name' => $validated['company_name'],
            'mobile' => $validated['mobile'],
            'email' => $validated['email'],
            'message' => $validated['message'],
            'category_id' => is_numeric($request->category_id) ? $request->category_id : null,
            'requirement_type' => !is_numeric($request->category_id) ? $request->category_id : null
        ];
        $contact = Contact::create($contactData);
        // Prepare data for Google Sheet
        $sheetData = [
            'form_type' => $request->form_source ?? 'Contact Form',
            'name' => $validated['fullname'],
            //'category' => $contact->category ? $contact->category->name : "Test Cat",
            'category' => is_numeric($request->category_id) ? ($contact->category ? $contact->category->name : '') : $contact->requirement_type,
            'product_name' => $request->product_name ?? '',
            'company_name' => $validated['company_name'],
            'contact' => $validated['mobile'],
            'email' => $validated['email'],
            'country' => $request->country ?? '',
            'message' => $validated['message'],
            'date' => now()->format('Y-m-d H:i:s'),
        ];
        
        try {
            // 🟢 First push data to Google Sheet
            $response = Http::timeout(30)
                ->withHeaders(['Content-Type' => 'application/json'])
                ->post('https://script.google.com/macros/s/AKfycbyYHXGsCEykTxRvd600fQZR_IvtS9qNXknn0d17ZbDhWawJ8VUuPSjMUOxp8-WFle4G/exec', $sheetData);
    
            if ($response->failed()) {
                Log::error('Google Sheets API request failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
            }
    
            // 🟢 Then send emails
            Mail::to($validated['email'])->send(new SendContactMailToUser());
            Mail::to(['sales@flexibel.ae'])->send(new SendContactMailToAdmin($contactData));
    
            // 🟢 Finally redirect after everything completes
            return redirect()->route('thank-you')->with([
                'success' => true,
                'form_source' => $request->form_source ?? 'inquiry'
            ]);
        } catch (\Exception $e) {
            Log::error('Contact Form Error: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function Thankyou()
    { 
        return view('front.email.thankyou');
    }
    
    public function ViewFeeds()
    {
        $metatitle = "Check Our LinkedIn Feeds for Latest Updates & Insights";
        $metadescription = "Browse our LinkedIn posts to get latest news, product updates, technical tips, and industry insights.";
    
        $accessToken = env('LINKEDIN_ACCESS_TOKEN');
        $organizationUrn = 'urn:li:organization:101343518';
        $baseUrl = "https://api.linkedin.com/v2/shares";
    
        $feed = [];
        $start = 0;
        $count = 10; // you can increase it to 20 or max allowed by LinkedIn
        $hasMore = true;
    
        while ($hasMore) {
            $url = "{$baseUrl}?q=owners&owners={$organizationUrn}&sortBy=LAST_MODIFIED&start={$start}&count={$count}";
    
            $response = Http::withToken($accessToken)
                ->acceptJson()
                ->get($url);
    
            if ($response->successful()) {
                $result = $response->json();
                $elements = $result['elements'] ?? [];
                $feed = array_merge($feed, $elements);
    
                // Check if there's a next page
                $total = $result['paging']['total'] ?? 0;
                $start += $count;
    
                if ($start >= $total) {
                    $hasMore = false;
                }
            } else {
                \Log::error('LinkedIn API Error', ['response' => $response->body()]);
                break; // stop on error
            }
        }
    
        return view('front.view_feeds', compact('metatitle', 'metadescription', 'feed'));
    }

    public function FAQ()
    {
        $metatitle = "Frequently Asked Questions | Flexibel Expansion Joints";
        $metadescription = "Read our FAQs to get answers to common questions about FlexiBellows products, materials, customization options, and maintenance.";
        $faqs = Faq::whereNull('deleted_at')->get();
        return view('front.faq',compact('faqs','metatitle','metadescription'));
    }
    
    public function PrivacyPolicy()
    { 
        $metatitle = "Privacy Policy | Flexibel Expansion Joints";
        $metadescription = "Read our privacy policy to learn how we gather, use, share, and protect your information when you use our services or visit our website (the Site).";
        return view('front.privacy-policy',compact('metatitle','metadescription'));
    }
    public function TermsAndCondition()
    {
        $metatitle = "Terms & Conditions | Flexibel Expansion Joints";
        $metadescription = "Read our terms & conditions govern your access to and use of our site, services, privacy & legal compliance, and any related content.";
        return view('front.terms-condition',compact('metatitle','metadescription'));
    }
    public function CaseStudies()
    {
        $metatitle = "Case Studies | Explore Our Success Stories";
        $metadescription = "Explore our case studies showcasing the real world solutions and seamless experience for our clients in the oil and gas, marine, energy, and nuclear sectors.";
        $casestudies = CaseStudy::whereNull('deleted_at')->get();
        return view('front.case-studies',compact('casestudies','metatitle','metadescription'));
    }
    public function CaseStudiesDetails($url)
    {
        $caseStudy = CaseStudy::where('casestudy_url', $url)->first();
        $metatitle = $caseStudy->meta_title;
        $metadescription = $caseStudy->meta_description;
        return view('front.case-studies-detail',compact('caseStudy','metatitle','metadescription'));
    }
    public function Blog() 
    {  
        $metatitle = "Latest Blogs & Insights About Industrial Excellence";
        $metadescription = "Explore our latest blogs & news to stay informed and up to date. Get insights, trends, and updates about our products in one place!  ";
        $blogs = Blog::where('status', 'Active')->whereNull('deleted_at')->orderBy('date', 'desc')->get();
        return view('front.blogs',compact('blogs','metatitle','metadescription'));
    }
    public function BlogDetails($url)
    {
        $blog_details = Blog::where('url',$url)
        //->where('status', 'Active')
        ->whereNull('deleted_at')->firstOrFail();
        // dd($blog_details->meta_title);
        $metatitle = $blog_details->meta_title;
        $metadescription = $blog_details->meta_description;
        return view('front.blog-detail',compact('blog_details','metatitle','metadescription'));
    }
    public function Datasheets()
    {
        $metatitle = "Explore Our Technical Brochures & Datasheets";
        $metadescription = "Explore our datasheets for metallic expansion joints to check technical specs, dimensions, materials & performance for your engineering needs.";
        $datasheet_categories = DatasheetCategory::with('subcategories')->get();
        $countries = Country::orderBy('name')->get();
        return view('front.datasheets',compact('datasheet_categories','metatitle','metadescription'));
    }
    public function DatasheetForm(Request $request)
    {
        // 🔒 Honeypot check
    if (!empty($request->website_url)) {
        // If the hidden field is filled → block as spam
        return back()->with('error', 'Invalid form submission.');
    }
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'mobile' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
            'city' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        $DataSheetForm = [
            'fullname' => $validated['fullname'],
            'mobile' => $validated['mobile'],
            'email' => $validated['email'],
            'city' => $validated['city'],
            'message' => $validated['message'],
        ];
        DataSheetForm::create($DataSheetForm);

        try {
            // Mail::to($validated['email'])->send(new SendBrochureToUser());
            // Mail::to(['webdeveloper3.intelliworkz@gmail.com','mital@intelliworkz.tech','webdeveloper11.intelliworkz@gmail.com'])->send(new SendBrochureToAdmin($DataSheetForm));
          return redirect()->route('thank-you')->with('success', 'Your message has been sent successfully.');
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to send the email. Please try again later.');
        }
    }
    public function LifeAtFlexibellows()
    {
        $metatitle = "Datasheets";
        $metadescription = "Flexibellow Datasheets description";
        $lifeimages = Lifeimage::all();
        return view('front.life_at_flexibellows',compact('lifeimages','metatitle','metadescription'));
    }
    public function EnquiryForm()
    {
        $metatitle = "Enquiry Form | Expansion Joint Form";
        $metadescription = "Have requirements for expansion joints, bellows, hoses, or similar products? Fill out our enquiry form to get a quick response from our expert team at Flexibel.";
        $countries = Country::orderBy('name')->get();
        $categories = ProductCategory::orderBy('name')->get();
        return view('front.enquiry',compact('countries','categories','metatitle','metadescription'));
    }
    public function getProductsByJoint($id)
    {
        $products = Product::where('category_id', $id)->orderBy('name')->get();
        return response()->json($products);
    }
    public function EnquirySubmit(Request $request)
    {
        if (!empty($request->website_url)) {
            return back()->with('error', 'Invalid form submission.');
        }
        
        if (
            empty($request->fullname) ||
            empty($request->company_name) ||
            empty($request->contact) ||
            empty($request->email) ||
            empty($request->country)
        ) {
            Log::warning('Enquiry form skipped (required fields missing)', [
                'fullname' => $request->fullname,
                'company_name' => $request->company_name,
                'contact' => $request->contact,
                'email' => $request->email,
                'country' => $request->country
            ]);
    
            return redirect()->route('thank-you')
                ->with('success', 'Your enquiry has been submitted successfully.');
        }
     
        $post = new EnquiryForm();
        $post->fullname = $request->fullname;
        $post->company_name = $request->company_name;
        $post->address = $request->address;
        $post->country = $request->country;
        $post->contact = $request->contact;
        $post->fax_number = $request->fax_number;
        $post->email = $request->email;
        $post->web_address = $request->web_address;
        $post->joint_type = $request->joint_name;
        $post->product = $request->product_name;
        $post->nominal_diameter = $request->nominal_diameter;
        $post->article_number = $request->article_number;
        $post->length = $request->length;
        $post->quantity = $request->quantity;
        $post->inner_sleeve = $request->inner_sleeve;
        $post->cover = $request->cover;
        $post->pickling = $request->pickling;
        $post->marking = $request->marking;
        $post->marking_specify = $request->marking_specify;
        $post->aisi = $request->aisi;
        $post->aisi_other = $request->aisi_other;
        $post->materialCertBellow = $request->materialcertbellow;
        $post->design_params = $request->design_params;
        $post->ped_approval = $request->ped_approval;
        $post->connection1 = $request->connection1;
        $post->pn_ansi1 = $request->pn_ansi1;
        $post->connection2 = $request->connection2;
        $post->pn_ansi2 = $request->pn_ansi2;
        $post->material_cert_connections = $request->material_cert_connections;
        $post->material_cert_request = $request->material_cert_request;//rename
        $post->coating = $request->coating;
        $post->coating_others = $request->coating_others;//rename
        $post->working_pressure_min = $request->working_pressure_min;
        $post->working_pressure_max = $request->working_pressure_max;
        $post->design_pressure_min = $request->design_pressure_min;
        $post->design_pressure_max = $request->design_pressure_max;
        $post->working_temp_min =   $request->working_temp_min;
        $post->working_temp_max = $request->working_temp_max;
        $post->design_temp_min = $request->design_temp_min;
        $post->design_temp_max = $request->design_temp_max;
        $post->application_medium = $request->application_medium;
        $post->axial_movement = $request->axial_movement;
        $post->axial_movement_min = $request->axial_movement_min;
        $post->axial_movement_max = $request->axial_movement_max;
        $post->lateral_movement = $request->lateral_movement;
        $post->lateral_movement_min = $request->lateral_movement_min;
        $post->lateral_movement_max = $request->lateral_movement_max;
        $post->angular_movement = $request->angular_movement;
        $post->angular_movement_min = $request->angular_movement_min;
        $post->angular_movement_max = $request->angular_movement_max;
        $post->cycle_life = $request->cycle_life;
        $post->liquid_dye_penetrant = $request->penetrant;
        $post->x_ray = $request->x_ray;
        $post->air_leakage = $request->air_leakage;
        $post->helium_leakage = $request->helium_leakage;
        $post->hydrostatic_pressure = $request->hydrostatic_pressure;
        $post->other_ndt = $request->Otherndt;
        $post->ndt_specify = $request->ndt_specify;
        $post->ppap = $request->ppap;
        $post->dimension_report = $request->dimension_report;
        $post->ndt_report = $request->ndt_report;
        $post->dimension3D = $request->dimension3D;
        $post->other_doc = $request->other_doc;
        $post->doc_specify = $request->doc_specify;
        $post->special_req = $request->special_req;
        $post->save();
        $sheetData = [
                    'form_type'=>'Enquiry Form',
                    'name' => $request->name ?? $request->fullname ?? '',
                    'product_name' => $request->product_name ?? '',
                    'company_name' => $request->company_name ?? '', 
                    'contact' => $request->contact ?? $request->mobile ?? '',
                    'email' => $request->email ?? '',
                    'country' => $request->country ?? '',
                    'message' => $request->message ?? '',
                    'date' => now()->format('Y-m-d H:i:s')
                ];
    
        if ($post) {
        $directory = public_path('enquiry_pdf');
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }
        $pdf = Pdf::loadView('front.pdf.enquiry', ['data' => $post]);
        $fileName = 'enquiry_' . Str::uuid() . '.pdf';
        $filePath = $directory . '/' . $fileName;
        $pdf->save($filePath);
        $fileUrl = asset('public/enquiry_pdf/' . $fileName);
        Mail::to(['sales@flexibel.ae'])->send(new EnquiryFormMail($request->all(), $fileUrl)
        );
        $response = Http::timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/json'
                ])
                ->post('https://script.google.com/macros/s/AKfycbyYHXGsCEykTxRvd600fQZR_IvtS9qNXknn0d17ZbDhWawJ8VUuPSjMUOxp8-WFle4G/exec', $sheetData);
 
            // Check response
            if ($response->successful()) {
                $responseData = $response->json();
                if (isset($responseData['status']) && $responseData['status'] === 'success') {
                    Log::info('Data successfully sent to Google Sheets', [
                        'email' => $request->email,
                        'response' => $responseData
                    ]);
                                return redirect()->route('thank-you')->with(['carrername' => $request->partnername]);
 
                } else {
                    Log::warning('Google Sheets API returned error', [
                        'response' => $responseData,
                        'email' => $request->email
                    ]);
                    return redirect()->route('thank-you')->with('success', 'Your message has been sent successfully.');
 
                }
            } else {
                Log::error('Google Sheets API request failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'email' => $request->email
                ]);
                    return redirect()->route('thank-you')->with('success', 'Your message has been sent successfully.');
 
            }
        // return redirect()->route('thank-you')->with(['carrername' => $request->partnername]);
        } else {
            return redirect()->back()->with('error', 'Failed to submit the form. Try again.');
        }
    }
    public function productsByCategory($category)
    {
       
        $category = ProductCategory::where('url', $category)->firstOrFail();
        $metatitle= $category->meta_title;
        $metadescription= $category->meta_description;
        $products = $category->products()->whereNull('deleted_at')->get();
        # dd($products);
        return view('front.products-by-category', compact('products', 'category','metatitle','metadescription'));
    }
    public function metallicproductsByCategory()
    {
       
        $category = ProductCategory::where('url', 'metallic-expansion-joints')->firstOrFail();
        $metatitle= $category->meta_title;
        $metadescription= $category->meta_description;
        $products = $category->products()->whereNull('deleted_at')->get();
        # dd($products);
        return view('front.products-by-category', compact('products', 'category','metatitle','metadescription'));
    }
    public function ProductDetail($url=null)
    {
       
        $product_detail = Product::where('url', $url)->whereNull('deleted_at')->firstOrFail();
        $metatitle = $product_detail->meta_title;
        $metadescription = $product_detail->meta_description;
        return view('front.product_detail',compact('product_detail','metatitle','metadescription'));
    }
    
    public function CurrentVacancies()
    {
        $metatitle = "Current Vacancies | Flexibel Expansion Joints";
        $metadescription = "Find diverse opportunities we provide across various departments, ensuring you can find a career path that excites and challenges you.";
        
        $job_categories = JobCategory::whereNull('deleted_at')->get();
        
        $jobs = Job::whereNull('deleted_at')
            ->orderBy('jobcategory_id')
            ->get()
            ->groupBy('jobcategory_id');
            
        return view('front.current-vacancies',compact('metatitle','metadescription','jobs','job_categories'));
    }
    
    public function VacanciesDetails($url) {
        
        $job = Job::where('url', $url)->whereNull('deleted_at')->firstOrFail();
        $metatitle = $job->meta_title;
        $metadescription =  $job->meta_description;
        
        return view('front.current-vacancie-details', compact('metatitle', 'metadescription', 'job'));
    }
    
    public function JobDetailsForm()
    {
        $metatitle = '';
        $metadescription = '';
        return view('front.current-vacancies-detail',compact('metatitle', 'metadescription'));
    }
    
    public function JobDetailsSubmit(Request $request)
    {
        // 🔒 Honeypot check
    if (!empty($request->website_url)) {
        // If the hidden field is filled → block as spam
        return back()->with('error', 'Invalid form submission.');
    }
        $validated = $request->validate([
            'fullname' => 'required|string',
            'year' => 'required|numeric',
            'phone' => 'required|string|max:30',
            'email' => 'required|email',
            'message' => 'required|string',
            'resume' => 'required|mimes:pdf,doc,docx|max:5120',
            'applied_for' => 'required|string'
        ]);

        $resumePath = null;
        if ($request->hasFile('resume')) {
            $resumeFile = $request->file('resume');
            $resumeName = $resumeFile->getClientOriginalName();
            $resumeFile->move(public_path('resume_uploads'), $resumeName);
            $resumePath =  'resume_uploads/' .$resumeName;
        }
        
        
        JobForm::create([
        'fullname' => $validated['fullname'],
        'year' => $validated['year'],
        'phone' => $validated['phone'],
        'email' => $validated['email'],
        'message' => $validated['message'],
        'resume' => $resumePath,
        'applied_for' => $validated['applied_for'],
    ]);
        $jobData = [
        'fullname' => $validated['fullname'],
        'year' => $validated['year'],
        'phone' => $validated['phone'],
        'email' => $validated['email'],
        'message' => $validated['message'],
        'resume' => $resumePath,
        'applied_for' => $validated['applied_for'],
    ];

        try {
            Mail::to($validated['email'])->send(new SendCurrentVacancyMailToUser());
            Mail::to(['sales@flexibel.ae'])->send(new SendCurrentVacancyMailToAdmin($jobData));
          return redirect()->route('thank-you')->with('success', 'Your message has been sent successfully.');
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to send the email. Please try again later.');
        }
        
        //return redirect()->route('thank-you')->with('success', 'Form submitted successfully!');
       
    }
    
    public function CatalogueForm()
    { 
        return view('front.catalogue');
    }
    public function CatalogueSubmit(Request $request)
    {
        // 🔒 Honeypot check
    if (!empty($request->website_url)) {
        // If the hidden field is filled → block as spam
        return back()->with('error', 'Invalid form submission.');
    }
        $validated = $request->validate([
            'fullname' => 'required|string',
            'company_name' => 'required',
            'phone' => 'required|string|max:30',
            'email' => 'required|email',
            'message' => 'required|string',
            //'g-recaptcha-response' => 'required', 
        ]);
        
        $catalogueData = [
            'fullname' => $validated['fullname'],
            'company_name' => $validated['company_name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'message' => $validated['message'],
        ];
        Catalogue::create($catalogueData);
            $sheetData = [
                    'form_type'=>'Catelogue Form',
                    'name' => $request->name ?? $request->fullname ?? '',
                    'product_name' => $request->product_name ?? '',
                    'company_name' => $request->company_name ?? '', 
                    'contact' => $request->phone ?? '',
                    'email' => $request->email ?? '',
                    'country' => $request->country ?? '',
                    'message' => $request->message ?? '',
                    'date' => now()->format('Y-m-d H:i:s')
                ];
                try {
            // 1️⃣ Send data to Google Sheets
            $response = Http::timeout(30)
                ->withHeaders(['Content-Type' => 'application/json'])
                ->post('https://script.google.com/macros/s/AKfycbyYHXGsCEykTxRvd600fQZR_IvtS9qNXknn0d17ZbDhWawJ8VUuPSjMUOxp8-WFle4G/exec', $sheetData);
        
            Log::info('Google Sheet Response', ['status' => $response->status(), 'body' => $response->body()]);
        
            // 2️⃣ Then send mail
            Mail::to($validated['email'])->send(new SendCatalogueMailToUser());
            Mail::to(['sales@flexibel.ae'])
                ->send(new SendCatalogueMailToAdmin($catalogueData));
        
            // 3️⃣ Then redirect
            return redirect()->route('thank-you')->with('success', 'Your message has been sent successfully.')->with('form_source', 'catalogue');
        
        } catch (\Exception $e) {
            Log::error('CatalogueSubmit failed: ' . $e->getMessage());
            return back()->with('error', 'Something went wrong, please try again.');
        }

        $response = Http::timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/json'
                ])
                ->post('https://script.google.com/macros/s/AKfycbyYHXGsCEykTxRvd600fQZR_IvtS9qNXknn0d17ZbDhWawJ8VUuPSjMUOxp8-WFle4G/exec', $sheetData);
 
            // Check response
            if ($response->successful()) {
                $responseData = $response->json();
                if (isset($responseData['status']) && $responseData['status'] === 'success') {
                    Log::info('Data successfully sent to Google Sheets', [
                        'email' => $request->email,
                        'response' => $responseData
                    ]);
                                return redirect()->route('thank-you')->with('success', 'Your message has been sent successfully.')->with('form_source', 'catalogue');
 
                } else {
                    Log::warning('Google Sheets API returned error', [
                        'response' => $responseData,
                        'email' => $request->email
                    ]);
                    return redirect()->route('thank-you')->with('success', 'Your message has been sent successfully.')->with('form_source', 'catalogue');
 
                }
            } else {
                Log::error('Google Sheets API request failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'email' => $request->email
                ]);
                    return redirect()->route('thank-you')->with('success', 'Your message has been sent successfully.')->with('form_source', 'catalogue');
 
            }
    }
    
    public function TestimonialForm()
    { 
        return view('front.testimonial');
    }
    
    public function TestimonialSubmit(Request $request)
    {
        // 🔒 Honeypot check
    if (!empty($request->website_url)) {
        // If the hidden field is filled → block as spam
        return back()->with('error', 'Invalid form submission.');
    }
        $validated = $request->validate([
            'fullname' => 'required|string',
            'mobile' => 'required|string|max:15',
            'email' => 'required|email',
            'message' => 'required|string',
            'country' => 'required|string',
           
            //'g-recaptcha-response' => 'required', 
        ]);

        $testimonialData = [
            'fullname' => $validated['fullname'],
            'mobile' => $validated['mobile'],
            'email' => $validated['email'],
            'message' => $validated['message'],
            'country' => $validated['country'],
        ];
        TestimonialForm::create($testimonialData);
        $sheetData = [
                    'form_type'=>'Testimonial Form',
                    'name' => $request->name ?? $request->fullname ?? '',
                    'product_name' => $request->product_name ?? '',
                    'company_name' => $request->company_name ?? '', 
                    'contact' => $request->contact ?? $request->mobile ?? '',
                    'email' => $request->email ?? '',
                    'country' => $request->country ?? '',
                    'message' => $request->message ?? '',
                    'date' => now()->format('Y-m-d H:i:s')
                ];
        try {
            Mail::to($validated['email'])->send(new SendTestimonialMailToUser());
            Mail::to(['sales@flexibel.ae'])->send(new SendTestimonialMailToAdmin($testimonialData));
          return redirect()->route('thank-you')->with('success', 'Your message has been sent successfully.');
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to send the email. Please try again later.');
        }
        $response = Http::timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/json'
                ])
                ->post('https://script.google.com/macros/s/AKfycbyYHXGsCEykTxRvd600fQZR_IvtS9qNXknn0d17ZbDhWawJ8VUuPSjMUOxp8-WFle4G/exec', $sheetData);
 
            // Check response
            if ($response->successful()) {
                $responseData = $response->json();
                if (isset($responseData['status']) && $responseData['status'] === 'success') {
                    Log::info('Data successfully sent to Google Sheets', [
                        'email' => $request->email,
                        'response' => $responseData
                    ]);
                                return redirect()->route('thank-you')->with('success', 'Your message has been sent successfully.');
 
                } else {
                    Log::warning('Google Sheets API returned error', [
                        'response' => $responseData,
                        'email' => $request->email
                    ]);
                    return redirect()->route('thank-you')->with('success', 'Your message has been sent successfully.');
 
                }
            } else {
                Log::error('Google Sheets API request failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'email' => $request->email
                ]);
                    return redirect()->route('thank-you')->with('success', 'Your message has been sent successfully.');
 
            }
        
        //return redirect()->route('thank-you')->with('success', 'Your message has been sent successfully.');
    }
    
    public function CaseStudyForm()
    { 
        return view('front.casestudy');
    }
    
    public function CaseStudySubmit(Request $request)
    {
        // 🔒 Honeypot check
    if (!empty($request->website_url)) {
        // If the hidden field is filled → block as spam
        return back()->with('error', 'Invalid form submission.');
    }
        $validated = $request->validate([
            'fullname' => 'required|string',
            'mobile' => 'required|string|max:15',
            'email' => 'required|email',
            'message' => 'required|string',
            'country' => 'required|string',
           
            //'g-recaptcha-response' => 'required', 
        ]);

        $casestudyData = [
            'fullname' => $validated['fullname'],
            'mobile' => $validated['mobile'],
            'email' => $validated['email'],
            'message' => $validated['message'],
            'country' => $validated['country'],
        ];
        CaseStudyForm::create($casestudyData);
        $sheetData = [
                    'form_type'=>'Casestudy Form',
                    'name' => $request->name ?? $request->fullname ?? '',
                    'product_name' => $request->product_name ?? '',
                    'company_name' => $request->company_name ?? '', 
                    'contact' => $request->contact ?? $request->mobile ?? '',
                    'email' => $request->email ?? '',
                    'country' => $request->country ?? '',
                    'message' => $request->message ?? '',
                    'date' => now()->format('Y-m-d H:i:s')
                ];
        try {
            Mail::to($validated['email'])->send(new SendCaseStudyMailToUser());
            Mail::to(['sales@flexibel.ae'])->send(new SendCaseStudyMailToAdmin($casestudyData));
          return redirect()->route('thank-you')->with('success', 'Your message has been sent successfully.');
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to send the email. Please try again later.');
        }
        $response = Http::timeout(30)
                ->withHeaders([
                    'Content-Type' => 'application/json'
                ])
                ->post('https://script.google.com/macros/s/AKfycbyYHXGsCEykTxRvd600fQZR_IvtS9qNXknn0d17ZbDhWawJ8VUuPSjMUOxp8-WFle4G/exec', $sheetData);
 
            // Check response
            if ($response->successful()) {
                $responseData = $response->json();
                if (isset($responseData['status']) && $responseData['status'] === 'success') {
                    Log::info('Data successfully sent to Google Sheets', [
                        'email' => $request->email,
                        'response' => $responseData
                    ]);
                                return redirect()->route('thank-you')->with('success', 'Your message has been sent successfully.');
 
                } else {
                    Log::warning('Google Sheets API returned error', [
                        'response' => $responseData,
                        'email' => $request->email
                    ]);
                    return redirect()->route('thank-you')->with('success', 'Your message has been sent successfully.');
 
                }
            } else {
                Log::error('Google Sheets API request failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'email' => $request->email
                ]);
                    return redirect()->route('thank-you')->with('success', 'Your message has been sent successfully.');
 
            }
        
       // return redirect()->route('thank-you')->with('success', 'Your message has been sent successfully.');
    }
    public function whatsaapinquiry(Request $request)
    {
        WhatsappInquiry::create([
           
            'number'  => $request->number,
            'message'  => $request->message,
        ]);
    
        $timestamp = Carbon::now()->format('Y-m-d H:i:s');
    
        // Google Sheet expects:
        // form_type, contact, message, date
        $sheetsData = [
            'form_type' => 'whatsapp inquiry',
            'contact'   => $request->number,
            'message'  => $request->message,
            'date'      => $timestamp,
        ];
        try {
            Http::withHeaders(['Content-Type' => 'application/json'])
                ->post('https://script.google.com/macros/s/AKfycbym2KuE7PPWIGoCj3CLf4mnqxOdmB7wkL808rjBf-UQqfT1emQiqtw7LkVLTbYeP2ns/exec', 
                    $sheetsData
                );
        } catch (\Exception $e) {
            \Log::error('Google Sheets Exception (WhatsApp Inquiry):', [
                'message'   => $e->getMessage(),
                'trace'     => $e->getTraceAsString(),
                'data_sent' => $sheetsData
            ]);
        }
    
        
        $number = '971529037473'; // Change if needed
        $message = 'Inquiry from the website.';
        $whatsappUrl = "https://api.whatsapp.com/send/?phone={$number}&text=" . urlencode($message);
    
        return redirect()->away($whatsappUrl);
    }

    public function getCountries(Request $request)
    {
        // Exact match for auto-select on page load
        if ($request->has('exact')) {
            return response()->json([
                'results' => Country::where('name', $request->exact)
                    ->selectRaw('id, name as text')
                    ->get()
            ]);
        }
    
        // Default Select2 search
        if ($request->has('term')) {
            $term = $request->term;
            return response()->json([
                'results' => Country::where('name', 'LIKE', "%{$term}%")
                    ->selectRaw('id, name as text')
                    ->orderBy('name')
                    ->get()
            ]);
        }
    
        return response()->json(['results' => []]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
 
}
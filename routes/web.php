<?php

use App\Http\Controllers\admin\adminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\usersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LinkedInController;
use App\Http\Controllers\SimpleLinkedInController;
use App\Http\Controllers\DirectLinkedInController;
use App\Http\Controllers\RegistationController;
use App\Http\Controllers\superAdminController;
use App\Http\Controllers\admin\CertificateController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\ImageSliderController;
use App\Http\Controllers\admin\VideoController;
use App\Http\Controllers\admin\MilestoneController;
use App\Http\Controllers\admin\ClientSaysController;
use App\Http\Controllers\admin\ClienthomeController;
use App\Http\Controllers\admin\JobCategoryController;
use App\Http\Controllers\admin\JobController;
use App\Http\Controllers\admin\IndustryController;
use App\Http\Controllers\admin\LifeimageController;
use App\Http\Controllers\admin\CaseStudyController;
use App\Http\Controllers\admin\QualityController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProductCategoryController;
use App\Http\Controllers\admin\ProductSubCategoryController;
use App\Http\Controllers\admin\TestimonialsController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\WhatWeDoController;
use App\Http\Controllers\admin\IndustryHomeSliderController;
use App\Http\Controllers\admin\HomeProductSliderController;
use App\Http\Controllers\admin\HomeCertificateController;
use Illuminate\Support\Facades\Artisan;
// use App\Http\Controllers\adminController;
use App\Http\Controllers\SitemapController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Front route
Route::get('clear', function () {
    Artisan::call('optimize:clear');
    return 'Optimization cache cleared!';
});

// START - DYNAMIC SITEMAP
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
// END - DYNAMIC SITEMAP

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/about', [DashboardController::class, 'about'])->name('about');
    Route::get('/certificates', [DashboardController::class, 'certificates'])->name('certificate');
    Route::get('/industries', [DashboardController::class, 'Industries'])->name('industries');
    Route::get('/contact-us', [DashboardController::class, 'ContactUs'])->name('contact-us');
    Route::get('/quality', [DashboardController::class, 'Quality'])->name('quality');
    Route::get('/integrat', [DashboardController::class, 'Integrated'])->name('integrated');
    Route::get('/comprehensive-audit', [DashboardController::class, 'DesignCalculation'])->name('design-calculation');
    Route::get('/engineering-and-design', [DashboardController::class, 'PremiumService'])->name('premium-service');
    Route::get('/onsite-service', [DashboardController::class, 'OnsiteService'])->name('onsite-service');
    Route::get('/inspection-and-quality-analysis', [DashboardController::class, 'InspectionServices'])->name('Inspection-services');
    Route::get('/emergency-and-turnaround-support', [DashboardController::class, 'EmergencyServices'])->name('emergency-services');
    Route::get('/field-services-and-repair', [DashboardController::class, 'Logistics'])->name('logistics');
    Route::post('/contact-submit', [DashboardController::class, 'submit'])->name('contact.submit');
    Route::get('/thank-you', [DashboardController::class, 'Thankyou'])->name('thank-you');
    Route::get('/faq', [DashboardController::class, 'FAQ'])->name('faq');
    Route::get('/privacy-policy', [DashboardController::class, 'PrivacyPolicy'])->name('privacy-policy');
    Route::get('/terms-and-condition', [DashboardController::class, 'TermsAndCondition'])->name('terms-condition');
    Route::get('/case-study', [DashboardController::class, 'CaseStudies'])->name('case-studies');
    Route::get('/case-study/{url}', [DashboardController::class, 'CaseStudiesDetails'])->name('case-studies-detail');
    Route::get('/blog', [DashboardController::class, 'Blog'])->name('blog');
    Route::get('/blog/{url}', [DashboardController::class, 'BlogDetails'])->name('blog-detail');
    Route::get('/datasheets', [DashboardController::class, 'Datasheets'])->name('datasheets');
    Route::get('/enquiry-form', [DashboardController::class, 'EnquiryForm'])->name('enquiry-form');
    Route::post('/enquiry-form-submit', [DashboardController::class, 'EnquirySubmit'])->name('enquiry-submit');
    Route::get('/life-at-flexibellows', [DashboardController::class, 'LifeAtFlexibellows'])->name('life-at-flexibellows');
    Route::get('products/{category}', [DashboardController::class, 'productsByCategory'])->name('products.by.category');
    Route::get('product/metallic-expansion-joints', [DashboardController::class, 'metallicproductsByCategory'])->name('product.metallic-expansion-joints');
    Route::get('/product/{url?}', [DashboardController::class, 'ProductDetail'])->name('product-detail');
    Route::get('/get-products-by-joint/{id}', [DashboardController::class, 'getProductsByJoint']);
    
    Route::get('/current-vacancies', [DashboardController::class, 'CurrentVacancies'])->name('current.vacancies');
    Route::get('current-vacancies/{url}', [DashboardController::class, 'VacanciesDetails'])->name('vacancy.details');
    
    Route::get('current-vacancies-detail', [DashboardController::class, 'JobDetailsForm'])->name('job-details.form');
    Route::post('current-vacancies-detail/submit', [DashboardController::class, 'JobDetailsSubmit'])->name('job-details.submit');
    
    Route::get('/catalogue', [dashboardController::class, 'CatalogueForm'])->name('catalogue.form');
    Route::post('/catalogue-submit', [dashboardController::class, 'CatalogueSubmit'])->name('catalogue.submit');
    Route::get('/testimonial', [dashboardController::class, 'TestimonialForm'])->name('testimonial.form');
    Route::post('/testimonial-submit', [dashboardController::class, 'TestimonialSubmit'])->name('testimonial.submit');
    Route::post('/datasheet-submit', [DashboardController::class, 'DatasheetForm'])->name('datasheet.submit');
    Route::get('/get-countries', [dashboardController::class, 'getCountries'])->name('get.countries');
    Route::post('/whatsaapinquiry', [DashboardController::class, 'whatsaapinquiry'])->name('whatsaapinquiry');
     Route::get('/casestudy', [dashboardController::class, 'CaseStudyForm'])->name('casestudy.form');
    Route::post('/casestudy-submit', [dashboardController::class, 'CaseStudySubmit'])->name('casestudy.submit');
    Route::get('/view-all-feeds', [dashboardController::class, 'ViewFeeds'])->name('view.feeds');
   Route::get('/linkedin-posts', [App\Http\Controllers\LinkedInController::class, 'fetchPosts']);

    Route::post('/product-enquiry', [DashboardController::class, 'ProductInquiryStore'])->name('product.enquiry.submit');
Route::get('login', [DashboardController::class, 'login'])->name('login');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/user', [usersController::class, 'user'])->name('user');
    Route::get('/admin/dashboard',[DashboardController::class, 'admin'])->name('/admin/dashboard');
    Route::get('/superAdmin', [superAdminController::class, 'superAdmin'])->name('superAdmin');  

 	Route::get('/admin/dashboard', [adminController::class, 'admin'])->name('admin/dashboard');
	Route::resource('admin/certificate', CertificateController::class);
	Route::resource('admin/faq', FaqController::class);
    Route::resource('admin/blog', BlogController::class);
    Route::resource('admin/imageslider', ImageSliderController::class);
    Route::resource('admin/video', VideoController::class);
    Route::resource('admin/milestone', MilestoneController::class);
    Route::resource('admin/clientsays', ClientSaysController::class);
    Route::resource('admin/clienthome', ClienthomeController::class);
    Route::resource('admin/testimonials', TestimonialsController::class);
    Route::resource('admin/jobcategory', JobCategoryController::class);
    Route::resource('admin/job', JobController::class);
    Route::resource('admin/industry', IndustryController::class);
    Route::resource('admin/lifeimage', LifeimageController::class);
    Route::resource('admin/quality', QualityController::class);
    Route::resource('admin/casestudy', CaseStudyController::class);
    Route::resource('admin/news', NewsController::class);
    Route::resource('admin/product', ProductController::class);
    Route::resource('admin/product-category', ProductCategoryController::class);
     Route::resource('admin/product-subcategory', ProductSubCategoryController::class);
    Route::resource('admin/datasheet-category', CategoriesController::class);
    Route::resource('admin/datasheet-subcategory', SubCategoryController::class);
    Route::resource('admin/what-we-do', WhatWeDoController::class);
    Route::resource('admin/home-certificate', HomeCertificateController::class);
    Route::resource('admin/home-product-slider', HomeProductSliderController::class);
    Route::resource('admin/industry-home-slider', IndustryHomeSliderController::class);

    Route::prefix('backend')->group(function () {
        // Route::get('home', [adminController::class, 'index'])->name('home');
    });     
});
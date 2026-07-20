@include('layouts.header')
<style>
    .required-star {
        color: red;
    }
    .display-none {
        display: none !important;
    }
    .text-error {
        color: red !important;
        font-weight: 600;
    }
    .select2-container--default .select2-selection--single{
        border-radius:0!important;border:none!important;
        border-bottom:1px solid #bbb!important;
    }
    .select2-container--default .select2-selection--single {
        height: 37px;
    }
    

</style>
<section>
    <div class="container">
        <div class="banner_wrapper">
        
        <div class="banner_text">
            <div class="">
                <!--<h1 class="main_head">Enquire now</h1>-->
                <div class="breadcrumb d-none d-md-block">
                    <a href="{{url('/')}}">Home </a><a href="{{route('contact-us')}}">&nbsp;| Contact</a><a
                        href="javascript:void(0)">&nbsp;| Enquire Now</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>

<section class="iq_form mt-100">
    <div class="container">
        <p class="sub_head ms-0">Enquire</p>
        <h2 class="main_head text-start">Expansion Joint Form</h2>
        <div class="stepper_wrapper mt-100">
            <form id="enquiryForm" action="{{route('enquiry-submit')}}" method="post">
                @csrf
                <div style="display:none;">
                    <input type="text" name="website_url" id="website_url" value="">
                </div>
                <!-- form tab -->
                <div class="stepper-header">
                     <div class="step active step_title-1"><span class="d-none d-xl-block">COMPANY & BASIC PRODUCT INFO</span><span class="d-block d-xl-none">1</span></div>
                    <div class="step step_title-2"><span class="d-none d-xl-block">TECHNICAL CONFIGURATION</span><span class="d-block d-xl-none">2</span></div>
                    <div class="step step_title-3"><span class="d-none d-xl-block">APPLICATION DETAILS & QUALITY SPECS</span><span class="d-block d-xl-none">3</span></div>
                </div>
                <!-- form tab -->
                <!-- Step 1: Company Information -->
                <div id="step-1" class="step-content">
                    <h2 class="main_head d-block d-xl-none">COMPANY &amp; BASIC PRODUCT INFO</h2>
                    <div class="form-section">
                        <h4 class="sub_title">COMPANY INFORMATION</h4>
                        <div class="row"> 
                            <div class="col-md-6 mb-lg-5 mb-md-5 mb-5">
                                <label>Your Name <span class="required-star">*</span> </label>
                                <input type="text" name="fullname" maxlength="50" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')" class="form-control" placeholder="Enter your full name">
                            </div>
                            <div class="col-md-6 mb-md-5 mb-md-5 mb-5">
                                <label>Company Name<span class="required-star">*</span> </label>
                                <input type="text" name="company_name" maxlength="50" oninput="this.value = this.value.replace(/[^A-Za-z0-9\s]/g, '')" class="form-control" placeholder="Enter your company name">
                            </div>
                            <div class="col-md-6 mb-lg-5 mb-md-5 mb-5">
                                <label>Address</label>
                                <input type="text" name="address" maxlength="100" class="form-control" placeholder="Enter your address">
                            </div>
                            <div class="col-md-6 mb-lg-5 mb-md-5 mb-5">
                                <label>Country </label>
                                <select class="form-select" id="country-select" name="country">
                                  <option value="">Select Country</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-lg-5 mb-md-5 mb-5">
                                <label>Contact Number<span class="required-star">*</span></label>
                                <input type="tel" name="contact" class="form-control" minlength="10" maxlength="15" 
                                    oninput="this.value = this.value.replace(/[^0-9+()\-\s]/g, '').slice(0, 20);"
                                    pattern="^\+?[1-9]\d{1,3}[-\s]?\d{6,14}$"
                                    placeholder="Enter your contact number">
                            </div>
                            {{-- <div class="col-md-6 mb-lg-5 mb-md-5 mb-5">
                                <label>Fax Number</label>
                                <input type="tel" name="fax_number" minlength="10" maxlength="15" oninput="this.value = this.value.replace(/[^0-9+()\-\s]/g, '').slice(0, 20);"
                                    pattern="^\+?[1-9]\d{1,3}[-\s]?\d{6,14}$"
                                    class="form-control" placeholder="Enter your fax number">
                            </div> --}}
                            <div class="col-md-6 mb-lg-5 mb-md-5 mb-5">
                                <label>Email Address<span class="required-star">*</span></label>
                                <input type="email" name="email" maxlength="60" class="form-control" placeholder="Enter your email ID">
                            </div>
                           <div class="col-md-6 mb-lg-5 mb-md-5 mb-5">
                                <label>Website</label>
                                <input type="text" name="web_address" id="web_address" maxlength="100" class="form-control"
                                       value="http://"
                                       placeholder="e.g., http://example.com">
                                <small class="text-danger" id="web_error" style="display: none;">Please enter a valid web address ending with .com, .net, .org, .in, .co, .ae, .tech or .edu</small>
                            </div>

                        </div>
                    </div>

                    <div class="form-section">
                        <h4 class="sub_title">EXPANSION JOINT SELECTION</h4>
                        <div class="row">
                            <div class="col-md-6 mb-lg-5 mb-md-5 mb-5">
                                <label>Type of Expansion Joint<span class="required-star">*</span></label>
                                <select class="form-select nominal-select" id="joint_type" name="joint_type">
                                    <option disabled selected>Choose Type</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <!-- Hidden field to store selected joint name -->
                                <label id="error-joint-type" class="text-danger  error-message small" style="display:block; margin-top:3px; position:absolute;">This field is required.</label>
                                
                                <input type="hidden" name="joint_name" id="joint_name">
                            </div>
                            
                            <!-- Product -->
                            <div class="col-md-6 mb-lg-5 mb-md-5 mb-5">
                                <label>Select one Product</label>
                                <select class="form-select nominal-select" id="product" name="product">
                                    <option disabled selected>Select one Product</option>
                                </select>
                                <!-- Hidden field to store selected product name -->
                                <input type="hidden" name="product_name" id="product_name">
                            </div>
                            <div class="col-md-6 mb-lg-5 mb-md-5 mb-5">
                                <label>Nominal Diameter (DN)<span class="required-star">*</span> </label>
                                <select class="form-select nominal-select" name="nominal_diameter" id="nominal_diameter">
                                    <option disabled selected value="">Choose an option</option>
                                    <option value="DN50">DN50</option>
                                    <option value="DN65">DN65</option>
                                    <option value="DN80">DN80</option>
                                    <option value="DN100">DN100</option>
                                    <option value="DN125">DN125</option>
                                    <option value="DN150">DN150</option>
                                    <option value="DN200">DN200</option>
                                    <option value="DN250">DN250</option>
                                    <option value="DN300">DN300</option>
                                    <option value="DN350">DN350</option>
                                    <option value="DN400">DN400</option>
                                    <option value="DN450">DN450</option>
                                    <option value="DN500">DN500</option>
                                    <option value="DN600">DN600</option>
                                    <option value="DN700">DN700</option>
                                    <option value="DN800">DN800</option>
                                    <option value="DN900">DN900</option>
                                    <option value="DN1000">DN1000</option>
                                    <option value="DN1100">DN1100</option>
                                    <option value="DN1200">DN1200</option>
                                    <option value="DN1300">DN1300</option>
                                    <option value="DN1400">DN1400</option>
                                    <option value="DN1500">DN1500</option>
                                    <option value="DN1600">DN1600</option>
                                    <option value="DN1700">DN1700</option>
                                    <option value="DN1800">DN1800</option>
                                    <option value="DN1900">DN1900</option>
                                    <option value="DN2000">DN2000</option>
                                    <option value="DN2100">DN2100</option>
                                    <option value="DN2200">DN2200</option>
                                    <option value="DN2300">DN2300</option>
                                    <option value="DN2400">DN2400</option>
                                    <option value="DN2500">DN2500</option>
                                    <option value="DN2600">DN2600</option>
                                    <option value="DN2700">DN2700</option>
                                    <option value="DN2800">DN2800</option>
                                    <option value="DN2900">DN2900</option>
                                    <option value="DN3000">DN3000</option>
                                    <option value="DN3200">DN3200</option>
                                    <option value="DN3400">DN3400</option>
                                    <option value="DN3600">DN3600</option>
                                    <option value="DN3800">DN3800</option>
                                    <option value="DN4000">DN4000</option>
                                    <option value="DN4200">DN4200</option>
                                    <option value="DN4400">DN4400</option>
                                    <option value="DN4600">DN4600</option>
                                    <option value="DN4800">DN4800</option>
                                    <option value="DN5000">DN5000</option>
                                </select>
                                <label id="error-nominal-select" class="text-danger  error-message small" style="display:block; margin-top:3px; position:absolute;">This field is required.</label>

                            </div>
                            <div class="col-md-6 mb-lg-5 mb-md-5 mb-5">
                                <label>Length<span class="required-star">*</span></label>
                                <input type="number"  oninput="if(this.value < 1) this.value=''; if(this.value > 10000) this.value=10000;" min="1" max="1000" name="length" class="form-control" placeholder="Length in mm">
                                <!--<input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="length" class="form-control" placeholder="Length in mm">-->
                            </div>
                        </div>
                        <!--<div class="row mb-3">-->

                        <!--</div>-->
                        <div class="row mb-3">
                            <!--<div class="col-md-6 mb-lg-5 mb-md-5 mb-5">-->
                            <!--    <label>Length<span class="required-star">*</span></label>-->
                            <!--    <input type="number"  oninput="if(this.value < 1) this.value=''; if(this.value > 10000) this.value=10000;" min="1" max="1000" name="length" class="form-control" placeholder="Length in mm">-->
                            <!--</div>-->
                            <div class="col-md-6  mb-lg-5 mb-md-5 mb-5">
                                <label>Quantity<span class="required-star">*</span></label>
                                <input type="number"  oninput="if(this.value < 1) this.value=''; if(this.value > 50000) this.value=50000;" min="1" max="1000" name="quantity" class="form-control" placeholder="Type here">
                                <!--<input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="quantity" class="form-control" placeholder="Type here">-->
                            </div>
                        </div>
                    </div>

                    <div class="col-12 text-center">
                        <a href="javascript:void(0)" class="prod_btn" data-step="1" onclick="nextStep(2)">
                            Next
                            <span class="svg ms-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                    fill="none">
                                    <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
                <!-- Step 1: Company Information -->
                <!-- Step 2: Technical Configuration -->
                <div id="step-2" class="step-content display-none" >
                    <h2 class="main_head d-block d-xl-none">TECHNICAL CONFIGURATION</h2>
                    <div class="form-section">
                        <h4 class="sub_title">BELLOW</h4>
                        <div class="row">
                            <div class="col-md-4 mb-lg-5 mb-md-5 mb-5">
                                <label for="aisi">AISI<span class="required-star">*</span></label>
                                <select class="form-select nominal-select" id="aisi" name="aisi">
                                    <option disabled selected value="">Select AISI</option>
                                    <option value="304">AISI 321</option>
                                    <option value="316">AISI 316</option>
                                    <option value="304">AISI 304</option>
                                    <option value="310">AISI 310</option>
                                    <option value="others">others</option>
                                    <!-- Add more as needed -->
                                </select>
                                <label id="error-aisi-select" class="text-danger  error-message small" style="display:block; margin-top:3px; position:absolute;">This field is required.</label>

                            </div>
                            <div class="col-md-4 mb-lg-5 mb-md-5 mb-5">
                                <label>Other</label>
                                <input type="text" id="aisi_other" maxlength="50" name="aisi_other" class="form-control" placeholder="Type here">
                            </div>
                        </div>
                        <div class="row">
                           
                            <div class="col-md-4 col-xxl-4 col-xl-4 mb-lg-5 mb-md-5 mb-5">
                                <div class="radio_wrapper">
                                    <label>Material certificate requested<span class="required-star">*</span></label>
                                    <div class="radio-group">
                                        <input type="radio" name="materialcertbellow" value="yes" id="materialCertBellowYes"> <label
                                            for="materialCertBellowYes">Yes</label>
                                        <input type="radio" name="materialcertbellow" value="no" id="materialCertBellowNo"> <label
                                            for="materialCertBellowNo">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-xxl-5 col-xl-5 mb-lg-5 mb-md-5 mb-5">
                                <div class="radio_wrapper">
                                    <label>Design parameters in acc. with EJMA 10<span class="required-star">*</span></label>
                                    <div class="radio-group">
                                        <input type="radio" name="design_params" value="yes" id="designParamsYes"> <label
                                            for="designParamsYes">Yes</label>
                                        <input type="radio" name="design_params" value="no" id="designParamsNo"> <label
                                            for="designParamsNo">No</label>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="form-section">
                        <h4 class="sub_title">CONNECTION DETAILS</h4>
                        <div class="row">
                            <div class="col-md-6 mb-lg-5 mb-md-5 mb-5">
                                <label>Connection 1</label>
                                <select class="form-select nominal-select" id="connection1" name="connection1">
                                    <option disabled selected>Select One</option>
                                    <option value="onlybellows">Only Bellow</option>
                                    <option value="weldedends">Welded Ends</option>
                                    <option value="groovedends">Grooved Ends</option>
                                    <option value="flanged(floating)">Flanged (Floating)</option>
                                    <option value="flanged(fixed)">Flanged (Fixed)</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-lg-5 mb-md-5 mb-5">
                                <label>PN/ANSI</label>
                                <input type="text" id="pn_ansi1" maxlength="10" name="pn_ansi1" class="form-control" placeholder="Type here">
                            </div>
                            <div class="col-md-6 mb-lg-5 mb-md-5 mb-5">
                                <label>Connection 2</label>
                                <select class="form-select nominal-select" id="connection2" name="connection2">
                                    <option  disabled selected>Select One</option>
                                    <option value="onlybellows">Only Bellow</option>
                                    <option value="weldedends">Welded Ends</option>
                                    <option value="groovedends">Grooved Ends</option>
                                    <option value="flanged(floating)">Flanged (Floating)</option>
                                    <option value="flanged(fixed)">Flanged (Fixed)</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-lg-5 mb-md-5 mb-5">
                                <label>PN/ANSI</label>
                                <input type="text" id="pn_ansi2" maxlength="10" name="pn_ansi2" class="form-control" placeholder="Type here">
                            </div>
                            <div class="col-md-6 mb-lg-5 mb-md-5 mb-5">
                                <label>Material of the Connections</label>
                                <select class="form-select nominal-select" name="material_cert_connections">
                                    <option disabled selected>Select One</option>
                                    <option value="carbonsteel">Carbon Steel St 37.2</option>
                                    <option value="Aisi316">AISI 316</option>
                                    <option value="Aisi304">AISI 304</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-lg-5 mb-md-5 mb-5" style=" align-content: flex-end; ">
                                <div class="radio_wrapper">
                                    <label>Material certificate requested<span class="required-star">*</span></label>
                                    <div class="radio-group">
                                        <input type="radio" name="material_cert_request" value="yes"
                                            id="materialCertConnectionsYes">
                                        <label for="materialCertConnectionsYes">Yes</label>
                                        <input type="radio" name="material_cert_request" value="no"
                                            id="materialCertConnectionsNo">
                                        <label for="materialCertConnectionsNo">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-lg-5 mb-md-5 mb-5">
                                <label>Coating of the Connections</label>
                                <select class="form-select nominal-select" name="coating">
                                    <option disabled selected>Select One</option>
                                    <option value="painted">Painted</option>
                                    <option value="galvanized">Galvanized</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-lg-5 mb-md-5 mb-5">
                                <label>Other</label>
                                <input type="text" name="coating_others" maxlength="50" class="form-control" placeholder="Type here">
                            </div>
                        </div>
                    </div>

                    <div class="form-section mb-5">
                        <h4 class="sub_title">EXPANSION JOINT SPECIFICATIONS</h4>
                        <div class="row">
                            <div class="col-md-4 mb-lg-5 mb-md-5 mb-5">
                                <div class="radio_wrapper">
                                    <label>Inner Sleeve<span class="required-star">*</span></label>
                                    <div class="radio-group">
                                        <input type="radio" name="inner_sleeve" value="yes" id="innerSleeveYes"> <label
                                            for="innerSleeveYes">Yes</label>
                                        <input type="radio" name="inner_sleeve" value="no"  id="innerSleeveNo" class="ms-3"> <label
                                            for="innerSleeveNo">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-lg-5 mb-md-5 mb-5">
                                <div class="radio_wrapper">
                                    <label>Cover<span class="required-star">*</span></label>
                                    <div class="radio-group">
                                        <input type="radio" name="cover" value="yes" id="coverYes"> <label
                                            for="coverYes">Yes</label>
                                        <input type="radio" name="cover" value="no" id="coverNo" class="ms-3"> <label
                                            for="coverNo">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-lg-5 mb-md-5 mb-5">
                                <div class="radio_wrapper">
                                    <label>100% Pickling<span class="required-star">*</span></label>
                                    <div class="radio-group">
                                        <input type="radio" name="pickling" value="yes" id="picklingYes"> <label
                                            for="picklingYes">Yes</label>
                                        <input type="radio" name="pickling" value="no" id="picklingNo" class="ms-3"> <label
                                            for="picklingNo">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                             <div class="col-md-3 mb-lg-0 mb-5">
                                <div class="radio_wrapper">
                                    <label>Marking<span class="required-star">*</span></label>
                                    <div class="radio-group">
                                        <input type="radio" name="marking" value="yes" id="markingYes"> <label
                                            for="markingYes">Yes</label>
                                        <input type="radio" name="marking" value="no" id="markingNo" class="ms-3"> <label
                                            for="markingNo">No</label>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-4 mb-lg-0 mb-5">
                                <div class="radio_wrapper">
                                    <label>Please specify<span class="required-star" id="marking_specify_star">*</span>:</label>
                                    <input type="text" id="marking_specify" maxlength="20" name="marking_specify" class="form-control pt-0" placeholder="Please specify">
                                    <span class="text-danger error-marking_specify mb-5" style="display: none; margin-top: 38px;">This field is required.</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 text-center">
                        <a href="javascript:void(0)" class="back_btn" data-step="1" onclick="prevSteps(1)">
                            <span class="svg me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">
                                    <path d="M11.3809 13L1.38086 1M1.38086 1H11.3809M1.38086 1V11.9091" stroke="#C12729" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                            Back
                        </a>
                        <a href="javascript:void(0)" class="prod_btn" data-step="2" onclick="nextStep(3)">
                            Next
                            <span class="svg ms-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                    fill="none">
                                    <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
                <!-- Step 2: Technical Configuration -->
                <!-- Step 3: Application Details & Quality Specs -->
                {{-- <div id="step-3" class="step-content display-none" > --}}
                <div id="step-3" class="step-content display-none" >

                    <h2 class="main_head d-block d-xl-none">APPLICATION DETAILS &amp; QUALITY SPECS</h2>
                    <div class="form-section">
                        <h4 class="sub_title">OPERATING CONDITIONS</h4>
                        <div class="row gx-5">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h6 class="red_head">Working Pressure<span class="required-star">*</span></h6>
                                    </div>
                                    <div class="col-lg-6 mb-lg-5 mb-md-5 mb-5">
                                        <small>Min.:</small>
                                        <div class="input-wrapper">
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" minlength="1" maxlength="3" name="working_pressure_min" class="form-control " placeholder="Type here">
                                            <span class="unit-label">Bar</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-lg-5 mb-md-5 mb-5">
                                        <small>Max.:</small>
                                        <div class="input-wrapper">
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" minlength="1" maxlength="3" name="working_pressure_max" class="form-control " placeholder="Type here">
                                            <span class="unit-label">Bar</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div id="working_pressure_error" class="error-message text-danger small mt-1" style="display:none;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row gx-5">
                                    <div class="col-lg-12">
                                        <h6 class="red_head">Design Pressure<span class="required-star">*</span></h6>
                                    </div>
                                    <div class="col-lg-6 mb-lg-5  mb-md-5 mb-5">
                                        <small>Min.:</small>
                                        <div class="input-wrapper">
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" minlength="1" maxlength="3" name="design_pressure_min" class="form-control " placeholder="Type here">
                                            <span class="unit-label">Bar</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-lg-5  mb-md-5 mb-5">
                                        <small>Max.:</small>
                                        <div class="input-wrapper">
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" minlength="1" maxlength="3" name="design_pressure_max" class="form-control " placeholder="Type here">
                                            <span class="unit-label">Bar</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div id="design_pressure_error" class="error-message text-danger small mt-1" style="display:none;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gx-5">
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h6 class="red_head">Working Temperature (°C)<span class="required-star">*</span></h6>
                                    </div>
                                    <div class="col-lg-6 mb-lg-5  mb-md-5 mb-5">
                                        <small>Min.:</small>
                                        <div class="input-wrapper">
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" minlength="1" maxlength="3" name="working_temp_min" class="form-control " placeholder="Type here">
                                            <span class="unit-label"> °C</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-lg-5  mb-md-5 mb-5">
                                        <small>Max.:</small>
                                        <div class="input-wrapper">
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" minlength="1" maxlength="3" name="working_temp_max" class="form-control " placeholder="Type here">
                                            <span class="unit-label"> °C</span>
                                        </div>
                                    </div>
                                        <div class="col-lg-12">
                                            <div id="working_temp_error" class="error-message text-danger small mt-1" style="display:none;"></div>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row gx-5">
                                    <div class="col-lg-12">
                                        <h6 class="red_head">Design Temperature (°C)<span class="required-star">*</span></h6>
                                    </div>
                                    <div class="col-lg-6 mb-lg-5  mb-md-5 mb-5">
                                        <small>Min.:</small>
                                        <div class="input-wrapper">
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" minlength="1" maxlength="3" name="design_temp_min" class="form-control " placeholder="Type here">
                                            <span class="unit-label"> °C</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-lg-5  mb-md-5 mb-5">
                                        <small>Max.:</small>
                                        <div class="input-wrapper">
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" minlength="1" maxlength="3" name="design_temp_max" class="form-control " placeholder="Type here">
                                            <span class="unit-label"> °C</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div id="design_temp_error" class="error-message text-danger small mt-1" style="display:none;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Application / Medium<span class="required-star">*</span></label>
                                <input type="text" name="application_medium" maxlength="100" class="form-control" placeholder="Enter your message">
                                <div id="application_medium_error" class="error-message text-danger small mt-1" style="display:none;"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-section minus-plus-group">
                        <h4 class="sub_title">MOVEMENT</h4>
                         <div class="row">
                            <div class="col-lg-5 mb-3">
                                <div class="radio_wrapper">
                                    <label class="col-md-4">Axial Movement <span class="required-star">*</span></label>
                                    <div class="input-wrapper col-md-8">
                                        <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" min="1" maxlength="6" name="axial_movement" class="form-control mt-2" placeholder="Type here">
                                        <span class="unit-label">mm</span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div id="axial_movement_error" class="error-message text-danger" style="display:none;"></div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <span class="input-group-text">-</span>
                                    <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" min="1" maxlength="4" name="axial_movement_min" class="form-control" id="font-size-minus" placeholder="">
                                    <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" min="1" maxlength="4" name="axial_movement_max" class="form-control" id="font-size-plus"  placeholder="">
                                    <span class="input-group-text">+</span>
                                </div>
            
                                <p class="sub-text-valuestype">
                                  <span class="required-star">*</span>Enter the minimum (-) and maximum (+) values for each movement type. 
                                </p>
                            </div>
                            <div class="col-md-2">
                                <img src="{{asset('public/front/images/komp_axial_move 1.png')}}" alt="">
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-lg-5  mb-md-5 mb-5">
                                <div class="radio_wrapper">
                                    <label class="col-md-4">Lateral Movement<span class="required-star">*</span></label>
                                    <div class="input-wrapper col-md-8">
                                        <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" min="1" maxlength="6" name="lateral_movement" class="form-control mt-2" placeholder="Type here">
                                        <span class="unit-label">mm</span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div id="lateral_movement_error" class="error-message text-danger small mt-1" style="display:none;"></div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <span class="input-group-text">-</span>
                                    <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" min="1" maxlength="4" name="lateral_movement_min" class="form-control" id="font-size-minus" placeholder="">
                                    <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" min="1" maxlength="4" name="lateral_movement_max" class="form-control" id="font-size-plus"  placeholder="">
                                    <span class="input-group-text">+</span>
                                </div>
                                
                                <p class="sub-text-valuestype">
                                  <span class="required-star">*</span>Enter the minimum (-) and maximum (+) values for each movement type. 
                                </p>
                            </div>
                            <div class="col-md-2">
                                <img src="{{asset('public/front/images/komp_axial_move 1.png')}}" alt="">
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-lg-5  mb-md-5 mb-5">
                                <div class="radio_wrapper">
                                    <label class="col-md-4">Angular Movement <span class="required-star">*</span></label>
                                    <div class="input-wrapper col-md-8" >
                                        <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" min="1" maxlength="6" name="angular_movement" class="form-control mt-2" placeholder="Type here">
                                        <span class="unit-label">mm</span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div id="angular_movement_error" class="error-message text-danger small mt-1" style="display:none;"></div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <span class="input-group-text">-</span>
                                    <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="4" name="angular_movement_min" class="form-control" id="font-size-minus" placeholder="">
                                    <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="4" name="angular_movement_max" class="form-control" id="font-size-plus"  placeholder="">
                                    <span class="input-group-text">+</span>
                                </div>
                                
                                <p class="sub-text-valuestype">
                                  <span class="required-star">*</span>Enter the minimum (-) and maximum (+) values for each movement type. 
                                </p>
                            </div>
                            <div class="col-md-2">
                                <img src="{{asset('public/front/images/komp_axial_move 1.png')}}" alt="">
                            </div>
                         </div>
                        <div class="row mb-3">
                            <div class="col-md-5">
                                <div class="radio_wrapper">
                                    <label class="col-md-4">Cycle Life<span class="required-star">*</span></label>
                                    <div class="input-wrapper col-md-8">
                                        <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="6" name="cycle_life" class="form-control" placeholder="Type here">
                                        <small class="unit-label">times</small>
                                    </div>
                                    <!-- <small class="text-muted"><span class="required-star">*</span> If not specified it will be accepted 1000 cycles</small> -->
                                </div>
                                <div class="col-lg-12">
                                    <div id="cycle_life_error" class="error-message text-danger small mt-1" style="display:none;"></div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <small class="text-muted"><span class="required-star">*</span> If not specified it will be accepted 1000 cycles</small>
                            </div>
                            
                        </div>
                    </div>

                    <div class="form-section">
                        <h4 class="sub_title">QUALITY MEASUREMENTS</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <h6 class="red_head">NDT requests</h6>
                            </div>
                            <div class="col-lg-4  mb-md-5 mb-5">
                                <div class="radio_wrapper">
                                    <label>Liquid dye penetrant <span class="required-star">*</span>:</label>
                                    <div class="radio-group">
                                        <input type="radio" name="penetrant" value="yes" id="penetrantYes"> <label for="penetrantYes">Yes</label>
                                        <input type="radio" name="penetrant" value="no" id="penetrantNo"> <label for="penetrantNo">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4  mb-md-5 mb-5">
                                <div class="radio_wrapper">
                                    <label>X-ray<span class="required-star">*</span> :</label>
                                    <div class="radio-group">
                                        <input type="radio" name="x_ray" value="yes" id="xrayYes"> <label for="xrayYes">Yes</label>
                                        <input type="radio" name="x_ray" value="no" id="xrayNo"> <label for="xrayNo">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4  mb-md-5 mb-5">
                                <div class="radio_wrapper">
                                    <label>Air leakage test @ 0,5 bar<span class="required-star">*</span> :</label>
                                    <div class="radio-group">
                                        <input type="radio" name="air_leakage" value="yes" id="AirYes"> <label for="AirYes">Yes</label>
                                        <input type="radio" name="air_leakage" value="no" id="AirNo"> <label for="AirNo">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4  mb-md-5 mb-5">
                                <div class="radio_wrapper">
                                    <label>Helium leakage test @ 0,5 bar<span class="required-star">*</span> :</label>
                                    <div class="radio-group">
                                        <input type="radio" name="helium_leakage" value="yes" id="HeliumYes"> <label for="HeliumYes">Yes</label>
                                        <input type="radio" name="helium_leakage" value="no" id="HeliumNo"> <label for="HeliumNo">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-md-5 mb-5">
                                <div class="radio_wrapper">
                                    <label>Hydrostatic pressure test @ 1,5 x design pres. (10 min)<span class="required-star">*</span> :</label>
                                    <div class="radio-group">
                                        <input type="radio" name="hydrostatic_pressure" value="yes" id="HydrostaticYes"> <label for="HydrostaticYes">Yes</label>
                                        <input type="radio" name="hydrostatic_pressure" value="no" id="HydrostaticNo"> <label for="HydrostaticNo">No</label>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-lg-3  mb-md-5 mb-5">
                                <div class="radio_wrapper">
                                    <label>Other<span class="required-star">*</span> :</label>
                                    <div class="radio-group">
                                        <input type="radio" name="Otherndt" value="yes" id="OtherndtYes"> <label for="OtherndtYes">Yes</label>
                                        <input type="radio" name="Otherndt" value="no" id="OtherndtNo"> <label for="OtherndtNo">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5  mb-md-5 mb-5">
                                <div class="radio_wrapper radio_input">
                                    <label>Please specify<span class="required-star" id="ndt_report_specify_star">*</span>:</label>
                                    <input type="text" id="ndt_specify"  name="ndt_specify" maxlength="50" class="form-control mt-2" placeholder="Please specify" disabled>
                                    <span class="text-danger error-ndt_specify" style="display: none; margin-top: 49px;">This field is required.</span>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <div class="row">
                            <div class="col-lg-12">
                                <h6 class="red_head">DOCUMENTATION</h6>
                            </div>
                            <div class="col-md-5  mb-md-5 mb-5">
                                <div class="radio_wrapper ">
                                    <label>PPAP (Production Part Approval Process)<span class="required-star">*</span></label>
                                    <div class="radio-group">
                                        <input type="radio" name="ppap" value="yes" id="ppapYes"> <label for="ppapYes">Yes</label>
                                        <input type="radio" name="ppap" value="no" id="ppapNo"> <label for="ppapNo">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7  mb-md-5 mb-5">
                                <div class="radio_wrapper">
                                    <label>Dimension measurement report (2D)<span class="required-star">*</span></label>
                                    <div class="radio-group">
                                        <input type="radio" name="dimension_report" value="yes" id="dimensionReportYes"> <label
                                            for="dimensionReportYes">Yes</label>
                                        <input type="radio" name="dimension_report" value="no" id="dimensionReportNo"> <label
                                            for="dimensionReportNo">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5  mb-md-5 mb-5">
                                <div class="radio_wrapper">
                                    <label>Dimension measurement (3D)<span class="required-star">*</span></label>
                                    <div class="radio-group">
                                        <input type="radio" name="dimension3D" value="yes" id="dimension3DYes"> <label
                                            for="dimension3DYes">Yes</label>
                                        <input type="radio" name="dimension3D" value="no" id="dimension3DNo"> <label
                                            for="dimension3DNo">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7  mb-md-5 mb-5">
                                <div class="radio_wrapper">
                                    <label>NDT REPORT<span class="required-star">*</span></label>
                                    <div class="radio-group">
                                        <input type="radio" name="ndt_report" value="yes" id="ndtReportYes"> <label
                                            for="ndtReportYes">Yes</label>
                                        <input type="radio" name="ndt_report" value="no" id="ndtReportNo"> <label
                                            for="ndtReportNo">No</label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3  mb-md-5 mb-5">
                                <div class="radio_wrapper">
                                    <label>Other<span class="required-star">*</span>:</label>
                                    <div class="radio-group">
                                        <input type="radio" name="other_doc" value="yes" id="otherDocYes"> <label
                                            for="otherDocYes">Yes</label>
                                        <input type="radio" name="other_doc" value="no" id="otherDocNo"> <label
                                            for="otherDocNo">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 mb-lg-5  mb-md-5 mb-5">
                                <div class="radio_wrapper radio_input">
                                    <label for="">Please specify<span class="required-star" id="other_doc_specify_star">*</span>:</label>
                                    <input type="text" id="doc_specify" name="doc_specify" maxlength="50" class="form-control mt-2" placeholder="Please specify">
                                    <span class="text-danger error-doc_specify" style="display: none; margin-top: 49px;">This field is required.</span>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <h4 class="sub_title">SPECIAL REQUIREMENTS</h4>
                        <div class="row ">
                            <div class="col-md-12 mb-lg-5 mb-md-5 mb-5">
                                <input type="text" id="special_req" name="special_req" max="100" class="form-control" placeholder="Enter your message">
                                <small class="text-danger" id="special_req_error" style="display: none;">This field is required.</small>
                            </div>
                        </div>
                    </div>

                    <div class="nav-buttons col-12 text-center">
                        <a href="javascript:void(0)" class="back_btn" data-step="2" onclick="prevSteps(2)">
                            <span class="svg me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">
                                    <path d="M11.3809 13L1.38086 1M1.38086 1H11.3809M1.38086 1V11.9091" stroke="#C12729" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                            Back
                        </a>
                        <button class="prod_btn" type="submit">Submit
                            <span class="svg ms-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14"
                                    fill="none">
                                    <path d="M1.5 13L11.5 1M11.5 1H1.5M11.5 1V11.9091" stroke="white" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
                <!-- Step 3: Application Details & Quality Specs -->
            </form>
        </div>
    </div>
</section>
<script>
document.querySelectorAll('.value-control').forEach(function(button) {
    button.addEventListener('click', function() {
        const targetId = button.getAttribute('data-target');
        const action = button.getAttribute('data-action');
        const input = document.getElementById(targetId);
        
        let value = parseInt(input.value) || 0;
        alert("Current Value: " + value);
        if (action === 'minus') value--;
        if (action === 'plus') value++;

        input.value = value;
    });
});


$(document).ready(function () {
    const $jointSelect = $('#joint_type');
    const $productSelect = $('#product');

    // When Joint Type is selected
    $jointSelect.on('change', function () {
        const categoryId = $(this).val();
        const jointName = $(this).find('option:selected').text();
        $('#joint_name').val(jointName); // store joint name

        $productSelect.html('<option disabled selected>Loading...</option>');
        $('#product_name').val(''); // reset product name

        if (categoryId) {
            $.get("{{ url('/get-products-by-joint') }}/" + categoryId, function (data) {
                $productSelect.empty().append('<option disabled selected>Select one Product</option>');

                $.each(data, function (index, product) {
                    const formattedName = product.name
                        .toLowerCase()
                        .split(' ')
                        .map(word => word.charAt(0).toUpperCase() + word.slice(1))
                        .join(' ');
                    $productSelect.append(`<option value="${product.id}">${formattedName}</option>`);
                });
            });
        } else {
            $productSelect.html('<option disabled selected>Select one Product</option>');
        }
    });

    // When Product is selected
    $productSelect.on('change', function () {
        const productName = $(this).find('option:selected').text();
        console.log("Selected product:", productName); // for debug
        $('#product_name').val(productName); // store product name
    });
});

$(document).ready(function () {
    if (typeof $.fn.select2 === 'undefined') {
        console.error("❌ Select2 is not loaded.");
        return;
    }

    function toTitleCase(str) {
        return str
            ? str
                .toLowerCase()
                .split(' ')
                .map(word => word.charAt(0).toUpperCase() + word.slice(1))
                .join(' ')
            : '';
    }

    const $select = $('#country-select');

    // ✅ Initialize Select2
    $select.select2({
        theme: 'bootstrap-5',
        placeholder: 'Select Country',
        ajax: {
            url: '{{ route("get.countries") }}',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    term: params.term || ''
                };
            },
            processResults: function (data) {
                return {
                    results: data.results.map(item => ({
                        id: item.text,  // ✅ store country name instead of ID
                        text: toTitleCase(item.text)
                    }))
                };
            },
            cache: true
        }
    });

    // ✅ Auto-detect user's country
    $.get('https://ipapi.co/json/', function (location) {
        const detectedCountry = toTitleCase(location.country_name || '');
        if (!detectedCountry) return;

        $.ajax({
            url: '{{ route("get.countries") }}',
            data: { exact: detectedCountry },
            success: function (data) {
                if (data.results && data.results.length > 0) {
                    const country = data.results[0];
                    const newOption = new Option(
                        toTitleCase(country.text),
                        country.text, // ✅ use text (country name) as value
                        true,
                        true
                    );
                    $select.append(newOption).trigger('change');
                }
            }
        });
    });

    // ✅ Trigger empty search when dropdown opens
    $select.on('select2:open', function () {
        $('.select2-search__field').trigger('input');
    });
});

function prevSteps(stepNumber) {
    console.log("Going to step", stepNumber);
    document.querySelectorAll('.step-content').forEach(sc => sc.classList.add('display-none'));
    const stepContent = document.querySelector(`#step-${stepNumber}`);
    const oldstepTitle = document.querySelector(`.step_title-${stepNumber + 1}`);
    oldstepTitle?.classList.remove('active');
    const stepTitle = document.querySelector(`.step_title-${stepNumber}`);
    stepTitle?.classList.add('active');
    if (stepContent) stepContent.classList.remove('display-none');
}
</script>
<script>
$(document).ready(function () {
    $('#error-nominal-select').hide();
    $('#error-joint-type').hide();
    $('#error-aisi-select').hide();

});

let isValid = true; // global

function validateSelect2(selectOption , errorFiled){
    if(selectOption === null || selectOption === ''){
        errorFiled.show();
        isValid = false;
        return false;
    } else {
        errorFiled.hide();
        isValid = true;
        return true;
    }
}



$(document).ready(function () {
    // ===========================
    // CONFIGURATION
    // ===========================
    const CONFIG = {
        disposableDomains: [
            'mailinator.com','10minutemail.com','guerrillamail.com','tempmail.com',
            'temp-mail.org','throwawaymail.com','maildrop.cc','dispostable.com',
            'getairmail.com','moakt.com','spamgourmet.com','yopmail.com',
            'sharklasers.com','mailnesia.com','fakemail.net','emailondeck.com',
            'trashmail.com','mintemail.com','mytemp.email'
        ],
        validationRules: {
            step1: {
                required: [
                    'fullname', 'company_name', 'email', 'contact',
                    'joint_type', 'length', 'quantity'
                ]
                
            },
            step2: {
                radioGroups: [
                    'inner_sleeve', 'cover', 'marking', 'pickling',
                    'materialcertbellow', 'design_params',
                    'material_cert_request'
                ],
                textFields: ['marking_specify'], // conditional
                // selects: ['aisi']                 // conditional
            },
            step3: {
                radioGroups: ['other_doc' ,'Otherndt'],
                numericFields: [
                    'axial_movement',
                    'lateral_movement',
                    'angular_movement',
                    'cycle_life',
                    'working_pressure_min','working_pressure_max','axial_movement_min','axial_movement_max',
                    'design_pressure_min','design_pressure_max' , 'lateral_movement_min','lateral_movement_max',
                    'working_temp_min','working_temp_max', 'angular_movement_min','angular_movement_max',
                    'design_temp_min','design_temp_max'
                ],
                required: ['application_medium'],
                textFields: ['ndt_specify', 'doc_specify' ], // conditional
                conditionalRadioGroups: [
                    'penetrant','x_ray','air_leakage','helium_leakage',
                    'hydrostatic_pressure','Otherndt','ppap',
                    'dimension_report','dimension3D','ndt_report'
                ]
            }
        }
    };

    // ===========================
    // UTILITIES
    // ===========================
    const Utils = {
        showError(fieldName, message) {
            const field = document.querySelector(`[name="${fieldName}"]`);
            // console.log("Sub-text element:", field);
            if (field) field.classList.add('is-invalid');
            this.clearError(fieldName);

            // 🔹 Special case: movement min/max → highlight sub-text
            const movementFields = [
                'axial_movement_min','axial_movement_max',
                'lateral_movement_min','lateral_movement_max',
                'angular_movement_min','angular_movement_max'
            ];
            if (movementFields.includes(fieldName)) {
                const subText = field.closest('.row')?.querySelector('.sub-text-valuestype');
                
                if (subText) subText.classList.add('text-error');
                return; // stop here, no inline error created
            }

            // 🔹 Use header error if available
            const headerError = document.getElementById(`${fieldName}_error`);
            if (headerError) {
                headerError.style.display = 'block';
                headerError.textContent = message;
                return;
            }

            // fallback → inline error
            if (field) {
                const errorDiv = document.createElement('div');
                errorDiv.className = 'error-message text-danger small mt-1';
                errorDiv.textContent = message;

                const wrapper = field.closest('.input-wrapper');
                if (wrapper) {
                    wrapper.insertAdjacentElement('afterend', errorDiv);
                } else {
                    field.insertAdjacentElement('afterend', errorDiv);
                }
            }
        },
        clearError(fieldName) {
            const field = document.querySelector(`[name="${fieldName}"]`);
            if (field) field.classList.remove('is-invalid');

            // 🔹 Special case: movement min/max → remove red highlight
            const movementFields = [
                'axial_movement_min','axial_movement_max',
                'lateral_movement_min','lateral_movement_max',
                'angular_movement_min','angular_movement_max'
            ];
            if (movementFields.includes(fieldName)) {
                const subText = field.closest('.row')?.querySelector('.sub-text-valuestype');
                if (subText) subText.classList.remove('text-error');
                return;
            }

            // 🔹 Clear header error if exists
            const headerError = document.getElementById(`${fieldName}_error`);
            if (headerError) {
                headerError.style.display = 'none';
                headerError.textContent = '';
            }

            if (field) {
                const wrapper = field.closest('.input-wrapper');
                let next = wrapper ? wrapper.nextElementSibling : field.nextElementSibling;
                if (next && next.classList.contains('error-message')) {
                    next.remove();
                }
            }
        },
        showErrorRadio(fieldName, message = 'This field is required') {
            const fields = document.getElementsByName(fieldName);
            if (fields.length === 0) return;
            fields.forEach(f => f.classList.add('is-invalid'));
            let parentContainer = fields[0].closest('.radio_wrapper') || fields[0].parentElement;
            if (!parentContainer) return;

            // 🔹 Use header error if available
            const headerError = document.getElementById(`${fieldName}_error`);
            if (headerError) {
                headerError.style.display = 'block';
                headerError.textContent = message;
                return;
            }

            let errorContainer = parentContainer.nextElementSibling;
            if (errorContainer && errorContainer.classList.contains('radio-error-container')) return;
            const errorDiv = document.createElement('div');
            errorDiv.className = 'radio-error-container error-message text-danger small mt-1';
            errorDiv.textContent = message;
            parentContainer.parentNode.insertBefore(errorDiv, parentContainer.nextSibling);
        },
        clearErrorRadio(fieldName) {
            const fields = document.getElementsByName(fieldName);
            if (fields.length === 0) return;
            fields.forEach(f => f.classList.remove('is-invalid'));

            // 🔹 Clear header error if exists
            const headerError = document.getElementById(`${fieldName}_error`);
            if (headerError) {
                headerError.style.display = 'none';
                headerError.textContent = '';
                return;
            }

            let parentContainer = fields[0].closest('.radio_wrapper') || fields[0].parentElement;
            if (!parentContainer) return;
            let errorContainer = parentContainer.nextElementSibling;
            if (errorContainer && errorContainer.classList.contains('radio-error-container')) {
                errorContainer.remove();
            }
        },
        scrollToFirstError() {
            const firstError = document.querySelector('.is-invalid');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        },
        validateEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                return { valid: false, message: 'Please enter a valid email address' };
            }
            const domain = email.split('@')[1].toLowerCase();
            if (CONFIG.disposableDomains.includes(domain)) {
                return { valid: false, message: 'Disposable email addresses are not allowed' };
            }
            return { valid: true };
        },
        validateContact(contact) {
            const digitsOnly = contact.replace(/\D/g, '');
            if (!digitsOnly) {
                return { valid: false, message: 'This field is required' };
            }
            if (digitsOnly.length < 10 || digitsOnly.length > 15) {
                return { valid: false, message: 'Contact number must be 10 to 15 digits' };
            }
            return { valid: true };
        }
    };

    // ===========================
    // VALIDATORS
    // ===========================
    const Validator = {
        validateField(fieldName, value, field) {
            if (field.tagName.toLowerCase() === 'select') {
                if (!value || field.selectedIndex === 0) {
                    return { valid: false, message: 'This field is required' };
                }
            } else {
                if (!value) {
                    return { valid: false, message: 'This field is required' };
                }
            }
            switch (fieldName) {
                case 'email': return Utils.validateEmail(value);
                case 'contact': return Utils.validateContact(value);
            }
            return { valid: true };
        },
        validateNumericField(value) {
            if (value !== '') {
                const numericValue = parseFloat(value);
                if (isNaN(numericValue)) {
                    return { valid: false, message: 'Please enter a valid number' };
                }
            }
            return { valid: true };
        }
    };

    // ===========================
    // STEP VALIDATORS
    // ===========================
    const StepValidator = {
        validateStep1() {
          
            let isValid = true;
            CONFIG.validationRules.step1.required.forEach(f => Utils.clearError(f));
            CONFIG.validationRules.step1.required.forEach(f => {
                const field = document.querySelector(`[name="${f}"]`);
                if (!field) return;
                const validation = Validator.validateField(f, field.value.trim(), field);
                if (!validation.valid) {
                    Utils.showError(f, validation.message);
                    isValid = false;
                }
            });
            
            // this is for select 2 validation
            validateSelect2($('#nominal_diameter').val() , $('#error-nominal-select'));
            validateSelect2($('#joint_type').val() , $('#error-joint-type'));
            if (isValid) nextStep(2); else Utils.scrollToFirstError();
            return isValid;
        },
        validateStep2() {
            let isValid = true;
            const rules = CONFIG.validationRules.step2;

            // Radios
            rules.radioGroups.forEach(name => {
                Utils.clearErrorRadio(name);
                if (!document.querySelector(`input[name="${name}"]:checked`)) {
                    Utils.showErrorRadio(name);
                    isValid = false;
                }
            });

            // Conditional marking_specify
            Utils.clearError('marking_specify');
            const markingYes = document.querySelector('input[name="marking"]:checked')?.value;
            const markingSpecify = $('#marking_specify').val();
            console.log("Marking specify field:", markingSpecify); // for debug
            console.log("Marking specify :", markingYes); // for debug
            if (markingYes == 'yes'  && markingSpecify == '') {
                $('.error-marking_specify').show();
                isValid = false;
            }

            // Conditional AISI select
            validateSelect2($('#aisi').val() , $('#error-aisi-select'));

            // ✅ AISI always required
            // Utils.clearError('aisi');
            // const aisiField = document.querySelector('[name="aisi"]');
            // if (aisiField && (!aisiField.value || aisiField.selectedIndex === 0)) {
            //     Utils.showError('aisi', 'Please select an option');
            //     isValid = false;
            // }


            if (isValid) nextStep(3); else Utils.scrollToFirstError();
            return isValid;
        },
        validateStep3() {
            let isValid = true;
            const rules = CONFIG.validationRules.step3;

            [...rules.radioGroups, ...rules.conditionalRadioGroups].forEach(name => {
                Utils.clearErrorRadio(name);
                if (!document.querySelector(`input[name="${name}"]:checked`)) {
                    Utils.showErrorRadio(name);
                    isValid = false;
                }
            });

            rules.required.forEach(name => {
                Utils.clearError(name);
                const field = document.querySelector(`[name="${name}"]`);
                if (field && field.value.trim() === '') {
                    Utils.showError(name, 'This field is required');
                    isValid = false;
                }
            }); 

            // 🔹 Now numeric fields are required
            rules.numericFields.forEach(name => {
                Utils.clearError(name);
                const field = document.querySelector(`[name="${name}"]`);
                if (field) {
                    const value = field.value.trim();
                    if (value === '') {
                        Utils.showError(name, 'This field is required');
                        isValid = false;
                    } else {
                        const validation = Validator.validateNumericField(value);
                        if (!validation.valid) {
                            Utils.showError(name, validation.message);
                            isValid = false;
                        }
                    }
                }
            });

            // Conditional ndt_specify
            Utils.clearError('ndt_specify');
            const ndtSpecifyYes = document.querySelector('input[name="Otherndt"]:checked')?.value;
            const ndtSpecify = $('#ndt_specify').val();
            console.log("Marking specify field:", ndtSpecify); // for debug
            console.log("Marking specify :", ndtSpecifyYes); // for debug
            if (ndtSpecifyYes == 'yes'  && ndtSpecify == '') {
                $('.error-ndt_specify').show();
                isValid = false;
            }

            // Conditional other_doc
            Utils.clearError('other_doc');
            const otherDocYes = document.querySelector('input[name="other_doc"]:checked')?.value;
            const otherDocSpecify = $('#doc_specify').val();
            console.log("Marking specify field:", otherDocSpecify); // for debug
            console.log("Marking specify :", otherDocYes); // for debug
            if (otherDocYes == 'yes'  && otherDocSpecify == '') {
                $('.error-doc_specify').show();
                isValid = false;
            }

            if (!isValid) Utils.scrollToFirstError();
            return isValid;
        }
    };

    // ===========================
    // STEPPER NAVIGATION
    // ===========================
    function nextStep(stepNumber) {
        document.querySelectorAll('.step-content').forEach(sc => sc.classList.add('display-none'));
        const stepContent = document.querySelector(`#step-${stepNumber}`);
        const oldstepTitle = document.querySelector(`.step_title-${stepNumber - 1}`);
        oldstepTitle?.classList.remove('active');
        const stepTitle = document.querySelector(`.step_title-${stepNumber}`);
        stepTitle?.classList.add('active');
        if (stepContent) stepContent.classList.remove('display-none');
    }

    

    // ===========================
    // EVENTS
    // ===========================
    function bindEvents() {
        const step1NextBtn = document.querySelector('[data-step="1"]');
        if (step1NextBtn) step1NextBtn.onclick = e => { e.preventDefault(); StepValidator.validateStep1(); };

        const step2NextBtn = document.querySelector('[data-step="2"]');
        if (step2NextBtn) step2NextBtn.onclick = e => { e.preventDefault(); StepValidator.validateStep2(); };

        const submitBtn = document.querySelector('button[type="submit"]');
        if (submitBtn) {
            submitBtn.addEventListener('click', function (e) {
                e.preventDefault();
                if (StepValidator.validateStep3()) {
                    if (submitBtn.form) submitBtn.form.submit();
                }
            });
        }
    }

    // ===========================
    // INIT
    // ===========================
    bindEvents();
});


document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');

    // ====== WEB ADDRESS VALIDATION ======
    const webInput = document.getElementById('web_address');
    const webError = document.getElementById('web_error');

    function validateWebAddress() {
        if (!webInput) return true;

        const value = webInput.value.trim();
        const pattern = /^https?:\/\/[^\s]+\.(com|net|org|in|co|edu|ae|tech)(\/[^\s]*)?$/i;

        if (!pattern.test(value)) {
            webError.style.display = 'block';
            webInput.classList.add('is-invalid');
            return false;
        } else {
            webError.style.display = 'none';
            webInput.classList.remove('is-invalid');
            return true;
        }
    }

    if (webInput) {
        webInput.addEventListener('blur', validateWebAddress);
        webInput.addEventListener('input', () => {
            webError.style.display = 'none';
            webInput.classList.remove('is-invalid');
        });
    }

    // ====== CONDITIONAL FIELDS VALIDATION ======
    function bindConditionalField(radioName, inputId, errorClass , errorStarId) {
        const input = document.getElementById(inputId);
        const errorMsg = document.querySelector(`.${errorClass}`);
        const errorStar = document.getElementById(errorStarId);
        if (errorStar) errorStar.style.display = 'none';
        if (!input) return () => true; // skip if input not found

        // Disable initially
        input.disabled = true;
        input.removeAttribute('required');
        if (errorMsg) errorMsg.style.display = 'none';

        // On radio change
        document.querySelectorAll(`input[name="${radioName}"]`).forEach(radio => {
            radio.addEventListener('change', function () {
                if (this.value.toLowerCase() === 'yes') {
                    input.disabled = false;
                    input.setAttribute('required', 'required');
                    if (errorStar) errorStar.style.display = 'inline';
                } else {
                    input.value = '';
                    input.disabled = true;
                    input.removeAttribute('required');
                    if (errorStar) errorStar.style.display = 'none';
                    if (errorMsg) errorMsg.style.display = 'none';
                }
            });
        });

        // Auto-hide error on typing
        input.addEventListener('input', () => {
            if (errorMsg) errorMsg.style.display = 'none';
            input.classList.remove('is-invalid');
        });

        // Return validator for this field
        return function () {
            if (document.querySelector(`input[name="${radioName}"]:checked`)?.value.toLowerCase() === 'yes') {
                if (input.value.trim() === '') {
                    if (errorMsg) errorMsg.style.display = 'block';
                    input.classList.add('is-invalid');
                    input.focus();
                    return false;
                }
            }
            return true;
        };
    }

    // Bind all 3 conditional fields
    const validateMarking = bindConditionalField('marking', 'marking_specify', 'error-marking_specify' , 'marking_specify_star');
    const validateDoc     = bindConditionalField('other_doc', 'doc_specify', 'error-doc_specify' , 'other_doc_specify_star');
    const validateNdt     = bindConditionalField('Otherndt', 'ndt_specify', 'error-ndt_specify' , 'ndt_report_specify_star');

    // ====== MASTER VALIDATION ======
    function validateAll() {
        let ok = true; 

        if (webInput && !validateWebAddress()) ok = false;
        if (!validateMarking()) ok = false; 
        if (!validateDoc()) ok = false;
        if (!validateNdt()) ok = false;

        return ok;
    }

    // Hook into final form submit
    form.addEventListener('submit', function (e) {
        if (!validateAll()) {
            e.preventDefault();
        }
    });

    // Hook into "Next" buttons for multi-step
    document.querySelectorAll('.btn-next').forEach(btn => {
        btn.addEventListener('click', function (e) {
            if (!validateAll()) {
                e.preventDefault(); // stop going to next step
            }
        });
    });
});

</script>

@include('layouts.footer')

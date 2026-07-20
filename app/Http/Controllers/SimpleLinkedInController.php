<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimpleLinkedInController extends Controller
{
    /**
     * Display LinkedIn posts using direct embed
     */
    public function index()
    {
        // Get LinkedIn company ID from environment variable or use default
        $companyId = env('LINKEDIN_ORGANIZATION_ID', '5070168');
        
        // Build company URL
        $companyUrl = "https://www.linkedin.com/company/{$companyId}/";
        
        // Return view with company URL
        return view('front.linkedin.simple', ['companyUrl' => $companyUrl, 'companyId' => $companyId]);
    }
}
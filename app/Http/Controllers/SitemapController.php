<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Blog;
use App\Models\CaseStudy;
use Illuminate\Support\Carbon;

class SitemapController extends Controller
{
    public function index()
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";

        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        // 1. HOMEPAGE

        $xml .= "<url>\n";

        $xml .= "<loc>"
            . htmlspecialchars(
                route('dashboard'),
                ENT_XML1,
                'UTF-8'
            )
            . "</loc>\n";

        $xml .= "<lastmod>"
            . Carbon::now()->toAtomString()
            . "</lastmod>\n";

        $xml .= "<priority>1.00</priority>\n";

        $xml .= "</url>\n";


        // 2. PRODUCT CATEGORIES

        $categories = ProductCategory::whereNull('deleted_at')
            ->whereNotNull('url')
            ->where('url', '!=', '')
            ->get();

        foreach ($categories as $category)
        {
            $loc = route('products.by.category', [
                'category' => $category->url,
            ]);

            $lastmod = $category->updated_at
                ? Carbon::parse($category->updated_at)->toAtomString()
                : null;

            $xml .= "<url>\n";

            $xml .= "<loc>"
                . htmlspecialchars(
                    $loc,
                    ENT_XML1,
                    'UTF-8'
                )
                . "</loc>\n";

            if ($lastmod)
            {
                $xml .= "<lastmod>"
                    . htmlspecialchars(
                        $lastmod,
                        ENT_XML1,
                        'UTF-8'
                    )
                    . "</lastmod>\n";
            }

            $xml .= "<priority>0.80</priority>\n";

            $xml .= "</url>\n";
        }

        // 3. PRODUCTS

        $products = Product::whereNull('deleted_at')
            ->whereNotNull('url')
            ->where('url', '!=', '')
            ->get();

        foreach ($products as $product)
        {
            $loc = route('product-detail', [
                'url' => $product->url,
            ]);

            $lastmod = $product->updated_at
                ? Carbon::parse($product->updated_at)->toAtomString()
                : null;

            $xml .= "<url>\n";

            $xml .= "<loc>"
                . htmlspecialchars(
                    $loc,
                    ENT_XML1,
                    'UTF-8'
                )
                . "</loc>\n";

            if ($lastmod)
            {
                $xml .= "<lastmod>"
                    . htmlspecialchars(
                        $lastmod,
                        ENT_XML1,
                        'UTF-8'
                    )
                    . "</lastmod>\n";
            }

            $xml .= "<priority>0.80</priority>\n";

            $xml .= "</url>\n";
        }
        
        // 4. STATIC FRONTEND PAGES

        $staticRoutes = [
            'about',
            'certificate',
            'industries',
            'contact-us',
            'design-calculation',
            'premium-service',
            'Inspection-services',
            'emergency-services',
            'logistics',
            'faq',
            'case-studies',
            'enquiry-form',
            'current.vacancies',
            'blog'
        ];

        $highPriorityRoutes = [
            'design-calculation',
            'premium-service',
            'Inspection-services',
            'emergency-services',
            'logistics',
        ];

        foreach ($staticRoutes as $routeName)
        {
            try
            {
                $loc = route($routeName);
            }
            catch (\Throwable $e)
            {
                continue;
            }

            $priority = in_array($routeName, $highPriorityRoutes)
                ? '0.80'
                : '0.60';

            $xml .= "<url>\n";

            $xml .= "<loc>"
                . htmlspecialchars(
                    $loc,
                    ENT_XML1,
                    'UTF-8'
                )
                . "</loc>\n";

            $xml .= "<lastmod>"
                . Carbon::now()->toAtomString()
                . "</lastmod>\n";

            $xml .= "<priority>{$priority}</priority>\n";

            $xml .= "</url>\n";
        }

        // 5. CASE STUDY DETAIL PAGES

        $caseStudies = CaseStudy::whereNull('deleted_at')
            ->whereNotNull('casestudy_url')
            ->where('casestudy_url', '!=', '')
            ->get();

        foreach ($caseStudies as $caseStudy)
        {
            $loc = route('case-studies-detail', [
                'url' => $caseStudy->casestudy_url,
            ]);

            $lastmod = $caseStudy->updated_at
                ? Carbon::parse($caseStudy->updated_at)->toAtomString()
                : null;

            $xml .= "<url>\n";

            $xml .= "<loc>"
                . htmlspecialchars(
                    $loc,
                    ENT_XML1,
                    'UTF-8'
                )
                . "</loc>\n";

            if ($lastmod)
            {
                $xml .= "<lastmod>"
                    . htmlspecialchars(
                        $lastmod,
                        ENT_XML1,
                        'UTF-8'
                    )
                    . "</lastmod>\n";
            }

            $xml .= "<priority>0.60</priority>\n";

            $xml .= "</url>\n";
        }

        // 6. BLOG DETAIL PAGES

        $blogs = Blog::whereNull('deleted_at')
            ->where('status', 'Active')
            ->whereNotNull('url')
            ->where('url', '!=', '')
            ->get();

        foreach ($blogs as $blog)
        {
            $loc = route('blog-detail', [
                'url' => $blog->url,
            ]);

            $lastmod = $blog->updated_at
                ? Carbon::parse($blog->updated_at)->toAtomString()
                : null;

            $xml .= "<url>\n";

            $xml .= "<loc>"
                . htmlspecialchars(
                    $loc,
                    ENT_XML1,
                    'UTF-8'
                )
                . "</loc>\n";

            if ($lastmod)
            {
                $xml .= "<lastmod>"
                    . htmlspecialchars(
                        $lastmod,
                        ENT_XML1,
                        'UTF-8'
                    )
                    . "</lastmod>\n";
            }

            $xml .= "<priority>0.60</priority>\n";

            $xml .= "</url>\n";
        }

        // END SITEMAP

        $xml .= '</urlset>';

        return response($xml, 200, [
            'Content-Type' => 'application/xml; charset=UTF-8',
        ]);
    }
}
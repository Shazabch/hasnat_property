<?php

namespace App\Http\Controllers;

use App\Models\Expertise;
use App\Models\Properties;
use App\Models\Publication;
use \App\Models\Project;
use \App\Models\Rate;
use App\Models\WebPage;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $pageData = WebPage::getPageData('home');
        // $testimonials = \App\Models\Testimonial::published()->ordered()->get();
        $testimonials = \App\Models\Testimonial::published()->inRandomOrder()->take(6)->get();
        $publications = \App\Models\Publication::with(['type'])->published()->latest()->take(3)->get();
        $properties = Properties::where('status',1)->get();
        return view('website.home', compact('testimonials', 'publications', 'pageData' , 'properties'));
    }
    public function conditionsListing()
    {
        $pageData = WebPage::getPageData('conditions');
        $conditions = \App\Models\Condition::published()->ordered()->with(['contentTabs', 'contentSections'])->get();
        return view('website.conditions.listing', compact('conditions', 'pageData'));
    }
    public function conditionsDetail($slug)
    {
        $condition = \App\Models\Condition::where('slug', $slug)->published()->with(['contentTabs', 'contentSections', 'schema'])->firstOrFail();
        $related_expertises = Expertise::published()->inRandomOrder()->take(3)->get();
        return view('website.conditions.detail', compact('condition', 'related_expertises'));
    }
    public function expertiseListing()
    {
        $pageData = WebPage::getPageData('expertise');
        $expertises = \App\Models\Expertise::published()->ordered()->get();
        return view('website.expertise.listing', compact('expertises', 'pageData'));
    }
    public function expertiseDetail($slug)
    {
        $expertise = \App\Models\Expertise::where('slug', $slug)->published()->with(['contentTabs', 'contentSections', 'quickFacts', 'schema'])->firstOrFail();
        return view('website.expertise.detail', compact('expertise'));
    }
    public function publicationsListing()
    {
        $pageData = WebPage::getPageData('publications');
        return view('website.publications.listing', compact('pageData'));
    }
    public function publicationsDetail($slug)
    {
        $publication = \App\Models\Publication::where('slug', $slug)->published()->with(['contentTabs', 'contentSections', 'topics', 'type', 'schema'])->firstOrFail();
        $related_publications = Publication::where('id', '!=', $publication->id)->published()->latest()->take(3)->get();
        return view('website.publications.detail', compact('publication', 'related_publications'));
    }
    public function termsAndConditions()
    {
        $pageData = WebPage::getPageData('terms-and-conditions');
        return view('website.terms-and-conditions', compact('pageData'));
    }
    public function privacyPolicy()
    {
        $pageData = WebPage::getPageData('privacy-policy');
        return view('website.privacy-policy', compact('pageData'));
    }
    public function aboutUs()
    {
        $pageData = WebPage::getPageData('about-us');
        return view('website.about-us', compact('pageData'));
    }
    public function contactUs()
    {
        $pageData = WebPage::getPageData('contact-us');
        // dd($pageData);
        return view('website.contact-us', compact('pageData'));
    }
    public function reviews()
    {
        $pageData = WebPage::getPageData('reviews');
        $testimonials = \App\Models\Testimonial::published()->ordered()->get();
        $count = $testimonials->count();
        $each_part = floor($count / 3);
        if($each_part < 1){
            $each_part = 1;
        }
        // distribute testimonials into 3 parts
        $testimonials_part_1 = $testimonials->slice(0, $each_part);
        $testimonials_part_2 = $testimonials->slice($each_part, $each_part);
        $testimonials_part_3 = $testimonials->slice($each_part * 2, $each_part);
        // now check the remaining and append them to each one of them until the remaining is 0
        $remaining = $count - ($each_part * 3);
        if($remaining > 0){
            $testimonials_part_1 = $testimonials_part_1->concat($testimonials->slice($each_part * 3, $remaining));
            $remaining = $remaining - 1;
            if($remaining > 0){
                $testimonials_part_2->concat($testimonials->slice($each_part * 3 + $remaining, $remaining));
                $remaining = $remaining - 1;
            }
            if($remaining > 0){
                $testimonials_part_3->concat($testimonials->slice($each_part * 3 + $remaining, $remaining));
            }
        }

        // dd($count, $each_part, $testimonials_part_1, $testimonials_part_2, $testimonials_part_3);
        return view('website.reviews', compact('pageData', 'testimonials_part_1', 'testimonials_part_2', 'testimonials_part_3'));
    }
    public function properties()
    {
        return view('website.properties.index');
    }
    public function projects($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('website.projects.index', compact('project'));
    }
    public function rates($slug)
    {
        $rate = Rate::where('slug', $slug)->firstOrFail();
        return view('website.rates.index', compact('rate'));
    }
    public function propertiesDetail()
    {
        return view('website.properties.detail');
    }
}

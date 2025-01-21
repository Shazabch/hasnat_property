<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Condition;
use App\Models\Expertise;
use App\Models\Properties;
use App\Models\Publication;
use App\Models\PublicationTopic;
use App\Models\Testimonial;
use App\Models\WebPage;

class AdminPagesController extends Controller
{
    public function conditions()
    {
        return view('admin.conditions.index');
    }

    public function createCondition()
    {
        return view('admin.conditions.create');
    }

    public function editCondition($id)
    {
        $condition = Condition::findOrFail($id);
        return view('admin.conditions.edit', compact('condition'));
    }

    public function previewCondition($id)
    {
        $condition = Condition::with(['contentTabs', 'contentSections'])->findOrFail($id);
        $related_expertises = collect([]);
        return view('website.conditions.detail', compact('condition', 'related_expertises'));
    }

    public function expertises()
    {
        return view('admin.expertise.index');
    }

    public function createExpertise()
    {
        return view('admin.expertise.create');
    }

    public function editExpertise($id)
    {
        $expertise = Expertise::findOrFail($id);
        return view('admin.expertise.edit', compact('expertise'));
    }

    public function previewExpertise($id)
    {
        $expertise = Expertise::with(['contentTabs', 'contentSections', 'quickFacts'])->findOrFail($id);
        $related_expertises = collect([]);
        return view('website.expertise.detail', compact('expertise', 'related_expertises'));
    }

    public function testimonials()
    {
        return view('admin.testimonials.index');
    }

    public function createTestimonial()
    {
        return view('admin.testimonials.create');
    }

    public function editTestimonial($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function publications()
    {
        return view('admin.publications.index');
    }

    public function createPublication()
    {
        return view('admin.publications.create');
    }

    public function editPublication($id)
    {
        $publication = Publication::findOrFail($id);
        return view('admin.publications.edit', compact('publication'));
    }

    public function previewPublication($id)
    {
        $publication = Publication::with(['contentTabs', 'contentSections', 'topics', 'type'])->findOrFail($id);
        $related_publications = collect([]);
        return view('website.publications.detail', compact('publication', 'related_publications'));
    }

    // Route::get('/', [AdminPagesController::class, 'webPages'])->name('index');
    // Route::get('/create', [AdminPagesController::class, 'createWebPage'])->name('create');
    // Route::get('/edit/{id}', [AdminPagesController::class, 'editWebPage'])->name('edit');

    public function webPages()
    {
        return view('admin.web-pages.index');
    }

    public function createWebPage()
    {
        return view('admin.web-pages.create');
    }

    public function editWebPage($id)
    {
        $webPage = WebPage::findOrFail($id);
        return view('admin.web-pages.edit', compact('webPage'));
    }
                public function properties()
            {
                return view('admin.properties.index');
            }

            public function createProperty()
            {
                return view('admin.properties.create');
            }

            public function editProperty($id)
            {
                $property = Properties::findOrFail($id);
                return view('admin.properties.edit', compact('property'));
            }

    public function getFilterResults(Request $request)
    {
        $type=$request->type;
        $search=$request->search;
        if($type == 'topics'){
            $data = PublicationTopic::where('name', 'like', '%'.$search.'%')->take(10)->get()->map(function($result){
                return [
                    'id'=>'id_'.$result->id,
                    'text'=>$result->name,
                ];
            });

        }else{
            $data=[];
        }

        return response()->json(['data' => $data]);
    }
}

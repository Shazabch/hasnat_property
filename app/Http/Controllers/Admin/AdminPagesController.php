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
use App\Models\Project;
use App\Models\Rate;
use App\Models\WebPage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
    public function specifications()
    {
        return view('admin.specifications.index');
    }
    public function amenetise()
    {
        return view('admin.amenetise.index');
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
    public function projects()
    {
        return view('admin.projects.index');
    }
    public function createProject()
    {
        return view('admin.projects.create');
    }
    public function editProject($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    ///////////////  Rates
    public function rates()
    {
        return view('admin.rates.index');
    }
    public function createRate()
    {
        return view('admin.rates.create');
    }
    public function editRate($id)
    {
        $rate = Rate::findOrFail($id);
        return view('admin.rates.edit', compact('rate'));
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
    public function upload(Request $request)
    {

        // Log the request to check if it's coming through
        Log::info($request->all());

        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('upload')) {
            $imagePath = $request->file('upload')->store('images', 'public');
            Log::info('Image uploaded to: ' . $imagePath);
        } else {
            Log::error('No file uploaded.');
        }

        return response()->json([
            'url' => asset('storage/' . $imagePath)
        ]);
    }


    public function editProperty($id)
    {
        $property = Properties::findOrFail($id);
        return view('admin.properties.edit', compact('property'));
    }
    public function homePages()
    {
        return view('admin.home-pages.index');
    }
    public function getFilterResults(Request $request)
    {
        $type = $request->type;
        $search = $request->search;
        if ($type == 'topics') {
            $data = PublicationTopic::where('name', 'like', '%' . $search . '%')->take(10)->get()->map(function ($result) {
                return [
                    'id' => 'id_' . $result->id,
                    'text' => $result->name,
                ];
            });
        } else {
            $data = [];
        }

        return response()->json(['data' => $data]);
    }
}

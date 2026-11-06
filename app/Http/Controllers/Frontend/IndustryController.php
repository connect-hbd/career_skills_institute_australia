<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class IndustryController extends Controller
{
    public function index()
    {
        $industry = json_decode(
            File::get(resource_path('data/industries.json')),
            true
        );

        $courses = json_decode(
            File::get(resource_path('data/courses.json')),
            true
        );

        return view('frontend.pages.industry.qualifications', [
            'category' => null,
            'industry' => $industry,
            'courses' => $courses,
        ]);
    }

  public function industryQualification(string $slug)
{
    // Load industries
    $industries = json_decode(
        File::get(resource_path('data/industries.json')),
        true
    );

    // Load qualifications
    $allQualifications = json_decode(
        File::get(resource_path('data/qualifications.json')),
        true
    );

    // Find selected industry by slug
    $industry = collect($industries)->firstWhere('slug', $slug);

    abort_if(!$industry, 404);

    // Get qualifications belonging to this industry
    $qualifications = collect($allQualifications)
        ->where('industry_slug', $slug)
        ->values();

    // Get available qualifications levels
    $courseLevels = $qualifications
        ->pluck('level')
        ->filter()
        ->unique()
        ->values()
        ->prepend('All');
// return $industry;
   return view('frontend.pages.industry.index', [
        'industry' => $industry,
        'courses' => $qualifications->all(),
        'courseLevels' => $courseLevels,
    ]);
}

public function show(string $qualificationslug)
{
   
    $qualifications = json_decode(
        File::get(resource_path('data/qualifications.json')),
        true
    );

    $qualification = collect($qualifications)->firstWhere('slug', $qualificationslug);

    abort_if(!$qualification, 404);
        // return $qualification;

    return view('frontend.pages.industry.show', compact('qualification'));
}

    public function industryEnrollment()
    {
        return view('frontend.pages.industry.enrollment');
    }

    public function courseEnrollment()
    {
        return view('frontend.pages.industry.enrollment');
    }
}

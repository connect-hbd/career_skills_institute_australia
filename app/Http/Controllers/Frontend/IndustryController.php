<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class IndustryController extends Controller
{
    public function index()
    {
        $categories = json_decode(
            File::get(resource_path('data/categories.json')),
            true
        );

        $courses = json_decode(
            File::get(resource_path('data/courses.json')),
            true
        );

        return view('frontend.pages.industry.index', [
            'category' => null,
            'categories' => $categories,
            'courses' => $courses,
        ]);
    }

  public function categoryCourses(string $slug)
{
    // Load categories
    $categories = json_decode(
        File::get(resource_path('data/categories.json')),
        true
    );

    // Load courses
    $allCourses = json_decode(
        File::get(resource_path('data/courses.json')),
        true
    );

    // Find selected industry by slug
    $industry = collect($categories)->firstWhere('slug', $slug);

    abort_if(!$industry, 404);

    // Get courses belonging to this industry
    $courses = collect($allCourses)
        ->where('category_slug', $slug)
        ->values();

    // Get available course levels
    $courseLevels = $courses
        ->pluck('level')
        ->filter()
        ->unique()
        ->values()
        ->prepend('All');

    return view('frontend.pages.industry.index', [
        'industry' => $industry,
        'courses' => $courses->all(),
        'courseLevels' => $courseLevels,
    ]);
}

public function show(string $courseslug)
{
   
    $courses = json_decode(
        File::get(resource_path('data/courses.json')),
        true
    );

    $course = collect($courses)->firstWhere('slug', $courseslug);

    abort_if(!$course, 404);
        // return $course;

    return view('frontend.pages.industry.show', compact('course'));
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

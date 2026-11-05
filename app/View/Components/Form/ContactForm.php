<?php

namespace App\View\Components\Form;

use App\Models\Course;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ContactForm extends Component
{
    public $courses;

    public function __construct()
    {
        $this->courses = Course::query()
            ->select('id', 'name')
            ->orderBy('name')
            ->get();
    }

    public function render(): View|Closure|string
    {
        return view('components.form.contact-form');
    }
}
@extends('frontend.layouts.app')

@section('content')
    @include('frontend.pages.home.section.hero')  

    @include('frontend.pages.home.section.review')
    @include('frontend.pages.home.section.qualifications')

    @include('frontend.pages.about.section')

    @include('frontend.pages.home.section.industries')
    
    @include('frontend.pages.home.section.cta')

    @include('frontend.pages.home.section.prospect-form', ['qualifications' => $qualifications])

@endsection

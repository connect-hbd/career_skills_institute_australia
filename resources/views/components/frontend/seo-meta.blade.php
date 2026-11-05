@props([
    'pageTitle' => null,
])

@php
    use App\SEO\Models\SeoMeta;

    $routeName = request()->route()?->getName();
    $currentUri = request()->getRequestUri();
    $lastSegment = request()->segment(count(request()->segments()));

    /*
    |--------------------------------------------------------------------------
    | Find SEO Meta
    |--------------------------------------------------------------------------
    */

    $seo = SeoMeta::query()
        ->whereIn('path', array_filter([$routeName, $currentUri]))
        ->where('is_active', true)
        ->first();

    /*
    |--------------------------------------------------------------------------
    | Site Information
    |--------------------------------------------------------------------------
    */

    $siteName = config('app.name');
    $siteUrl = rtrim(config('app.url') ?: url('/'), '/');

    /*
    |--------------------------------------------------------------------------
    | Page Title
    |--------------------------------------------------------------------------
    |
    | Priority:
    |
    | 1. SEO database meta_title
    | 2. Blade @section('title')
    | 3. Route name
    | 4. Last URL segment
    | 5. Site name
    |
    */

    $pageTitle =
        $seo?->meta_title ?:
        $pageTitle ?:
        ($routeName
            ? str($routeName)->replace('.', ' ')->title()
            : ($lastSegment
                ? str($lastSegment)->replace('-', ' ')->title()
                : $siteName));

    $fullTitle = "{$pageTitle} | {$siteName}";

    /*
    |--------------------------------------------------------------------------
    | Images
    |--------------------------------------------------------------------------
    */

    $defaultImage = asset('images/og-default.jpg');

    $ogImage = !empty($seo?->og_image) ? asset($seo->og_image) : $defaultImage;

    $twitterImage = !empty($seo?->twitter_image) ? asset($seo->twitter_image) : $ogImage;
@endphp


{{-- =========================================================
    PAGE TITLE
========================================================= --}}

<title>{{ $fullTitle }}</title>


{{-- =========================================================
    BASIC
========================================================= --}}

<link rel="icon" href="{{ asset('favicon.ico') }}">

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta http-equiv="X-UA-Compatible" content="IE=edge">


{{-- =========================================================
    BASIC SEO
========================================================= --}}

<meta name="description" content="{{ $seo?->meta_description ?: $siteName }}">

<meta name="keywords" content="{{ $seo?->meta_keywords ?: 'education,college,training,courses' }}">

<meta name="robots" content="{{ $seo?->robots ?: 'index,follow' }}">

<link rel="canonical" href="{{ $seo?->canonical_url ?: url()->current() }}">


{{-- =========================================================
    OPEN GRAPH
========================================================= --}}

<meta property="og:title" content="{{ $seo?->og_title ?: $fullTitle }}">

<meta property="og:description" content="{{ $seo?->og_description ?: ($seo?->meta_description ?: $siteName) }}">

<meta property="og:image" content="{{ $ogImage }}">

<meta property="og:image:secure_url" content="{{ $ogImage }}">

<meta property="og:image:width" content="1200">

<meta property="og:image:height" content="630">

<meta property="og:image:type" content="image/png">

<meta property="og:url" content="{{ url()->current() }}">

<meta property="og:type" content="{{ $seo?->og_type ?: 'website' }}">

<meta property="og:site_name" content="{{ $siteName }}">


{{-- =========================================================
    TWITTER
========================================================= --}}

<meta name="twitter:card" content="summary_large_image">

<meta name="twitter:title" content="{{ $seo?->twitter_title ?: $fullTitle }}">

<meta name="twitter:description" content="{{ $seo?->twitter_description ?: ($seo?->meta_description ?: $siteName) }}">

<meta name="twitter:image" content="{{ $twitterImage }}">


{{-- =========================================================
    HEADER SCRIPTS
========================================================= --}}

@if (!empty($seo?->header_scripts))

    @foreach ($seo->header_scripts as $script)
        {!! $script !!}
    @endforeach

@endif


{{-- =========================================================
    SCHEMA MARKUP
========================================================= --}}

@if (!empty($seo?->schema_markup))
    {!! $seo->schema_markup !!}
@endif


{{-- =========================================================
    FOOTER SCRIPTS
========================================================= --}}

@if (!empty($seo?->footer_scripts))

    @foreach ($seo->footer_scripts as $script)
        {!! $script !!}
    @endforeach

@endif

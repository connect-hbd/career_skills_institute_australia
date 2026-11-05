<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('seo_metas', function (Blueprint $table) {
            $table->id();

            // Polymorphic SEO relationship
            // Example:
            // Event, Course, Page, etc.
            $table->nullableMorphs('seoable');

            // Route/page identifier
            // Example: home, about, course:web-design
            $table->string('path')->unique();

            // Basic SEO
            $table->string('meta_title', 255)->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();

            // Robots
            // Example: index,follow / noindex,nofollow
            $table->string('robots')->nullable();

            // Canonical
            $table->string('canonical_url')->nullable();

            // Open Graph
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image')->nullable();
            $table->string('og_type')->default('website');

            // Twitter
            $table->string('twitter_title')->nullable();
            $table->text('twitter_description')->nullable();
            $table->string('twitter_image')->nullable();

            // Schema markup
            $table->longText('schema_markup')->nullable();

            // Dynamic scripts
            // Google Analytics, Facebook Pixel, etc.
            $table->json('header_scripts')->nullable();
            $table->json('footer_scripts')->nullable();

            // Status
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            // Optional but recommended:
            // Prevent duplicate SEO records for the same model/path
            // if you don't want path to be globally unique.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_metas');
    }
};
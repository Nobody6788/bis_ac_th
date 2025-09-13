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
        Schema::create('content_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_key')->unique(); // e.g., 'hero.title', 'about.description'
            $table->string('section_name'); // Human readable name
            $table->text('content'); // The actual content
            $table->string('content_type')->default('text'); // text, html, markdown
            $table->string('page')->default('homepage'); // homepage, about, contact, etc.
            $table->integer('order')->default(0); // For ordering sections
            $table->boolean('is_active')->default(true);
            $table->json('metadata')->nullable(); // For storing additional data like classes, attributes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_sections');
    }
};

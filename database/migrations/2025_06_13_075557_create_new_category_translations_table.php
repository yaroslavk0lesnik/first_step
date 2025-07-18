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
        Schema::create('new_category_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id');
            $table->char('locale');
            $table->char('name');
            $table->char('short_name')->nullable();
            $table->longText('text')->nullable();
            $table->longText('page_seo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_category_translations');
    }
};

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
        Schema::create('division_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('division_id')
                ->constrained('divisions')
                ->onDelete('cascade');

            $table->unsignedBigInteger('category_id'); // не foreignId!

            $table->foreign('category_id')
                ->references('category_id') // <-- а не "id"
                ->on('services_categories')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('division_categories');
    }
};

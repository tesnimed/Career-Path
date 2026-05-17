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
        Schema::create('major_university', function (Blueprint $table) {
        $table->id();
        $table->foreignId('major_id')->constrained()->cascadeOnDelete();
        $table->foreignId('university_id')->constrained()->cascadeOnDelete();
        $table->integer('tuition_usd');
        $table->timestamps();
        $table->unique(['major_id', 'university_id']);
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('major_university');
    }
};

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
        Schema::create('project_stages', function (Blueprint $table) {
            $table->id();
            $table->integer('sort')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('project_id')->constrained()->restrictOnUpdate()->restrictOnDelete();
//            $table->foreignId('project_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('stage_id')->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_stages');
    }
};

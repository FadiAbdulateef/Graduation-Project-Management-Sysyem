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
        Schema::create('project_requirments', function (Blueprint $table) {
            $table->id();
            $table->string('title',200);
            $table->text('description')->nullable();
            $table->enum('requirement_type',['text','document','images','video','link','script'])->default('text');
            $table->foreignId('project_id')->constrained()->restrictOnUpdate()->restrictOnDelete();
//            $table->foreignId('project_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('stage_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_requirments');
    }
};

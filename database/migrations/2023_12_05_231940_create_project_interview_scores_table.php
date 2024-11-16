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
        Schema::create('project_interview_scores', function (Blueprint $table) {
            $table->id();
            $table->enum('supervisor_type',['primary','secondary'])->default('primary');
            $table->decimal('score',12)->nullable();
            $table->foreignId('interview_stage_item_id')->constrained()->restrictOnUpdate()->restrictOnDelete();
//            $table->foreignId('interview_stage_item_detail_id')->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->foreignId('project_id')->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->foreignId('supervisor_id')->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->foreignId('graduate_id')->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_interview_scores');
    }
};

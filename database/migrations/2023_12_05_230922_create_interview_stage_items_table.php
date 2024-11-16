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
        Schema::create('interview_stage_items', function (Blueprint $table) {
            $table->id();
            $table->enum('supervisor_type',['primary','secondary'])->default('secondary');
            $table->string('name',100);
            $table->integer('item_degree');
//            $table->foreign('interview__stage_id')->references('id')->on('interview__stages');
            $table->foreignId('interview_stage_id')->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interview_stage_items');
    }
};

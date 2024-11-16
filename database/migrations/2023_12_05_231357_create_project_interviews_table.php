<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    //مناقشة المشروع
    public function up(): void
    {
        Schema::create('project_interviews', function (Blueprint $table) {
            $table->id();
            $table->date('interview_date');
            $table->longText('interviewers')->nullable();
            $table->string('place',200)->nullable();
            $table->text('suggestions')->nullable();
            $table->text('recommendations')->nullable();
            $table->text('notes')->nullable();
            $table->longText('attachments')->nullable();
            $table->foreignId('project_id')->constrained()->restrictOnUpdate()->restrictOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_interviews');
    }
};

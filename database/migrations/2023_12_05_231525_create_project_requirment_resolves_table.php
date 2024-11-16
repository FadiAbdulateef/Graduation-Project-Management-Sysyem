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
        Schema::create('project_requirment_resolves', function (Blueprint $table) {
            $table->id();
            $table->text('value');
            $table->enum('status',['pending','approved','rejected'])->default('pending');
            $table->text('reject_reason')->nullable();
            $table->foreignId('project_requirment_id')->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_requirment_resolves');
    }
};

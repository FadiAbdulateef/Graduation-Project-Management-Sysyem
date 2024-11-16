<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('graduates', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 200);
            $table->string('last_name', 200)->nullable();
            $table->text('avatar')->nullable();
            $table->string('email', 50)->unique()->nullable();
            $table->string('phone', 20)->nullable();
            $table->text('for_year');
            $table->string('project_degree')->nullable();
            $table->foreignId('department_id')->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->restrictOnUpdate()->restrictOnDelete();
//            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('project_id')->nullable()->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('graduates');
    }
};

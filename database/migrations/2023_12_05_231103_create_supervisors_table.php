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
        Schema::create('supervisors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('email',50)->unique();
            $table->string('phone',20)->nullable();
            $table->text('for_year')->nullable();
            $table->foreignId('department_id')->nullable()->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->restrictOnUpdate()->restrictOnDelete();
            $table->foreignId('academic_rank_id')->nullable()->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supervisors');
    }
};

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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->integer('team_members')->default(5);
            $table->float('supervisor_score')->default(0.6);
            $table->float('committee_member_score')->default(0.4);
            $table->date('registration_start_date')->default(now());
            $table->date('registration_end_date')->default(now()->addDays(10));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

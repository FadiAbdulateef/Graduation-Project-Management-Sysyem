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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title',255);
            $table->text('goals');
            $table->text('short_description');
            $table->string('scope', 255);
            $table->enum('status',['مقترح','في إنتظار الأعتماد','مرفوض','متوقف','قيد التطوير','قيد التقييم','مكتمل'])->default('مقترح');
            $table->date('for_year');
            //        edite in amran
//            $table->string('department_id');
//            $table->foreignId('suggestion_project_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('supervisor_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};

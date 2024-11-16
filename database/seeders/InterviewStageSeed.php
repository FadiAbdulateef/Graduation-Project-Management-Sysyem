<?php

namespace Database\Seeders;

use App\Models\InterviewStage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterviewStageSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InterviewStage::create([
            'title'=>'المناقشة الأولية'
        ]);
        InterviewStage::create([
            'title'=>'المناقشة النهائية'
        ]);
    }
}

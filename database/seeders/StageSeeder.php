<?php

namespace Database\Seeders;

use App\Models\Stage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stages=[
            'إعدادالمشروع وتحليل/جمع البيانات',
            ' المناقشة الأولى',
            'التصميم',
            'التنفيذ ',
            '  كتابة الوثيقة النهائية للمشروع ',
            'المناقشة النهائية',
        ];
        $departments=\App\Models\Department::query()->pluck('id');
        foreach ($departments as $department){
            foreach ($stages as $stage){

                Stage::create(['title'=>$stage,'department_id'=>$department]);
            }
        }
    }
}

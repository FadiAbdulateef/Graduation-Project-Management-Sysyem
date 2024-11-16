<?php

namespace Database\Seeders;

use App\Models\InterviewStageItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterviewStageItemSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        `supervisor_type`, `name`, `item_degree`, `interview_stage_id`
        $name_primary_1 = ['المشكلة والتحليل', 'وثيقة المشروع', 'مهارات التعلم وفريق العمل', 'المناقشة'];
        $item_degree_primary_1 = [20, 10, 10, 10];
        $name_secondary_1 = ['المشكلة والتحليل', 'وثيقة المشروع', 'المناقشة'];
        $item_degree_secondary_1 = [20, 20, 10];
        $name_primary_2 = ['مراجعة والتحليل', 'وثيقة المشروع', 'التصميم والتنفيذ والاختبار', 'الإستنتاجات والتوصيات', 'مهارات التعلم وفريق العمل', 'المناقشة'];
        $item_degree_primary_2 = [5, 10, 20, 5, 5, 5];
        $name_secondary_2 = ['المشكلة والتحليل', 'وثيقة المشروع', 'التصميم والتنفيذ والاختبار', 'الإستنتاجات والتوصيات', 'المناقشة'];
        $item_degree_secondary_2 = [5, 15, 15, 5, 10];

        foreach ($name_primary_1 as $key => $name) {

            InterviewStageItem::query()->create([
                'supervisor_type' => 'primary',
                'name' => $name,
                'item_degree' => $item_degree_primary_1[$key],
                'interview_stage_id' => 1,
            ]);
        }
        foreach ($name_secondary_1 as $key => $name) {

            InterviewStageItem::query()->create([
                'supervisor_type' => 'secondary',
                'name' => $name,
                'item_degree' => $item_degree_secondary_1[$key],
                'interview_stage_id' => 1,
            ]);
        }
        foreach ($name_primary_2 as $key => $name) {

            InterviewStageItem::query()->create([
                'supervisor_type' => 'primary',
                'name' => $name,
                'item_degree' => $item_degree_primary_2[$key],
                'interview_stage_id' => 2,
            ]);
        }
        foreach ($name_secondary_2 as $key => $name) {

            InterviewStageItem::query()->create([
                'supervisor_type' => 'secondary',
                'name' => $name,
                'item_degree' => $item_degree_secondary_2[$key],
                'interview_stage_id' => 2,
            ]);
        }
    }
}

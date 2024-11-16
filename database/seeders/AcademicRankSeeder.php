<?php

namespace Database\Seeders;

use App\Models\AcademicRank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicRankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $academic_ranks=['استاذ دكتور','استاذ مشارك دكتور','استاذ مساعد دكتور','مدرس مساعد (ماجستير)','مدرس مساعد (بكالوريوس)'];
        $rank=[6,5,4,3,2];
        foreach ($academic_ranks as $key=>$academic_rank)

                AcademicRank::query()->create([
                    'academic_degree' => $academic_rank,
                    'max_graduation_projects'=>$rank[$key],
                ]);
//        foreach ($academic_ranks as $academic_rank)
//            foreach ($academic_rank as $keys=>$rank)
//                AcademicRanks::query()->create([
//                    'academic_degree' => $rank,
//                    'max_graduation_projects' => $keys,
//                ]);
    }
}

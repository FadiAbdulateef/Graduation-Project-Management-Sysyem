<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\InterviewStage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            PermissionTableSeeder::class,
            CreateAdminUserSeeder::class,
            DepartmentSeeder::class,
            StageSeeder::class,
            AcademicRankSeeder::class,
            SettingSeeder::class,
            GraduateSeeder::class,
            SupervisorSeeder::class,
            ProjectSeeder::class,
            InterviewStageSeed::class,
            InterviewStageItemSeed::class,
        ]);
    }
}

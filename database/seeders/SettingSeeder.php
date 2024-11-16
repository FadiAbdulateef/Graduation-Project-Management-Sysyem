<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::query()->create([
            'team_members' => 5,
            'supervisor_score' => 60,
            'committee_member_score' => 40,
            'registration_start_date' => Carbon::now(),
            'registration_end_date' => Carbon::now()->addDays(15),
        ]);
    }
}

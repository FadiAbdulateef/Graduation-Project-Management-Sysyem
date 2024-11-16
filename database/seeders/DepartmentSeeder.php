<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments=[
            ' نظم معلومات',
            'علوم حاسوب',
            'أمن سيبراني',
            'هندسة مدنيه ',
            'هندسة معماريه',
        ];
        foreach ($departments as $department){
            \App\Models\Department::query()->create(['name' =>$department]);
        }
    }
}

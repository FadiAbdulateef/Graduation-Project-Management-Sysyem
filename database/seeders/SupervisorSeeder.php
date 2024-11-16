<?php

namespace Database\Seeders;

use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supervisors = [
            ['first_name' => 'هشام', 'last_name' => 'حيدر', 'email' => 'hesham@example.com', 'phone' => '0123456789', 'for_year' => '2024', 'academic_rank_id' => 1],
            ['first_name' => 'محمد', 'last_name' => 'الحراسي', 'email' => 'harasi@example.com','phone' => '0123456789', 'for_year' => '2023', 'academic_rank_id' => 2],
            ['first_name' => 'نظمي  ', 'last_name' => 'المخلافي', 'email' => 'nnn@example.com','phone'=>'0123456782','for_year' => '2023', 'academic_rank_id' => 1],
            // يمكنك إضافة المزيد من المشرفين هنا
        ];
        $numberacademic = [
            ['stdsn'=>4160083],
            ['stdsn'=>4160087],
            ['stdsn'=>4160089],
        ];
        foreach ($supervisors as $key => $supervisor) {
            $department = \App\Models\Department::inRandomOrder()->first();
            $supervisor['department_id'] = $department->id;

            // إنشاء مستخدم جديد لكل مشرف
            $user = User::create([
                'first_name' => $supervisor['first_name'],
                'last_name' => $supervisor['last_name'],
                'stdsn'=> $numberacademic[$key]['stdsn'],
                'email' => $supervisor['email'],
                'password' => Hash::make('12345678'), // يمكنك تغيير كلمة المرور هنا
            ]);

            // إضافة id المستخدم إلى المشرف
            $supervisor['user_id'] = $user->id;

            // إنشاء مشرف جديد
            $new_supervisor = Supervisor::create($supervisor);

            // تعيين دور المشرف للمستخدم
            $user->assignRole(Role::findByName('مشرف'));
        }
    }
}

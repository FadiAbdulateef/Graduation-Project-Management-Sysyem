<?php

namespace Database\Seeders;

use App\Models\Graduate;
use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class GraduateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $graduates = [
            ['first_name' => 'فادي عبد اللطيف', 'last_name' => 'علي عيضه', 'email' => 'fadi.ali@gmail.com', 'phone' => '0123456789', 'for_year' => '2024'],
            ['first_name' => 'أحمد منصور', 'last_name' => 'علي يحي', 'email' => 'ahmed@gmail.com', 'phone' => '772903477', 'for_year' => '2024'],
            ['first_name' => 'محمد منصور', 'last_name' => 'علي يحي', 'email' => 'mohammed@gmail.com', 'phone' => '0123456789', 'for_year' => '2024'],
            ['first_name' => 'عبده صالح', 'last_name' => ' حميد ناشر', 'email' => 'abdh@gmail.com', 'phone' => '0123456789', 'for_year' => '2024'],
            // يمكنك تغيير الأسماء والبريد الإلكتروني والهاتف والسنة حسب الحاجة
            // تكرر الخطوات التالية لإضافة المزيد من الخريجين
            ['first_name' => 'طارق', 'last_name' => 'عزيز', 'email' => 'tareq@gmail.com', 'phone' => '0123456789', 'for_year' => '2024'],
            ['first_name' => 'طه', 'last_name' => 'سامي', 'email' => 'taha@gmail.com', 'phone' => '0123456789', 'for_year' => '2024'],
            ['first_name' => 'ناشر', 'last_name' => 'مجاهد', 'email' => 'nasher@gmail.com', 'phone' => '0123456789', 'for_year' => '2024'],
            ['first_name' => 'محمد', 'last_name' => 'صالح', 'email' => 'mohammed.saleh@gmail.com', 'phone' => '0123456789', 'for_year' => '2024'],
            ['first_name' => 'زهور صالح', 'last_name' => 'عُمران', 'email' => 'graduate5@gmail.com', 'phone' => '0123456789', 'for_year' => '2016'],
            ['first_name' => 'زينب', 'last_name' => 'الجودة', 'email' => 'graduate6@gmail.com', 'phone' => '0123456789', 'for_year' => '2015'],
            ['first_name' => 'علياء', 'last_name' => 'العماد', 'email' => 'graduate7@gmail.com', 'phone' => '0123456789', 'for_year' => '2014'],
            ['first_name' => 'عبد الرحمن', 'last_name' => 'المصنف', 'email' => 'graduate8@gmail.com', 'phone' => '0123456789', 'for_year' => '2013'],
            ['first_name' => 'عماد ', 'last_name' => 'الدحاحي', 'email' => 'graduate9@gmail.com', 'phone' => '0123456789', 'for_year' => '2012'],
            ['first_name' => 'فاروق ', 'last_name' => 'الرهمي', 'email' => 'graduate10@gmail.com', 'phone' => '0123456789', 'for_year' => '2011'],
            ['first_name' => 'علي عبد الله', 'last_name' => 'ابو راويه', 'email' => 'graduate11@gmail.com', 'phone' => '0123456789', 'for_year' => '2010'],
            ['first_name' => 'مراد', 'last_name' => 'ماطر', 'email' => 'graduate12@gmail.com', 'phone' => '0123456789', 'for_year' => '2009'],
            ['first_name' => 'حسان', 'last_name' => 'الجرادي', 'email' => 'graduate13@gmail.com', 'phone' => '0123456789', 'for_year' => '2008'],
            ['first_name' => 'عبد الخالق', 'last_name' => 'حصرم', 'email' => 'graduate14@gmail.com', 'phone' => '0123456789', 'for_year' => '2007'],
            ['first_name' => 'مجيب', 'last_name' => 'الوادعي', 'email' => 'graduate15@gmail.com', 'phone' => '0123456789', 'for_year' => '2006'],
        ];
        $numberacademic = [
            ['stdsn'=>4160066],
            ['stdsn'=>4160068],
            ['stdsn'=>4160069],
            ['stdsn'=>4160070],
            ['stdsn'=>4160071],
            ['stdsn'=>4160072],
            ['stdsn'=>4160073],
            ['stdsn'=>4160074],
            ['stdsn'=>4160075],
            ['stdsn'=>4160076],
            ['stdsn'=>4160077],
            ['stdsn'=>4160078],
            ['stdsn'=>4160079],
            ['stdsn'=>4160080],
            ['stdsn'=>4160081],
            ['stdsn'=>4160082],
            ['stdsn'=>4160083],
            ['stdsn'=>4160084],
            ['stdsn'=>4160085],
        ];

        foreach ($graduates as $key => $graduate) {
            $department = \App\Models\Department::inRandomOrder()->first();
            $graduate['department_id'] = $department->id;

            // إنشاء مستخدم جديد لكل خريج
            $user = User::create([
                'first_name' => $graduate['first_name'],
                'last_name' => $graduate['last_name'],
               'stdsn'=> $numberacademic[$key]['stdsn'],
                'email' => $graduate['email'],
                'password' => Hash::make('12345678'), // يمكنك تغيير كلمة المرور هنا
            ]);

            // إضافة id المستخدم إلى الخريج
            $graduate['user_id'] = $user->id;
            Graduate::create($graduate);

            // تعيين دور الخريج للمستخدم
            $user->assignRole(Role::findByName('خريج'));
        }
    }
}

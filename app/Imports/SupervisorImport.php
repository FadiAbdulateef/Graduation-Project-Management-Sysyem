<?php

namespace App\Imports;

use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Spatie\Permission\Models\Role;

class SupervisorImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
//        dd($rows);
        $rows = $rows->slice(1);


        foreach ($rows as $key=>$row) {
            $user = User::create([
                'first_name' => $row[1],
                'last_name' => $row[2],
                'stdsn'=> $row[6],
                'email' => $row[3],
                'password' => Hash::make('12345678'), // يمكنك تغيير كلمة المرور هنا
            ]);
            // تعيين دور الخريج للمستخدم
            $user->assignRole(Role::findByName('مشرف'));
//            dd($row['اسم الطالب']);
            Supervisor::create([
                'department_id' => $row[0],
                'first_name' => $row[1],
                'last_name' => $row[2], // استخدمت هذا العمود كمثال
                'email' => $row[3],
                'phone' => $row[4],
                'for_year' => $row[5],
                'user_id' => $user->id,
            ]);

        }
    }
}

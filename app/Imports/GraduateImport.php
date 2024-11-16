<?php

namespace App\Imports;

use App\Models\Graduate;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Spatie\Permission\Models\Role;

class GraduateImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
//        dd($rows);
        $rows = $rows->slice(1);


        foreach ($rows as $key=>$row) {
            // إنشاء مستخدم جديد لكل خريج
            $user = User::create([
                'first_name' => $row[0],
                'last_name' => $row[1],
                'stdsn'=> $row[5],
                'email' => $row[2],
                'password' => Hash::make('12345678'), // يمكنك تغيير كلمة المرور هنا
            ]);
            // تعيين دور الخريج للمستخدم
            $user->assignRole(Role::findByName('خريج'));
            $department = \App\Models\Department::inRandomOrder()->first();
//            dd($row['اسم الطالب']);
                Graduate::create([
                    'first_name' => $row[0],
                    'last_name' => $row[1], // استخدمت هذا العمود كمثال
                    'email' => $row[2],
                    'phone' => $row[3],
                    'for_year' => $row[4],
                    'department_id' => $department->id,
                    'user_id' => $user->id,
                ]);

        }

    }


//    public function collection(Collection $collection)
//    {
//
//
//        //dd($collection);
//        $rownumb=1;
//        foreach ($collection as $row)
//        {
////            dd($row);
//            if ($rownumb>=2)
//            {
////                dd($row[0]);
//                $Graduate= new Graduate([
//                    'first_name'=>$row[0],
//                    'last_name'=>$row[1],
//
////                    'avatar'=>null,
//                    'email'=>$row[2],
//                    'phone'=>$row[3],
//                    'for_year'=>$row[4],
//                    'department_id'=>$row[5],
////                    'user_id'=>$row['user_id'],
////                    'project_id'=>$row['project_id']
//
//                ]);
//                $Graduate->save();
//            }
//            $rownumb++;
//        }
//    }
}

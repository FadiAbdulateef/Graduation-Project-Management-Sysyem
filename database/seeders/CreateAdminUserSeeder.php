<?php

namespace Database\Seeders;

//use App\Enums\Specialization;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin User',
            'stdsn' => '4160067',
            'email' => 'Admin@gmail.com',
//            'spec' => Specialization::Software,
            'password' => bcrypt('12345678'),
        ]);

        // Role::create(['name' => 'Student']);

//        $role = Role::create(['name' => 'مدير']);
//
//        $permissions = Permission::pluck('id', 'id')->all();
//
//        $role->syncPermissions($permissions);
        Role::create(['name' => 'مدير'])->givePermissionTo([
            'report-list',
            'setting-control',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'graduate-list',
            'graduate-create',
            'graduate-edit',
            'graduate-delete',

            'supervisor-list',
            'supervisor-create',
            'supervisor-edit',
            'supervisor-delete',

            'project-list',
            'project-create',
            'project-edit',
            'project-delete',
//            'project.register',
            'project-detail',
//            'project-supervise',
//            'project-approve',
            'project-export',

//            'project_file-list',
//            'project_file-create',
//            'project_file-edit',
//            'project_file-delete',
            'project_file-download',

            'suggestion-list',
            'suggestion-create',
            'suggestion-edit',
            'suggestion-delete',
//            'suggestion-register',

            'departmentSeeder-list',
            'departmentSeeder-create',
            'departmentSeeder-edit',
            'departmentSeeder-delete',

//            'scope-list',
//            'scope-create',
//            'scope-edit',
//            'scope-delete',

            'stage-list',
            'stage-create',
            'stage-edit',
            'stage-delete',

            'project_team-list',
            'project_team-create',
            'project_team-edit',
            'project_team-delete',

//            'project_requirment-list',
//            'project_requirment-create',
//            'project_requirment-edit',
//            'project_requirment-delete',
//
//            'project_requirment_resolve-list',
//            'project_requirment_resolve-create',
//            'project_requirment_resolve-edit',
//            'project_requirment_resolve-delete',

            'project_interview-list',
            'project_interview-create',
            'project_interview-edit',
            'project_interview-delete',

            'interview_stage-list',
            'interview_stage-create',
            'interview_stage-edit',
            'interview_stage-delete',

            'interview_stage_item-list',
            'interview_stage_item-create',
            'interview_stage_item-edit',
            'interview_stage_item-delete',

            'project_interview_score-list',
            'project_interview_score-create',
            'project_interview_score-edit',
            'project_interview_score-delete',

            'project_tag-list',
            'project_tag-create',
            'project_tag-edit',
            'project_tag-delete',
        ]);

//        $permissions = Permission::pluck('id', 'id')->all();
//
//        $role->syncPermissions($permissions);
//
//        $user->assignRole([$role->id]);

        $user->assignRole('مدير');

        Role::create(['name' => 'رئيس قسم'])
            ->givePermissionTo([
                'project-list',
                'project-approve',
                'project-detail',
//                'project-create',
//                'project-edit',
                'project-supervise',
                'project_file-download',
                'suggestion-list',
                'suggestion-create',
                'suggestion-edit',
//                'suggestion-delete',
                'project_interview-list',
                'project_interview-create',
                'project_interview-edit',
                'project_interview-delete',
                'project_interview_score-list',
                'project_interview_score-create',
                'project_tag-list',
                'project_tag-create',
            ]);
        Role::create(['name' => 'مشرف'])
            ->givePermissionTo([
                'project-list',
//                'project-create',
//                'project-edit',
                'project-supervise',
                'project_file-download',
                'suggestion-list',
                'suggestion-create',
                'suggestion-edit',
//                'suggestion-delete',
                'project_interview-list',
                'project_interview-create',
//                'project_interview-edit',
//                'project_interview-delete',
                'project_interview_score-list',
                'project_interview_score-create',
                'project_tag-list',
                'project_tag-create',
            ]);
        Role::create(['name' => 'خريج'])->givePermissionTo([
            'project-list',
            'project_interview_score-list',
            'project_tag-list',
            'project_interview-list',
            'project_team-list',
//            'project_team-create',
//            'project-register',
            'suggestion-register',
            'suggestion-list',
            'project_file-download',
        ]);
    }
}

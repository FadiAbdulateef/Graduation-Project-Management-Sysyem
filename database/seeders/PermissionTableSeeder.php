<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
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
//            'project-register',
            'project-detail',
            'project-supervise',
            'project-approve',
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
            'suggestion-register',

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
        ];
//dd(Permission::all());
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Enums\ProjectState;
use App\Models\Project;
use App\Models\Supervisor;
use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all supervisors
        $supervisors = Supervisor::all();

        // Get all departments
        $departments = Department::all(); // Use the correct class name

        // If there are no supervisors or departments, we can't create projects
        if ($supervisors->isEmpty() || $departments->isEmpty()) {
            echo "No supervisors or departments found. Please run SupervisorSeeder and DepartmentSeeder first.\n";
            return;
        }

        // Create several projects
        $projects = [
            [
                'title' => 'تطوير نظام إدارة المحتوى',
                'goals' => 'تطوير نظام إدارة المحتوى مرن وقابل للتوسع',
                'short_description' => 'هذا المشروع يهدف إلى تطوير نظام إدارة المحتوى يمكن استخدامه في مجموعة متنوعة من السياقات. سيتضمن النظام واجهة مستخدم سهلة الاستخدام ومرونة في التخصيص والتوسع.',
                'status' => ProjectState::Proposition,
                'for_year' => date('Y-m-d'),
                'scope' => 'تطوير، اختبار، وتوثيق نظام إدارة المحتوى',
            ],
            [
                'title' => 'نظام إدارة مشاريع التخرج',
                'goals' => '•	توثيق المشاريع السابقة في قاعدة بيانات.
	تسهيل الوصول الى المشاريع السابقة والاطلاع عليها والاستفادة منها.,
	إمكانية تطوير مشاريع سابقه من خلال الاطلاع على مراحل تطويرها وعيوبها والاطلاع على التوصيات عن كل مشروع.,
	عرض قائمة بالمشاريع المقترحة من قبل الأقسام والمشرفين في الكلية.,
	إمكانية تسجيل طلب تقديم لمشروع من المشاريع المقترحة.,
	توثيق البيانات والمعلومات المتعلقة بالمشاريع.,
	إمكانية تحديد مواعيد المناقشات.,
	إمكانية تقييم المشروع من قبل لجنة المناقشة.,
	تحسين الجودة الأكاديمية والتقدم العلمي للجامعة.,
',
                'short_description' => '“نظام إدارة مشاريع التخرج”، موقع ويب مطور بإطار عمل Laravel 10  يهدف إلى تسهيل وتحسين عملية اختيار وإدارة مشاريع التخرج في الكلية. يتيح هذا النظام للطلاب والأساتذة وإدارة الكلية القدرة على تقديم وتصفح أفكار المشاريع، واختيار الأفكار المناسبة، وتتبع تقدم المشاريع. بالإضافة إلى ذلك، يساعد النظام في تعزيز الأصالة والابتكار من خلال تشجيع الطلاب على تقديم أفكار جديدة ومبتكرة، وتقديم الدعم لهم خلال عملية التنفيذ، يتضمن النظام جميع الخطوات والإجراءات المتعلقة بإدارة المشروع، بدءًا من مرحلة الفكرة وصولاً إلى مرحلة التنفيذ والتقييم.  في النهاية، يهدف المشروع إلى تحسين الجودة والكفاءة العامة لمشاريع التخرج في الكلية.',
                'status' => ProjectState::Proposition,
                'for_year' => date('Y-m-d'),
                'scope' => 'ويب',
            ],
            // يمكنك إضافة المزيد من المشاريع هنا
        ];

        foreach ($projects as $projectData) {
            // Pick a random supervisor
            $supervisor = $supervisors->random();

            // Create a new project
            $project = new Project(array_merge($projectData, ['supervisor_id' => $supervisor->id]));

            // Save the project
            $project->save();

            // Attach the project to random departments
            $project->departments()->attach($departments->random(rand(1, 1))->pluck('id')->toArray());
        }


//        // Get all supervisors
//        $supervisors = Supervisor::all();
//
//        // Get all departments
//        $departments = Department::all(); // Use the correct class name
//
//        // If there are no supervisors or departments, we can't create projects
//        if ($supervisors->isEmpty() || $departments->isEmpty()) {
//            echo "No supervisors or departments found. Please run SupervisorSeeder and DepartmentSeeder first.\n";
//            return;
//        }
//
//        // Create several projects
//        $projects = [
//            [
//                'title' => 'تطوير نظام إدارة المحتوى',
//                'goals' => 'تطوير نظام إدارة المحتوى مرن وقابل للتوسع',
//                'short_description' => 'مشروع لتطوير نظام إدارة المحتوى يمكن استخدامه في مجموعة متنوعة من السياقات.',
//                'status' => ProjectState::Proposition,
//                'for_year' => date('Y-m-d'),
//                'scope' => 'تطوير، اختبار، وتوثيق نظام إدارة المحتوى',
//            ],
//            // يمكنك إضافة المزيد من المشاريع هنا
//        ];
//
//        foreach ($projects as $projectData) {
//            // Pick a random supervisor
//            $supervisor = $supervisors->random();
//
//            // Create a new project
//            $project = new Project(array_merge($projectData, ['supervisor_id' => $supervisor->id]));
//
//            // Save the project
//            $project->save();
//
//            // Attach the project to random departments
//            $project->departments()->attach($departments->random(rand(1, 3))->pluck('id')->toArray());
//        }


////         Get all supervisors
//        $supervisors = Supervisor::all();
//
//        // Get all departments
//        $departments = Department::all(); // Use the correct class name
//
//        // If there are no supervisors or departments, we can't create projects
//        if ($supervisors->isEmpty() || $departments->isEmpty()) {
//            echo "No supervisors or departments found. Please run SupervisorSeeder and DepartmentSeeder first.\n";
//            return;
//        }
//
//        // Create several projects
//        for ($i = 0; $i < 10; $i++) {
//            // Pick a random supervisor
//            $supervisor = $supervisors->random();
//
//            // Create a new project
//            $project = new Project([
//                'title' => 'Project ' . ($i + 1),
//                'goals' => 'Goals for project ' . ($i + 1),
//                'short_description' => 'مجال ' . ($i + 1),
//                'status' => ProjectState::Proposition,
//                'for_year' => date('Y-m-d'),
//                'supervisor_id' => $supervisor->id,
//                'scope' => 'Scope for project ' . ($i + 1),
//            ]);
//
//            // Save the project
//            $project->save();
//
//            // Attach the project to random departments
//            $project->departments()->attach($departments->random(rand(1,2))->pluck('id')->toArray());
//        }

    }
}



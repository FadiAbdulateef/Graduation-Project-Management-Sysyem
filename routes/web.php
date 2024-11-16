<?php

use App\Http\Controllers\AcademicRankController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\GraduateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InterviewStageController;
use App\Http\Controllers\InterviewStageItemController;
//use App\Http\Controllers\InterviewStageItemDetailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectFileController;
use App\Http\Controllers\ProjectInterviewController;
use App\Http\Controllers\ProjectInterviewScoreController;
use App\Http\Controllers\ProjectStageController;
use App\Http\Controllers\ProjectTeamController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ScopeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\SuggestionProjectController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\UserController;
use App\Models\ProjectStage;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route::get('/', function () {
//    return view('welcomes');
//});

//Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
//Route::put('profile/edit', [ProfileController::class, 'update'])->name('profile.update');
Route::get('profile/editpassword', [ProfileController::class, 'editpassword'])->name('profile.editpassword');
Route::put('profile/updatepassword', [ProfileController::class, 'updatepassword'])->name('profile.updatepassword');

Route::group(['middleware' => ['auth','check-password']], function () {
    //Hom
    Route::get('/', [HomeController::class, 'index'])
        ->name('welcome');
    //route departmentSeeder
    Route::resource('departmentSeeder', DepartmentController::class);
    //route graduate
    Route::resource('graduate', GraduateController::class);
    Route::Post('destroy_select', [GraduateController::class, 'destroy_select'])->name('destroy_select');

    ################################################################---Route Suggestion Projects ---#############################################
    Route::resource('suggestion', SuggestionProjectController::class);
    //Project Registration New
    Route::POST('suggestion/addRegisterNew', [SuggestionProjectController::class, 'addRegisterNew'])->name('suggestion.addRegisterNew');
    //Project Registration
    Route::POST('suggestion/registration', [SuggestionProjectController::class, 'registration'])->name('suggestion.registration');

    Route::get('suggestion/{project:id}/supervise', [SuggestionProjectController::class, 'supervise'])->name('suggestion.supervise');
//    Project unsupervisor
    Route::get('suggestion/{project:id}/abandon', [SuggestionProjectController::class, 'unsupervisor'])->name('suggestion.unsupervisor');
    //Project Approve
    Route::get('suggestion/{project:id}/approve', [SuggestionProjectController::class, 'approve'])->name('suggestion.approve');
    //Project disApprove
    Route::get('suggestion/{project:id}/disapprove', [SuggestionProjectController::class, 'disapprove'])->name('suggestion.disapprove');
    ################################################################---Route Projects ---#############################################
    Route::resource('project', ProjectController::class);
    Route::get('project/{project:id}/abandon', [ProjectController::class, 'abandon'])->name('projects.abandon');
    //Project File
    Route::resource('project_files', ProjectFileController::class)->only('store', 'destroy');
    Route::post('deleteFile', [ProjectFileController::class, 'deleteFile'])->name('deleteFile');
    //Project Stage
    Route::resource('project_stage', ProjectStageController::class);
    Route::post('update_status/{project:id}', [ProjectStageController::class, 'update_status'])->name('status.update');
//    //Project Assign
//    Route::get('projects/{project:id}/assign', [ProjectController::class, 'assign'])->name('projects.assign');

    //Project Approve
    Route::get('projects/{project:id}/approve', [ProjectController::class, 'approve'])->name('projects.approve');
    Route::get('projects/{project:id}/disapprove', [ProjectController::class, 'disapprove'])->name('projects.disapprove');
    //Project Report
    Route::get('projects/{project}/Registration/report', [ProjectController::class, 'Registration_report'])->name('Registration_report');
    Route::get('projects/{project}/مشروعك', [ProjectController::class, 'project_graduate'])->name('project.project_graduate');
    Route::get('projects/مشاريعك', [ProjectController::class, 'projects_supervisor'])->name('project.projects_supervisor');

//    Route::get('projects/{project}/edit_your_prject', [ProjectController::class, 'project_graduate_update'])->name('project.project_graduate_update');
    Route::put('/projects/{id}/edit_your_project', [ProjectController::class,'project_graduate_update'])->name('project.project_graduate_update');
    Route::put('/projects/{id}/edit_your_projects', [ProjectController::class,'project_supervisor_update'])->name('project.project_supervisor_update');

//    ################################################################---Project Interview ---#############################################
//    Route::resource('project_interview', ProjectInterviewController::class);
//    Route::post('project_interview/{project:id}/suggestions_recommendations', [ProjectInterviewController::class,'suggestions_recommendations'])->name('project_interview.suggestions_recommendations');
//    Route::resource('interview_stage', InterviewStageController::class);
//    Route::resource('interview_stage_item', InterviewStageItemController::class);
//    Route::resource('project_interview_score', ProjectInterviewScoreController::class);
//    ################################################################---Project Interview Score ---#############################################
//    Route::get('project_interview/{project:id}/interview_report', [ProjectInterviewScoreController::class,'interview_report'])->name('project_interview_score.interview_report');
    ################################################################---Project Interview ---#############################################
    Route::resource('project_interview', ProjectInterviewController::class);
    Route::post('project_interview/{project:id}/suggestions_recommendations', [ProjectInterviewController::class,'suggestions_recommendations'])->name('project_interview.suggestions_recommendations');
    Route::resource('interview_stage', InterviewStageController::class);
    Route::resource('interview_stage_item', InterviewStageItemController::class);
    Route::resource('project_interview_score', ProjectInterviewScoreController::class);
    ################################################################---Project Interview Score ---#############################################
    Route::get('project_interview/{project:id}/interview_report', [ProjectInterviewScoreController::class,'interview_report'])->name('project_interview_score.interview_report');
######################
    Route::get('/project_team/destroySuggestion/{id}', [ProjectTeamController::class, 'destroySuggestion'])->name('project_team.destroySuggestion');
    Route::resource('project_team', ProjectTeamController::class);
    Route::resource('profile', ProfileController::class);
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.updated');

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::get('users/{id}/status' ,[UserController::class,'userStatus'])->name('user.status');




    Route::resource('scope', ScopeController::class);
    Route::resource('supervisor', SupervisorController::class);
    Route::resource('stage', StageController::class);
    ################################################################---Setting Route---#############################################
    Route::resource('settings', SettingController::class);
    Route::post('settings/reset', [SettingController::class, 'reset'])->name('settings.reset');
    Route::POST('settings/update_academic_rank', [SettingController::class, 'updateacademicRanks'])->name('settings.updateacademicRanks');
    Route::resource('academic_ranks', AcademicRankController::class);

    ################################################################---import Route---#############################################
    Route::Post('importGraduate', [GraduateController::class,'import'])->name('importGraduate');
    Route::Post('importSupervisor', [SupervisorController::class,'import'])->name('importSupervisor');
    Route::get('/download-file', [ProjectFileController::class, 'downloadFile'])->name('downloadFile');
################################################################---Suggestion Project---#############################################
//    Route::resource('suggestion_project', SuggestionProjectController::class);
});





require __DIR__ . '/auth.php';


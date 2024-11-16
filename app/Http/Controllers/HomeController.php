<?php

namespace App\Http\Controllers;

use App\Enums\ProjectState;
use App\Models\Graduate;
use App\Models\Project;
use App\Models\ProjectInterview;
use App\Models\Supervisor;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index()
    {
        if (Auth::user()->can('setting-control'))
        {
            $graduate = Graduate::all()->count();
            $project_Approved = Project::all()->where('status', ProjectState::Complete)->count();
            $project_Proposition = Project::all()->where('status', ProjectState::Proposition)->count();
            $project_Incomplete = Project::all()->where('status', ProjectState::Incomplete)->count();
//        $project_Evaluating=Project::all()->where('status', ProjectState::Evaluating)->count();
            $project_Complete = Project::all()->where('status', ProjectState::Complete)->count();
            $project_Stopped = Project::all()->where('status', ProjectState::Stopped)->count();
            $project_Rejected = Project::all()->where('status', ProjectState::Rejected)->count();
            $interview = ProjectInterview::all()->count();
            $user = User::all()->count();
            $supervisor = Supervisor::all()->count();

//        return view('welcome',compact('graduate','interview','project_Approved','project_Proposition','project_Incomplete','project_Evaluating','project_Complete','project_Rejected','project_Stopped','user','supervisor'));
            return view('welcome', compact('graduate', 'interview', 'project_Approved', 'project_Proposition', 'project_Incomplete', 'project_Complete', 'project_Rejected', 'project_Stopped', 'user', 'supervisor'));
        }
        elseif (Auth::user()->graduate && Auth::user()->graduate->project_id)
        {
            return  redirect(route('project.project_graduate', ['project' => Auth::user()->graduate->project_id]));
        }
        elseif (Auth::user()->supervisor)
        {
            return redirect(route('project.projects_supervisor'));
        }
        else
        {
            return redirect()->route('suggestion.index')->with('success','Logged in successfully');
        }
    }
}

<?php

namespace App\Models;

use App\Enums\ProjectState;
use App\Enums\Specialization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Project extends Model
{
    use HasFactory,SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'goals',
        'short_description',
        'status',
        'for_year',
        'supervisor_id',
        'scope'];
    public $timestamps = true;
    protected $casts = [
        'status' => ProjectState::class,
    ];

    public function stages():HasMany
    {
        return $this->hasMany(ProjectStage::class);
    }
    public function graduats():HasMany
    {
        return $this->hasMany(Graduate::class);
    }

    public function interviews(): HasMany
    {
        return $this->hasMany(ProjectInterview::class);
    }
    public function project_teams(): HasMany
    {
        return $this->hasMany(ProjectTeam::class);
    }
    public function project_interview_scores(): HasMany
    {
        return $this->hasMany(ProjectInterviewScore::class);
    }
//    public function departments(): HasMany
//    {
//        return $this->hasMany(ProjectDepartment::class);
//    }
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'project_departments');
    }


    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(Supervisor::class);
    }
//    public function suggestion_project(): BelongsTo
//    {
//        return $this->belongsTo(SuggestionProject::class);
//    }
//    public function scope():BelongsTo
//    {
//        return $this->belongsTo(Scope::class);
//    }
}

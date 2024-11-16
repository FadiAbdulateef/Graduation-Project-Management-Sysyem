<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectInterviewScore extends Model
{
    use HasFactory;
    protected $fillable = ['score', 'supervisor_type', 'interview_stage_item_id', 'project_id', 'supervisor_id', 'graduate_id'];
    public $timestamps =true;

    public function supervisor(): BelongsTo
    {
        return $this->belongsTo(Supervisor::class);
    }
    public function graduate(): BelongsTo
    {
        return $this->belongsTo(Graduate::class);
    }
    public function interview_stage_item(): BelongsTo
    {
        return $this->belongsTo(InterviewStageItem::class);
    }
    Public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}

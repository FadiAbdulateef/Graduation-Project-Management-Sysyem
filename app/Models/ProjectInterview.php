<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectInterview extends Model
{
    use HasFactory;
//id`, `interview_date`, `interviewers`, `place`, `suggestions`, `recommendations`, `notes`, `attachments`, `project_id`, `created_at`, `updated_at`
    protected $fillable =['interview_date','interviewers','place','notes','project_id','interview_type'];
    public $timestamps =true;

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

}

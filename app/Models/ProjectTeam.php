<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectTeam extends Model
{
    use HasFactory;
//        `id`, `member_type`, `status`, `project_id`, `graduate_id`, `created_at`, `updated_at`

    protected $fillable =[
        'member_type',
        'status',
        'project_id',
        'graduate_id'
    ];
    public $timestamps = true;

    public function projects(): BelongsTo
    {
       return $this->belongsTo(Project::class);
    }

    public function graduate(): BelongsTo
    {
       return $this->belongsTo(Graduate::class);
    }
}

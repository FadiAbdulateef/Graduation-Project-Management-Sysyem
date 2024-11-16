<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectStage extends Model
{
    use HasFactory;

    protected $fillable = ['sort','notes','project_id','stage_id'];
    public $timestamps = true;

    public function stageproject():BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
    public function stage():BelongsTo
    {
        return $this->belongsTo(Stage::class);
    }
}

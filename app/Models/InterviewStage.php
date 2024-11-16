<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewStage extends Model
{
    use HasFactory;
    protected $fillable = ['title'];
    public $timestamps = true;

    public function interview_stage_items()
    {
        return $this->hasMany(InterviewStageItem::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewStageItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'item_degree',
        'supervisor_type',
        'interview_stage_id'
    ];
    public $timestamps = true;

    public function interview_stage()
    {
        return $this->belongsTo(InterviewStage::class);
    }
//    public function interview_stage_item_details()
//    {
//        return $this->hasMany(InterviewStageItemDetail::class);
//    }
}

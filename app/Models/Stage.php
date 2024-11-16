<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stage extends Model
{
    use HasFactory;
    protected $fillable = ['title','department_id'];
    public $timestamps = true;


    public function department(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
    public function project_stages():HasMany
    {
        return $this->hasMany(ProjectStage::class);
    }
}

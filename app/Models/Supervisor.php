<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supervisor extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'first_name',
        'last_name',
        'email',
        'is_external',
        'phone',
        'for_year'
    ,'user_id'
    ,'academic_rank_id'];

    public $timestamps = true;


    public function department(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

//    public function suggestion_projects(): HasMany
//    {
//        return $this->hasMany(SuggestionProject::class);
//    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
    public function academic_rank(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
       return $this->belongsTo(AcademicRank::class);
    }

    // هذه الدالة تجلب معلومات التاريخ بصيغة مختلفة في عمود مضاف في (تاريخ الاضافة)
    public function getCreatedAtAttribute($value)
    {
        return date('Y-m-d', strtotime($value));
    }
}

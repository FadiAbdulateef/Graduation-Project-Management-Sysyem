<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Graduate extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use HasFactory,SoftDeletes;
    protected $fillable = ['first_name', 'last_name', 'avatar', 'email', 'phone', 'for_year', 'department_id', 'user_id', 'project_id'];
    public $timestamps = true;

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);

    }
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);

    }
    public function project():BelongsTo
    {
        return $this->belongsTo(Project::class);

    }
    public function project_teams():HasMany
    {
        return $this->hasMany(ProjectTeam::class);
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public $timestamps = true;

//    public function scopes():HasMany
//    {
//        return $this->hasMany(Scope::class);
//    }

    public function supervisors(): HasMany
    {
        return $this->hasMany(Supervisor::class);
    }


    public function stages():HasMany
    {
        return $this->hasMany(Stage::class);
    }
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_departments');
    }


//    public function projects(): HasMany
//    {
//        return $this->hasMany(ProjectDepartment::class);
//    }

}

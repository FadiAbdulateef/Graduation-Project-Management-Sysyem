<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AcademicRank extends Model
{
    use HasFactory;
    protected $fillable = ['academic_degree', 'max_graduation_projects'];

    public function supervisors():HasMany
    {
        return $this->hasMany(Supervisor::class);
    }
}

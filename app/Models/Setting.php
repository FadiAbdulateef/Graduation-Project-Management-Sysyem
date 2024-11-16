<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = ['team_members', 'supervisor_score', 'committee_member_score', 'registration_start_date', 'registration_end_date'];
}

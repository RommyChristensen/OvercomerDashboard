<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamLeader extends Model
{
    use HasFactory;
    protected $table = "team_leaders";
    protected $primaryKey = "tl_id";

    protected $guarded = [];

    public function coaches() {
        return $this->hasMany(Coach::class, 'team_leader_id', 'tl_id');
    }

    public function member() {
        return $this->hasOne(Member::class, 'member_id', 'member_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;
    protected $table = "coaches";
    protected $primaryKey = "coach_id";

    protected $guarded = [];

    public function connect_groups() {
        return $this->hasMany(CGroups::class, 'coach_id', 'coach_id');
    }

    public function member() {
        return $this->hasOne(Member::class, 'member_id', 'member_id');
    }
}

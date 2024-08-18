<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = "members";
    protected $primaryKey = "member_id";

    protected $guarded = [];

    public function connect_group() {
        return $this->belongsTo(CGroups::class, 'connect_group_id', 'connect_group_id');
    }

    public function role() {
        return $this->hasOne(Role::class, 'role_id', 'role_id');
    }

    public function ministries() {
        return $this->hasMany(Ministry::class, 'ministry_id', 'member_id');
    }
}

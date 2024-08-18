<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CGroups extends Model
{
    use HasFactory;

    protected $table = "connect_groups";
    protected $primaryKey = "connect_group_id";

    protected $guarded = [];

    public function members() {
        return $this->hasMany(Member::class, 'connect_group_id', 'connect_group_id');
    }
}

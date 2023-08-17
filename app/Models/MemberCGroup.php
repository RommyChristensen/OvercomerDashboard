<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberCGroup extends Model
{
    use HasFactory;
    protected $table = "member_connect_group";
    protected $primaryKey = "member_connect_group_id";
    public $timestamps = false;

    protected $guarded = [];
}

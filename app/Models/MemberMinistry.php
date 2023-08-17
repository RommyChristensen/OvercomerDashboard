<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberMinistry extends Model
{
    use HasFactory;
    protected $table = "member_ministry";
    protected $primaryKey = "member_ministry_id";
    public $timestamps = false;

    protected $guarded = [];
}

<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = "users";
    protected $primaryKey = "user_id";

    public function getAuthPassword()
    {
        return $this->password;
    }
}

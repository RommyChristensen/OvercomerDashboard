<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    use HasFactory;
    protected $table = "privileges";
    protected $primaryKey = "privilege_id";

    protected $guarded = [];

    public function menu() {
        return $this->hasMany(Menu::class, 'menu_id');
    }
}

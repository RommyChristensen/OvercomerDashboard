<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = "menus";
    protected $primaryKey = "menu_id";

    protected $guarded = [];

    public function children() {
        return $this->hasMany(Menu::class, 'menu_parent_id');
    }

    public function parent() {
        return $this->belongsTo(Menu::class, 'menu_parent_id');
    }
}

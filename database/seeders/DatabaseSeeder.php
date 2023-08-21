<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Role;
use App\Models\User;
use App\Models\Ministry;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // add roles
        Role::create([
            'role_name' => "Administrator",
        ]);
        Role::create([
            'role_name' => "Team Leader",
        ]);
        Role::create([
            'role_name' => "Coach",
        ]);
        Role::create([
            'role_name' => "CG Leader",
        ]);
        Role::create([
            'role_name' => "Sponsor",
        ]);
        Role::create([
            'role_name' => "Member",
        ]);
        Role::create([
            'role_name' => "VIP",
        ]);

        // add menus
        Menu::create([
            'menu_display_name' => "Master Menu",
            'menu_level' => 1,
            'menu_link' => '/admin/master_menu',
            'menu_parent_id' => null,
            'menu_is_sidebar' => 1,
        ]);

        // add privileges

        // add admin
        User::create([
            'username' => "superadmin",
            'fullname' => 'Super Admin',
            'password' => Hash::make("superadmin"),
            'member_id' => NULL
        ]);

        // add ministries
        Ministry::create([
            'ministry_name' => "Data Ministry",
            'ministry_description' => "Description of Data Ministry",
        ]);
        Ministry::create([
            'ministry_name' => "Praise and Worship",
            'ministry_description' => "Description of Praise and Worship",
        ]);
        Ministry::create([
            'ministry_name' => "Usher",
            'ministry_description' => "Description of Usher",
        ]);
    }
}

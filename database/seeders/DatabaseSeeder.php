<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Role;
use App\Models\User;
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
    }
}

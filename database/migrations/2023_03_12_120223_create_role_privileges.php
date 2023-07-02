<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolePrivileges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_privileges', function (Blueprint $table) {
            $table->increments("role_privilege_id");
            $table->integer("role_id")->unsigned();
            $table->integer("privilege_id")->unsigned();
            $table->timestamps();

            $table->foreign("role_id")->references("role_id")->on("roles");
            $table->foreign("privilege_id")->references("privilege_id")->on("privileges");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_privileges');
    }
}

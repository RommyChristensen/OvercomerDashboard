<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivileges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privileges', function (Blueprint $table) {
            $table->increments("privilege_id");
            $table->text("privilege_name");
            $table->integer("role_id")->unsigned();
            $table->integer("menu_id")->unsigned();
            $table->timestamps();

            $table->foreign("role_id")->references("role_id")->on("roles");
            $table->foreign("menu_id")->references("menu_id")->on("menus");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privileges');
    }
}

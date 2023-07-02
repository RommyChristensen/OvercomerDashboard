<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMemberConnectGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_connect_group', function (Blueprint $table) {
            $table->increments("member_connect_group_id");
            $table->integer("connect_group_id")->unsigned();
            $table->integer("member_id")->unsigned();
            $table->integer("role_id")->unsigned();
            $table->date("member_connect_group_date_start");
            $table->date("member_connect_group_date_end");
            $table->boolean("member_connect_group_status");

            $table->foreign("connect_group_id")->references("connect_group_id")->on("connect_groups");
            $table->foreign("member_id")->references("member_id")->on("members");
            $table->foreign("role_id")->references("role_id")->on("roles");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_connect_group');
    }
}

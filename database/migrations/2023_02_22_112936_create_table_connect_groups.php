<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableConnectGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connect_groups', function (Blueprint $table) {
            $table->increments("connect_group_id");
            $table->integer("connect_group_number");
            $table->integer("connect_group_status");
            $table->time("connect_group_time");
            $table->text("connect_group_day");
            $table->text("connect_group_location");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('connect_groups');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMemberMinistry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_ministry', function (Blueprint $table) {
            $table->increments("member_ministry_id");
            $table->integer("member_id")->unsigned();
            $table->integer("ministry_id")->unsigned();
            $table->date("member_ministry_date_start");
            $table->date("member_ministry_date_end")->nullable();
            $table->boolean("member_ministry_status")->default(true);
            $table->text("member_ministry_remarks")->nullable();

            $table->foreign("member_id")->references("member_id")->on("members");
            $table->foreign("ministry_id")->references("ministry_id")->on("ministries");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_ministry');
    }
}

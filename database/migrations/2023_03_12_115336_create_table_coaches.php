<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCoaches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coaches', function (Blueprint $table) {
            $table->increments("coach_id");
            $table->text("coach_name");
            $table->integer("member_id")->unsigned();
            $table->integer("team_leader_id")->unsigned();
            $table->timestamps();

            $table->foreign("member_id")->references("member_id")->on("members");
            $table->foreign("team_leader_id")->references("team_leader_id")->on("team_leaders");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coaches');
    }
}

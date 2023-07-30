<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments("member_id");
            $table->bigInteger("member_nij")->unique();
            $table->text("member_fullname");
            $table->boolean("member_is_active")->default(true);
            $table->text("member_birth_place");
            $table->date("member_birth_date");
            $table->text("member_address");
            $table->text("member_phone");
            $table->text("member_status");
            $table->text("member_company")->nullable();
            $table->text("member_campus")->nullable();
            $table->boolean("member_believe_jesus");
            $table->boolean("member_water_baptism");
            $table->boolean("member_spirit_baptism");
            $table->boolean("member_cg_routine");
            $table->boolean("member_aog_routine");
            $table->boolean("member_msj_1");
            $table->boolean("member_msj_2");
            $table->boolean("member_msj_3");
            $table->boolean("member_cgt_1");
            $table->boolean("member_cgt_2");
            $table->boolean("member_cgt_3");
            $table->date("member_target_member");
            $table->date("member_tgl_member");
            $table->date("member_target_sponsor");
            $table->date("member_tgl_sponsor");
            $table->date("member_target_cgl");
            $table->date("member_tgl_cgl");
            $table->date("member_target_coach");
            $table->date("member_tgl_coach");
            $table->date("member_target_tl");
            $table->date("member_tgl_tl");
            $table->text("member_other_remarks");
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
        Schema::dropIfExists('members');
    }
}

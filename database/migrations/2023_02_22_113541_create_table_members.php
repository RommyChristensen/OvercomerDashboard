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
            $table->integer("role_id")->unsigned();
            $table->text("member_fullname");
            $table->text("member_email");
            $table->boolean("member_is_active")->default(true);
            $table->text("member_birth_place")->nullable();
            $table->date("member_birth_date")->nullable();
            $table->text("member_address")->nullable();
            $table->text("member_phone")->nullable();
            $table->text("member_status")->nullable();
            $table->text("member_company")->nullable();
            $table->text("member_campus")->nullable();
            $table->boolean("member_believe_jesus")->default(false);
            $table->boolean("member_water_baptism")->default(false);
            $table->boolean("member_spirit_baptism")->default(false);
            $table->boolean("member_cg_routine")->default(false);
            $table->boolean("member_aog_routine")->default(false);
            $table->boolean("member_msj_1")->default(false);
            $table->boolean("member_msj_2")->default(false);
            $table->boolean("member_msj_3")->default(false);
            $table->boolean("member_cgt_1")->default(false);
            $table->boolean("member_cgt_2")->default(false);
            $table->boolean("member_cgt_3")->default(false);
            $table->date("member_target_member")->nullable();
            $table->date("member_tgl_member")->nullable();
            $table->date("member_target_sponsor")->nullable();
            $table->date("member_tgl_sponsor")->nullable();
            $table->date("member_target_cgl")->nullable();
            $table->date("member_tgl_cgl")->nullable();
            $table->date("member_target_coach")->nullable();
            $table->date("member_tgl_coach")->nullable();
            $table->date("member_target_tl")->nullable();
            $table->date("member_tgl_tl")->nullable();
            $table->text("member_other_remarks")->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('members');
    }
}

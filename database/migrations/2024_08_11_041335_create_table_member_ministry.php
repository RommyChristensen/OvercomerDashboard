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
            $table->integer('member_id')->unsigned();
            $table->integer('ministry_id')->unsigned();
            $table->text('member_ministry_remarks');
            $table->date('member_ministry_date_start');
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
        Schema::dropIfExists('member_ministry');
    }
}

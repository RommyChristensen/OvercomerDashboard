<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableConnectGroupsAddColumnCoachId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('connect_groups', function (Blueprint $table) {
            $table->integer('coach_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('connect_groups', function (Blueprint $table) {
            $table->dropColumn('coach_id');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnsMatches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matches', function (Blueprint $table) {
            //
            $table->renameColumn('team_id', 'team1_id');
            $table->dropColumn('team2_id');
            $table->dropColumn('team2_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matches', function (Blueprint $table) {
            //
            $table->renameColumn('team1_id', 'team_id');
            $table->integer('team2_id')->nullable();
            $table->string('team2_name')->nullable();

        });
    }
}

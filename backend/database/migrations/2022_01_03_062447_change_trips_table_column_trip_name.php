<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTripsTableColumnTripName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // カラム名を変更する
        Schema::table('trips', function (Blueprint $table) {
            $table->renameColumn('spot', 'trip_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // カラム名を元に戻す
        Schema::table('trips', function (Blueprint $table) {
            $table->renameColumn('trip_name', 'spot');
        });
    }
}

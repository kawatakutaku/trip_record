<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('table');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('trips', function(Blueprint $table) {
            $table->id();
            $table->string('trip_name', 20);
            $table->timestamp('start_day');
            $table->timestamp('end_day');
            $table->timestamps();
            $table->foreignId('user_id');
        });
    }
}

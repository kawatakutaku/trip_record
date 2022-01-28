<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHitchhikeMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // TODO: messageテーブルを作成する
        Schema::create('hitchhike_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id');
            $table->foreignId('hitchhiker_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hitchhike_messages');
    }
}

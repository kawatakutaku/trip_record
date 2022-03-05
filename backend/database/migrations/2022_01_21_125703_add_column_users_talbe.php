<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnUsersTalbe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
            $table->string('profile');
            $table->string('img');
            $table->string('gender');
            $table->string('password_reset_token')->nullable();
            $table->string('register_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropColumn('profile');
            $table->dropColumn('img');
            $table->dropColumn('gender');
            $table->dropColumn('password_reset_token');
            $table->dropColumn('register_token');
        });
    }
}

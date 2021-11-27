<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblLoginUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_loginUser', function (Blueprint $table) {
            $table-> increments('user_id');
            $table-> string('user_fullname', 50);
            $table-> string('user_password', 30);
            $table-> string('user_email', 50);
            $table-> string('user_phone', 15);
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
        Schema::dropIfExists('tbl_loginUser');
    }
}

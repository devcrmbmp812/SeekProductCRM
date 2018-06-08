<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('headline');
            $table->string('overview');
            $table->string('profile_image');
            $table->string('cover_image');
            $table->string('company');
            $table->integer('role');
            $table->string('start_date');
            $table->string('end_date');
            $table->integer('industry');
            $table->string('phone');
            $table->integer('phone_type');
            $table->string('address');
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
        Schema::dropIfExists('profiles');
    }
}

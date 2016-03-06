<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('book', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->integer('user_id');
            $table->integer('booked_user_id');
            $table->string('description');
            $table->boolean('is_booked');
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
        //
    }
}

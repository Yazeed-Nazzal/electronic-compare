<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->integer('item_id')->unsigned();
            $table->string('ram');
            $table->string('front_cam');
            $table->string('rear_cam');
            $table->string('storage');
            $table->string('battery');
            $table->string('screen');
            $table->timestamps();

            $table->foreign('item_id')->references('id')
                ->on('items')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phone');
    }
}

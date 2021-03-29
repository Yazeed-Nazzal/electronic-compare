<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhatchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whatch', function (Blueprint $table) {
            $table->id();
            $table->integer('item_id')->unsigned();
            $table->string('battery');
            $table->boolean('waterproof');
            $table->boolean('calling');
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
        Schema::dropIfExists('whatch');
    }
}

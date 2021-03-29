<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadphoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headphone', function (Blueprint $table) {
            $table->id();
            $table->integer('item_id')->unsigned();
            $table->enum('type',['Bluetooth','Wire']);
            $table->string('battery');
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
        Schema::dropIfExists('headphone');
    }
}

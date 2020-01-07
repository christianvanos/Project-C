<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_history', function (Blueprint $table) {
            $table->increments('id');
            $table->string('story_points');
            $table->integer('sprint_id')->unsigned();
            $table->timestamps(); 
            $table->foreign('sprint_id')->references('id')->on('sprints')
            ->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_history');
    }
}

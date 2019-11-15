<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserstoryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userstory_items', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->string('moscow');
            $table->text('definition_of_done');
            $table->integer('story_points');
            $table->integer('backlog_id')->unsigned();
            $table->timestamps();
            $table->foreign('backlog_id')->references('id')->on('backlogs')
            ->onDelete('cascade');            
            $table->integer('userstory_id')->unsigned();
            $table->foreign('userstory_id')->references('id')->on('userstories')
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
        Schema::dropIfExists('userstory_items');
    }
}

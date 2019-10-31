<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserstoryItemTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userstory_item_tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('description');
            $table->string('status');
            $table->integer('member_id')->unsigned();
            $table->timestamps();
            $table->foreign('member_id')->references('id')->on('project_members')
            ->onDelete('cascade');
            $table->integer('userstory_item_id')->unsigned();
            $table->foreign('userstory_item_id')->references('id')->on('userstory_items')
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
        Schema::dropIfExists('userstory_item_tasks');
    }
}

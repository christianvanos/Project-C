<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSprintMeetingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprint_meeting', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->text('description');
            $table->integer('sprints_id')->unsigned();
            $table->timestamps();
            $table->foreign('sprints_id')->references('id')->on('sprints')
            ->onDelete('cascade');
            $table->integer('present_id')->unsigned();
            $table->foreign('present_id')->references('id')->on('sprint_meeting_present')
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
        Schema::dropIfExists('sprint_meeting');
    }
}

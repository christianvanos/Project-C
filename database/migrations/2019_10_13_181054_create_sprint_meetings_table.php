<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSprintMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprint_meetings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->text('description');
            $table->integer('sprint_id')->unsigned();
            $table->timestamps();
            $table->foreign('sprint_id')->references('id')->on('sprints')
            ->onDelete('cascade');
            $table->integer('present_id')->unsigned();
            $table->foreign('present_id')->references('id')->on('sprint_meeting_presents')
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
        Schema::dropIfExists('sprint_meetings');
    }
}

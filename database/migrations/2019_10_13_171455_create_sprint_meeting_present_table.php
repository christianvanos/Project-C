<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSprintMeetingPresentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprint_meeting_present', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('members_id')->unsigned();
            $table->foreign('members_id')->references('id')->on('project_members')
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
        Schema::dropIfExists('sprint_meeting_present');
    }
}

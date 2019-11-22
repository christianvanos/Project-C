<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSprintMeetingPresentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprint_meeting_presents', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('member_id')->unsigned();
            $table->foreign('member_id')->references('id')->on('project_members')
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
        Schema::dropIfExists('sprint_meeting_presents');
    }
}

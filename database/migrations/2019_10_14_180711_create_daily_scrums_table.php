<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;

class CreateDailyScrumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_scrums', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('is_doing');
            $table->string('has_done');
            $table->string('errors');
            $table->integer('sprint_id')->unsigned();
            $table->integer('member_id')->unsigned();
            $table->timestamps();
            $table->foreign('sprint_id')->references('id')->on('sprints')
            ->onDelete('cascade');
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
        Schema::dropIfExists('daily_scrums');
    }
}

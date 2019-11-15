<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserstoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userstories', function (Blueprint $table) {
            $table->increments('id');
            $table->text('acceptance_criteria');
            $table->string('description');
            $table->integer('projects_id')->unsigned();
            $table->timestamps();
            $table->foreign('projects_id')->references('id')->on('projects')
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
        Schema::dropIfExists('userstories');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSprintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprints', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number');
            // Defines the foreign key, unsigned means that there are no negative numbers
            $table->integer('projects_id')->unsigned();
            $table->timestamps();
            // Makes the link from the Sprints table to the Projects table
            // onDelete cascade means that if you delete sprint, the relation will be deleted automatically
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
        Schema::dropIfExists('sprints');
    }
}

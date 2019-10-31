<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectMembersRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_members_roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role');
            $table->integer('member_id')->unsigned();
            $table->timestamps();
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
        Schema::dropIfExists('project_members_roles');
    }
}

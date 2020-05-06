<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('teacherName');
            $table->string('courseName');
            $table->string('courseDuration');
            $table->string('coursePlan');
            $table->string('courseResult');
            $table->string('courseStart');
            $table->string('courseSpeciality');
            $table->string('groupNumber');
            $table->string('studentNumber');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}

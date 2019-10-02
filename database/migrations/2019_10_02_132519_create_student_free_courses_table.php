<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentFreeCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_free_courses', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->integer('student_id')->nullable();
          $table->integer('free_course_id')->nullable();
          $table->boolean('has_certificate')->nullable()->default(0);
          $table->timestamps();
          $table->softDeletes();
          $table->charset = 'utf8';
          $table->collation = 'utf8_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studen_free_courses');
    }
}

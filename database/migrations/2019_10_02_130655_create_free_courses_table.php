<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreeCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('free_courses', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('title')->nullable();
          $table->text('description')->nullable();
          $table->string('image')->nullable();
          $table->integer('master_id')->nullable();
          $table->date('time')->nullable();
          $table->string('hour')->nullable();
          $table->integer('capacity')->nullable();
          $table->integer('price')->nullable()->default(0);
          $table->date('deadline')->nullable();
          $table->integer('duration')->nullable();
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
        Schema::dropIfExists('free_courses');
    }
}

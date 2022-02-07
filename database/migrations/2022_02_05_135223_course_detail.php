<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CourseDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_highlight_id');
            $table->unsignedBigInteger('course_type_id');
            $table->string('title');
            $table->longText('content');
            $table->timestamps();
            $table->foreign('course_highlight_id')
                ->references('id')
                ->on('course_highlights')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreign('course_type_id')
                ->references('id')
                ->on('course_types')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_details');
    }
}

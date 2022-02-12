<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBundleDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bundle_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bundle_id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('exam_id');
            $table->timestamps();

            $table->foreign('bundle_id')
                ->references('id')
                ->on('bundles')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign('exam_id')
                ->references('id')
                ->on('exams')
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
        Schema::dropIfExists('bundle_details');
    }
}

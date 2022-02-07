<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_id');
            $table->unsignedBigInteger('exam_id');
            $table->unsignedBigInteger('course_id');
            $table->timestamps();
            $table->foreign('exam_id')
                ->references('id')
                ->on('exams')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreign('sale_id')
                ->references('id')
                ->on('sales')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreign('course_id')
                ->references('id')
                ->on('courses')
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
        Schema::dropIfExists('sale_details');
    }
}

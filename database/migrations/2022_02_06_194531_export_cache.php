<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExportCache extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('export_caches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exam_step_id');
            $table->integer('status');
            $table->timestamps();
            $table->foreign('exam_step_id')
                ->references('id')
                ->on('exam_steps')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

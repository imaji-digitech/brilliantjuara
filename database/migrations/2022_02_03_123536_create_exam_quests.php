<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamQuests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_quests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exam_step_id');
            $table->longText('equation')->nullable();
            $table->longText('question')->nullable();
            $table->longText('discussion')->nullable();
            $table->integer('answer')->nullable();

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
        Schema::dropIfExists('exam_quests');
    }
}

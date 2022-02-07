<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exam_user_id');
            $table->unsignedBigInteger('exam_quest_id');
            $table->integer('answer');
            $table->timestamps();
            $table->foreign('exam_quest_id')
                ->references('id')
                ->on('exam_quests')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreign('exam_user_id')
                ->references('id')
                ->on('exam_users')
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
        Schema::dropIfExists('exam_answers');
    }
}

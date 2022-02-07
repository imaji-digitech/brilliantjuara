<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamQuestChoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_quest_choices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exam_quest_id');
            $table->longText('answer')->nullable();
            $table->longText('equation')->nullable();
            $table->integer('score')->nullable();
            $table->integer('choice')->nullable();

            $table->timestamps();
            $table->foreign('exam_quest_id')
                ->references('id')
                ->on('exam_quests')
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
        Schema::dropIfExists('exam_quest_choices');
    }
}

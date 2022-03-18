<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRankingSekdins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ranking_sekdins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exam_user_id');
            $table->integer('point_twk');
            $table->integer('point_tiu');
            $table->integer('point_tkp');
            $table->timestamps();

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
        Schema::dropIfExists('ranking_sekdins');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBundles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bundles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('thumbnail')->nullable();
            $table->longText('content')->nullable();
            $table->integer('referral_can_use');
            $table->unsignedBigInteger('room_id');
            $table->timestamps();
            $table->foreign('room_id')
                ->on('rooms')
                ->references('id')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bundles');
    }
}

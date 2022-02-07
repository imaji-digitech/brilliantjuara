<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountCanUses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referral_can_uses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('base_referral_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('base_referral_id')
                ->references('id')
                ->on('base_referrals')
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
        Schema::dropIfExists('referral_can_uses');
    }
}

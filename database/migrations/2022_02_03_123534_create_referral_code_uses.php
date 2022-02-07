<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralCodeUses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referral_code_uses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('referral_code_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('referral_code_id')
                ->references('id')
                ->on('referral_codes')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('referral_code_uses');
    }
}

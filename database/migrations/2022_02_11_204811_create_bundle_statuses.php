<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBundleStatuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bundle_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });
        Schema::table('bundles', function (Blueprint $table) {
            $table->unsignedBigInteger('bundle_status_id');
            $table->foreign('bundle_status_id')
                ->references('id')
                ->on('bundle_statuses')
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
        Schema::dropIfExists('bundle_statuses');
    }
}

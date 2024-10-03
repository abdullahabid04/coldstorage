<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('rollouts', function (Blueprint $table) {
            // Add the fields to the rollouts table
            $table->unsignedBigInteger('rollback_version_id')->nullable();
            $table->boolean('staged_rollout')->default(false);
            $table->decimal('rollout_percentage', 5, 2)->default(100);

            // Add the foreign key for rollback_version_id
            $table->foreign('rollback_version_id')->references('id')->on('firmware_updates')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rollouts', function (Blueprint $table) {
            // Drop the fields and foreign key
            $table->dropForeign(['rollback_version_id']);
            $table->dropColumn(['rollback_version_id', 'staged_rollout', 'rollout_percentage']);
        });
    }
};

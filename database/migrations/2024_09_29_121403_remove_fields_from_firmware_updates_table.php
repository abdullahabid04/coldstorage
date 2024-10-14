<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('firmware_updates', function (Blueprint $table) {
            $table->dropForeign(['rollback_version_id']);
            // Remove the fields from the firmware_updates table
            $table->dropColumn(['rollback_version_id', 'staged_rollout', 'rollout_percentage']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('firmware_updates', function (Blueprint $table) {
            // Add the fields back in case of rollback
            $table->unsignedBigInteger('rollback_version_id')->nullable();
            $table->boolean('staged_rollout')->default(false);
            $table->decimal('rollout_percentage', 5, 2)->default(100);
        });
    }
};

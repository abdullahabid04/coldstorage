<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scheduled_updates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('device_group_id')->nullable();
            $table->unsignedBigInteger('device_id')->nullable();
            $table->unsignedBigInteger('firmware_update_id');
            $table->string('status')->default('pending'); // pending, in_progress, completed, failed
            $table->timestamp('scheduled_at');
            $table->timestamps();

            // Foreign keys
            $table->foreign('device_group_id')->references('id')->on('device_groups')->onDelete('cascade');
            $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade');
            $table->foreign('firmware_update_id')->references('id')->on('firmware_updates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scheduled_updates');
    }
};

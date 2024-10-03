<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('firmware_updates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('firmware_id'); // Link to the firmware
            $table->json('compatible_models')->nullable();
            $table->string('min_version')->nullable();
            $table->string('max_version')->nullable();
            $table->enum('status', ['active', 'previous', 'rolled_back'])->default('active');
            $table->unsignedBigInteger('rollback_version_id')->nullable();
            $table->boolean('staged_rollout')->default(false);
            $table->unsignedInteger('rollout_percentage')->default(100);
            $table->timestamps();

            $table->foreign('firmware_id')->references('id')->on('firmwares')->onDelete('cascade'); // Link to firmware
            $table->foreign('rollback_version_id')->references('id')->on('firmware_updates')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('firmware_updates');
    }
};

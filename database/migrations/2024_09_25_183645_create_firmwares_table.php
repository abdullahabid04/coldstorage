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
        Schema::create('firmwares', function (Blueprint $table) {
            $table->id();
            $table->string('version')->unique(); // Unique version identifier
            $table->string('file_path'); // File path for the firmware
            $table->string('checksum')->nullable(); // Checksum for validation
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('firmwares');
    }
};

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
        Schema::table('firmware_updates', function (Blueprint $table) {
            //
            $table->enum('status', ['active', 'previous', 'rolled_back', 'inactive'])->default('active')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('firmware_updates', function (Blueprint $table) {
            //
            $table->enum('status', ['active', 'previous', 'rolled_back'])->default('active')->change();
        });
    }
};

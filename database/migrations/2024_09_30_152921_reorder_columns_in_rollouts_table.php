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
        Schema::table('rollouts', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('rollback_version_id')->nullable()->after('status')->change();
            $table->boolean('staged_rollout')->default(true)->after('rollback_version_id')->change();
            $table->decimal('rollout_percentage', 5, 2)->default(100)->after('staged_rollout')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rollouts', function (Blueprint $table) {
            //
        });
    }
};

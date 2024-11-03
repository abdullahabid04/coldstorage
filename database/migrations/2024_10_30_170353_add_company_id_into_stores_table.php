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
        //
        Schema::table('stores', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id')->after('email')->nullable(); // Add company_id column
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade'); // Add foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('stores', function (Blueprint $table) {
            $table->dropForeign(['company_id']); // Drop the foreign key constraint
            $table->dropColumn('company_id'); // Drop the column
        });
    }
};

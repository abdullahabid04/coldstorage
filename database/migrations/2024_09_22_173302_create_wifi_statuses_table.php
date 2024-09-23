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
        Schema::create('wifi_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('device_id');
            $table->string('wifi_name');
            $table->string('wifi_status'); // Connected or Disconnected
            $table->string('password')->nullable(); // Wi-Fi password
            $table->string('setting_state'); // Setting state of Wi-Fi
            $table->string('getting_state'); // Getting state of Wi-Fi
            $table->timestamps();

            // Foreign key relation
            $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wifi_statuses');
    }
};

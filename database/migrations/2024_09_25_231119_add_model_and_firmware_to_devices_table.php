<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('devices', function (Blueprint $table) {
            $table->string('model')->nullable()->after('description');
            $table->string('firmware_version')->nullable()->after('model');
        });
    }

    public function down()
    {
        Schema::table('devices', function (Blueprint $table) {
            $table->dropColumn(['model', 'firmware_version']);
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('enable_auto_expiry')->default(false);
            $table->integer('expiry_duration')->default(30);
            $table->integer('expiry_notification')->default(7);
            $table->json('enabled_menus')->nullable();
            $table->integer('max_ram')->default(4096);
            $table->integer('max_disk')->default(10240);
            $table->integer('max_cpu')->default(100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
}; 
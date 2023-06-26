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
        Schema::table('posts', function (Blueprint $table) {
            $table->string('preview_image')->nullable();              //обовʼязково ставлю атрибут нулабельності, так як записую рядки в існуючу таблицю, де попередні пости не матимуть дані атрибути
            $table->string('main_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {           //видаляю спочатку одну потім іншу, так як дві оразу воно не зможе
            $table->dropColumn('preview_image');
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('main_image');
        });
    }
};

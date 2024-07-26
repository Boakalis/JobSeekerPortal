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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable();
            $table->integer('exp')->nullable();
            $table->integer('location_id')->nullable();
            $table->integer('notice_period')->nullable();
            $table->string('skills')->nullable();
            $table->string('photo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('exp');
            $table->dropColumn('location_id');
            $table->dropColumn('notice_period');
            $table->dropColumn('skills');
            $table->dropColumn('photo');
        });
    }
};

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
        Schema::create('dashboard_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user');
            $table->unsignedBigInteger('dashboard');

            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('dashboard')->references('id')->on('dashboards')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard_user');
    }
};

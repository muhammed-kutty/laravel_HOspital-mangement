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
        Schema::create('docters', function (Blueprint $table) {
            $table->id();
            $table->string('doct_name',100)->nullable();
            $table->string('phone',15)->nullable();
            $table->string('speciality',100)->nullable();
            $table->string('room',25)->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docters');
    }
};

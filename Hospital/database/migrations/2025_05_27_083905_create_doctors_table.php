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
        Schema::create('doctors', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('specialization');
        $table->string('email')->unique();
        $table->string('phone');
        $table->string('contact');
        $table->string('city');
        $table->string('district');
        $table->string('image'); // To store the image path
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};

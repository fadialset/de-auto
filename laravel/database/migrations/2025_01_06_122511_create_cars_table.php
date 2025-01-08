<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('car', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('make');
            $table->string('model');
            $table->string('year');  // Changed from integer to string to allow more flexibility
            $table->string('color')->nullable();
            $table->string('body_type')->nullable();
            $table->string('transmission')->nullable();
            $table->integer('mileage')->nullable();
            $table->string('fuel_type')->nullable();
            $table->decimal('engine_size', 3, 1)->nullable();  // Assuming engine size might have one decimal place
            $table->integer('horsepower')->nullable();
            $table->year('registration_year')->nullable();
            $table->string('condition')->nullable();  // e.g., new, used, refurbished
            $table->decimal('price', 10, 2)->nullable();  // Price can have two decimal places
            $table->string('vin')->unique()->nullable();  // Vehicle Identification Number, unique
            $table->string('status')->nullable();  // e.g., available, sold, pending
            $table->string('image')->nullable();  // Path to the image file
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car');
    }
};

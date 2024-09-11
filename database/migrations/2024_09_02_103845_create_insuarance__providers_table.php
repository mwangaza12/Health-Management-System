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
        Schema::create('insuarance__providers', function (Blueprint $table) {
            $table->id('id'); // Primary key
            $table->string('name', 100);
            $table->string('contact_number', 15)->nullable();
            $table->string('email', 100)->nullable();
            $table->text('address')->nullable();
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insuarance__providers');
    }
};

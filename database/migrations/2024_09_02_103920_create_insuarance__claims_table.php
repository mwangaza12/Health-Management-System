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
        Schema::create('insuarance__claims', function (Blueprint $table) {
            $table->id('id'); // Primary key
            $table->foreignId('ipatient_d')->constrained('patients')->onDelete('cascade');
            $table->foreignId('insurance_provider_id')->constrained('insurance_providers')->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insuarance__claims');
    }
};

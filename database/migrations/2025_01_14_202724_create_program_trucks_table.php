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
        Schema::create('program_trucks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained('programs')->onDelete('cascade');
            $table->foreignId('truck_id')->constrained('trucks')->onDelete('cascade');
            $table->decimal('liters', 15, 2);
            $table->enum('status', ['pending', 'moving', 'delivered'])->default('pending');
            $table->decimal('liters_lifted', 15, 2)->nullable();
            $table->string('meter_ticket_number')->nullable();
            $table->string('waybill_number')->nullable();

            // Customer details
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            // $table->string('customer_name')->nullable();
            // $table->string('customer_phone_number')->nullable();
            // $table->text('address')->nullable();
            // $table->string('city')->nullable(); // LGA
            // $table->string('state')->nullable();
            // $table->string('country')->default('Nigeria');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_trucks');
    }
};

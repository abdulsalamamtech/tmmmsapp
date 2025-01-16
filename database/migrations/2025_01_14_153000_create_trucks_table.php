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
        Schema::create('trucks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transporter_id')->constrained('transporters')->onDelete('cascade');
            $table->foreignId('driver_id')->nullable()->constrained('drivers')->onDelete('set null');
            $table->foreignId('added_by')->constrained('users')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('truck_number')->unique();
            $table->decimal('quantity', 10, 2);
            $table->integer('compartment')->default(3);
            $table->decimal('calibrate_one', 10, 2)->nullable();
            $table->decimal('calibrate_two', 10, 2)->nullable();
            $table->decimal('calibrate_three', 10, 2)->nullable();
            $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending');
            $table->enum('movement_status', ['pending', 'assigned'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trucks');
    }
};

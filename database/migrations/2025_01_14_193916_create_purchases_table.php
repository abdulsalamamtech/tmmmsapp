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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('refinery_id')->constrained('refineries')->onDelete('cascade');
            $table->foreignId('marketer_id')->constrained('marketers')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('added_by')->constrained('users')->onDelete('cascade');
            $table->decimal('liters', 15, 2)->default(0);
            $table->decimal('amount', 15, 2)->default(0);

            $table->string('pfi_number')->nullable()->unique();
            $table->text('comment')->nullable();
            $table->enum('status', ['pending', 'approve', 'reject'])->default('pending');
            $table->foreignId('approved_by')->nullable()->constrained('users')->onDelete('set null')->comment('the refinery user id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};

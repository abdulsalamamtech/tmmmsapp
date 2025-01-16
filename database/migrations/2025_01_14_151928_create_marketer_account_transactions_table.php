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
        Schema::create('marketer_account_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('refinery_id')->constrained('refineries')->onDelete('cascade');
            $table->foreignId('marketer_id')->constrained('marketers')->onDelete('cascade');
            $table->foreignId('marketer_account_id')->constrained('marketer_accounts')->onDelete('cascade');
            $table->enum('transaction_type', ['credit', 'debit']);
            $table->decimal('amount', 15, 2);
            $table->text('description')->nullable();
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marketer_account_transactions');
    }
};

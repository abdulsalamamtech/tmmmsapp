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
        Schema::create('purchase_payment_proofs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_id')->constrained('purchases')->onDelete('cascade');
            $table->foreignId('marketer_id')->constrained('marketers')->onDelete('cascade');
            $table->foreignId('asset_id')->constrained('assets')->onDelete('cascade');
            $table->string('bank_name');
            $table->string('reference_number');
            $table->decimal('amount', 15, 2);
            $table->enum('currency', ['NGN', 'USD'])->default('NGN');
            $table->enum('payment_status', ['pending', 'verified', 'rejected'])->default('pending');
            $table->text('comment')->nullable();
            $table->foreignId('added_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_payment_proofs');
    }
};

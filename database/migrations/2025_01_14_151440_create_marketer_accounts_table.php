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
        Schema::create('marketer_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('refinery_id')->constrained('refineries')->onDelete('cascade');
            $table->foreignId('marketer_id')->constrained('marketers')->onDelete('cascade');
            $table->enum('accounts_type', ['dprp', 'dogcl'])->default('dprp');
            $table->decimal('amount', 15, 2)->default(0);
            $table->decimal('credit', 15, 2)->default(0);
            $table->decimal('debit', 15, 2)->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marketer_accounts');
    }
};

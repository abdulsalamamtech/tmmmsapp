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
        Schema::create('virtual_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('belongs_to', ['marketer', 'transporter', 'driver']);
            $table->decimal('balance', 15, 2)->default(0);
            $table->string('bank');
            $table->string('account_number')->unique();
            $table->enum('currency', ['USD', 'NGN'])->default('NGN');
            $table->decimal('daily_limit', 15, 2)->nullable();
            $table->decimal('monthly_limit', 15, 2)->nullable();
            $table->string('security_pin', 4)->default('1234');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('virtual_accounts');
    }
};

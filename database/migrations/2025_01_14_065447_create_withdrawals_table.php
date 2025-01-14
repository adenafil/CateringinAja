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
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->string('penarikan_id');
            $table->string('status')->default('pending');
            $table->string('nama');
            $table->string('no_pembayaran');
            $table->decimal('amount', 15, 2)->default(0.00); // Best practice untuk menyimpan nominal Rupiah
            $table->unsignedBigInteger('balance_id');
            $table->timestamps();

            $table->foreign('balance_id')->references('id')->on('balances')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdrawals');
    }
};

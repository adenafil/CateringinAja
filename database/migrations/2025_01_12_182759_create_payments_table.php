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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->text("external_id")->nullable(true);
            $table->string("amount")->nullable(true);
            $table->string("payer_email")->nullable(true);
            $table->string("description")->nullable(true);
            $table->text("checkout_link")->nullable(true);
            $table->string("status")->nullable(true);
            $table->string('payment_method')->nullable(true);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

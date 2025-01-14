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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('picture');
            $table->string('name')->unique();
            $table->decimal('price', 15, 2)->default(0.00); // Best practice untuk menyimpan nominal Rupiah
            $table->string('min_order');
            $table->string('category');
            $table->text('description');
            $table->string('status')->nullable(true)->default('Tidak Tersedia');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('stock_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->restrictOnDelete();
            $table->foreignId('user_id')->constrained()->restrictOnDelete();
            $table->string('type', 20);
            $table->unsignedInteger('quantity');
            $table->text('note')->nullable();
            $table->dateTime('transaction_date');
            $table->timestamps();
            $table->index(['type', 'transaction_date']);
        });
    }

    public function down(): void { Schema::dropIfExists('stock_transactions'); }
};

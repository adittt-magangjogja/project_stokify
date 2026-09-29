<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $t) {
            if (!Schema::hasColumn('users', 'role')) $t->string('role')->default('staff');
            if (!Schema::hasColumn('users', 'is_active')) $t->boolean('is_active')->default(true);
        });

        Schema::table('products', function (Blueprint $t) {
            if (!Schema::hasColumn('products', 'min_stock')) $t->unsignedInteger('min_stock')->default(5);
            if (!Schema::hasColumn('products', 'image')) $t->string('image')->nullable();
        });

        Schema::table('stock_transactions', function (Blueprint $t) {
            if (!Schema::hasColumn('stock_transactions', 'status')) $t->string('status')->default('pending');
            if (!Schema::hasColumn('stock_transactions', 'confirmed_by')) $t->foreignId('confirmed_by')->nullable()->constrained('users');
            if (!Schema::hasColumn('stock_transactions', 'confirmed_at')) $t->timestamp('confirmed_at')->nullable();
        });
    }

    public function down(): void
    {
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('stock', 12, 3)->default(0)->change();
            $table->decimal('minimum_stock', 12, 3)->default(0)->change();
        });

        Schema::table('stock_transactions', function (Blueprint $table) {
            $table->decimal('quantity', 12, 3)->change();
        });

        Schema::table('stock_opnames', function (Blueprint $table) {
            $table->decimal('system_stock', 12, 3)->default(0)->change();
            $table->decimal('physical_stock', 12, 3)->default(0)->change();
            $table->decimal('difference', 13, 3)->change();
        });

        if (Schema::hasColumn('stock_opnames', 'actual_stock')) {
            Schema::table('stock_opnames', function (Blueprint $table) {
                $table->decimal('actual_stock', 12, 3)->default(0)->change();
            });
        }
    }

    public function down(): void
    {
        Schema::table('stock_opnames', function (Blueprint $table) {
            $table->integer('difference')->change();
            $table->unsignedInteger('physical_stock')->default(0)->change();
            $table->unsignedInteger('system_stock')->default(0)->change();
        });

        Schema::table('stock_transactions', function (Blueprint $table) {
            $table->unsignedInteger('quantity')->change();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->unsignedInteger('minimum_stock')->default(0)->change();
            $table->unsignedInteger('stock')->default(0)->change();
        });
    }
};

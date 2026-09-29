<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('product_attributes')) {
            Schema::create('product_attributes', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->timestamps();
            });
        }
        if (!Schema::hasTable('product_attribute_values')) {
            Schema::create('product_attribute_values', function (Blueprint $table) {
                $table->id();
                $table->foreignId('product_id')->constrained()->cascadeOnDelete();
                $table->foreignId('product_attribute_id')->constrained()->cascadeOnDelete();
                $table->string('value');
                $table->timestamps();
                $table->unique(['product_id', 'product_attribute_id']);
            });
        }
        if (Schema::hasTable('stock_transactions') && !Schema::hasColumn('stock_transactions', 'supplier_id')) {
            Schema::table('stock_transactions', fn (Blueprint $table) => $table->foreignId('supplier_id')->nullable()->constrained()->nullOnDelete());
        }
        if (Schema::hasTable('stock_opnames')) {
            if (!Schema::hasColumn('stock_opnames', 'physical_stock')) {
                Schema::table('stock_opnames', fn (Blueprint $table) => $table->unsignedInteger('physical_stock')->default(0));
                if (Schema::hasColumn('stock_opnames', 'actual_stock')) {
                    DB::table('stock_opnames')->update(['physical_stock' => DB::raw('actual_stock')]);
                }
            }
            if (!Schema::hasColumn('stock_opnames', 'opname_date')) {
                Schema::table('stock_opnames', fn (Blueprint $table) => $table->date('opname_date')->nullable());
                DB::table('stock_opnames')->whereNull('opname_date')->update(['opname_date' => now()->toDateString()]);
            }
            if (!Schema::hasColumn('stock_opnames', 'note')) {
                Schema::table('stock_opnames', fn (Blueprint $table) => $table->text('note')->nullable());
            }
        }
    }

    public function down(): void
    {
        // Keep repaired columns in place; this migration also supports existing installs.
    }
};

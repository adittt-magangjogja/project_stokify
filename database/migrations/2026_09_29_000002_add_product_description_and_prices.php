<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'description')) $table->text('description')->nullable();
            if (!Schema::hasColumn('products', 'purchase_price')) $table->decimal('purchase_price', 15, 2)->default(0);
            if (!Schema::hasColumn('products', 'selling_price')) $table->decimal('selling_price', 15, 2)->default(0);
        });

        DB::table('products')->where('selling_price', 0)->update(['selling_price' => DB::raw('price')]);
    }

    public function down(): void
    {
        // Keep catalog values to avoid losing data when rolling back feature code.
    }
};

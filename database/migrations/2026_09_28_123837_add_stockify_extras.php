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
        if (Schema::hasColumn('stock_transactions', 'confirmed_by')) {
            Schema::table('stock_transactions', fn (Blueprint $t) => $t->dropConstrainedForeignId('confirmed_by'));
        }
        Schema::table('stock_transactions', function (Blueprint $t) {
            foreach (['confirmed_at', 'status'] as $column) {
                if (Schema::hasColumn('stock_transactions', $column)) $t->dropColumn($column);
            }
        });
        if (Schema::hasColumn('products', 'image')) Schema::table('products', fn (Blueprint $t) => $t->dropColumn('image'));
        if (Schema::hasColumn('users', 'is_active')) Schema::table('users', fn (Blueprint $t) => $t->dropColumn('is_active'));
    }
};

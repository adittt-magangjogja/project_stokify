<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('category_product_attribute', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_attribute_id')->constrained()->cascadeOnDelete();
            $table->primary(['category_id', 'product_attribute_id']);
        });

        // Keep existing attributes available until an admin assigns their intended categories.
        $categoryIds = DB::table('categories')->pluck('id');
        $attributeIds = DB::table('product_attributes')->pluck('id');
        $rows = [];
        foreach ($categoryIds as $categoryId) {
            foreach ($attributeIds as $attributeId) {
                $rows[] = ['category_id' => $categoryId, 'product_attribute_id' => $attributeId];
            }
        }
        foreach (array_chunk($rows, 500) as $chunk) {
            DB::table('category_product_attribute')->insert($chunk);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('category_product_attribute');
    }
};

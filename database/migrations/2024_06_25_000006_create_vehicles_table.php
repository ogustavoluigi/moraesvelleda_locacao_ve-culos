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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->char("plate", 7)->unique();
            $table->string("model");
            $table->string("brand");
            $table->string("description");
            $table->string("photo")->nullable();
            $table->decimal('rental_cost', 10, 2);
            $table->foreignId('category_id')->constrained(table: 'vehicle_categories')->onDelete('cascade');
            $table->year("year");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};

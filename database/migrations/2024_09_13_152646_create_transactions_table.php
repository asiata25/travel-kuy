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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id');
            $table->foreignUuid('user_id')->constrained()->cascadeOnDelete();
            $table->foreignUuid('holiday_packages_id')->constrained()->cascadeOnDelete();
            $table->foreignUuid('package_variants_id')->constrained()->cascadeOnDelete();
            $table->integer('total_price');
            $table->enum('status', ['pending', 'precessing', 'completed', 'declined']);
            $table->string('payment_method');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

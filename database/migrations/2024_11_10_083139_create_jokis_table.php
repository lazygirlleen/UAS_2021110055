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
        Schema::create('jokis', function (Blueprint $table) {
            $table->id();
            $table->string('account_id');
            $table->string('joki_type');
            $table->integer('payment_method');
            $table->timestamp('transaction_date');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jokis');
    }
};

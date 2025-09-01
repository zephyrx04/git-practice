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
        Schema::create('legal_documents', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('party')->nullable();
            $table->date('effectivity_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('status')->default('active');
            $table->string('storage_path');
            $table->timestamps();
            $table->index('expiry_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legal_documents');
    }
};

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
        Schema::create('konsumen_meminjams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('konsumen_id')->constrained('konsumens');
            $table->foreignId('kendaraan_id')->constrained('kendaraans');
            $table->foreignId('data_pinjaman_id')->constrained('data_pinjamen');
            $table->foreignId('status_id')->constrained('statuses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsumen_meminjams');
    }
};

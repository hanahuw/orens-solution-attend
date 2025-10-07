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
    Schema::create('latihan', function (Blueprint $table) {
        $table->string('id')->primary();
        $table->string('judul');
        $table->text('deskripsi')->nullable();
        $table->timestamp('tanggal')->nullable();
        $table->string('divisi');
        $table->string('status')->default('terjadwal');
        $table->string('created_by');
        $table->timestamps();

        $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('latihan');
    }
};

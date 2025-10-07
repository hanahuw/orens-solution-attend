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
    Schema::create('absensi', function (Blueprint $table) {
        $table->string('id')->primary();
        $table->timestamp('tanggal')->nullable();
        $table->string('divisi');
        $table->string('kegiatan');
        $table->char('kode_verifikasi', 6);
        $table->boolean('aktif')->default(true);
        $table->string('created_by');
        $table->string('verified_by')->nullable();
        $table->timestamp('verified_at')->nullable();
        $table->timestamps();

        $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('verified_by')->references('id')->on('users')->onDelete('set null');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};

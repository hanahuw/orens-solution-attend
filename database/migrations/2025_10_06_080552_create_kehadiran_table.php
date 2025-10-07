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
    Schema::create('kehadiran', function (Blueprint $table) {
        $table->string('id')->primary();
        $table->string('absensi_id');
        $table->string('user_id');
        $table->string('status'); // Hadir / Izin / Sakit / Alpha
        $table->timestamp('jam')->nullable();
        $table->char('kode_input', 6)->nullable();
        $table->boolean('valid')->default(false);
        $table->timestamps();

        $table->foreign('absensi_id')->references('id')->on('absensi')->onDelete('cascade');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kehadiran');
    }
};

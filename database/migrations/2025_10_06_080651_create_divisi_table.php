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
    Schema::create('divisi', function (Blueprint $table) {
        $table->string('id')->primary();
        $table->string('nama');
        $table->string('pembina_id')->nullable();
        $table->text('deskripsi')->nullable();
        $table->timestamps();

        $table->foreign('pembina_id')->references('id')->on('users')->onDelete('set null');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('divisi');
    }
};

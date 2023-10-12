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
        Schema::create('m_bed', function (Blueprint $table) {
            $table->id();
            $table->string('namabed');
            $table->string('kelas');
            $table->string('ruangan');
            $table->string('trx_id');
            $table->integer('bedstatus');
            $table->enum('is_active', ['1', '0']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_bed');
    }
};

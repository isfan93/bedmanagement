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
        Schema::create('trx_pasien', function (Blueprint $table) {
            $table->id('trx_id');
            $table->primary('trx_id');
            $table->string('namapasien',160);
            $table->string('norekmed',10);
            $table->date('tgllahir');
            $table->string('alamatpasien',255);
            $table->foreign('dpjp1')->references('id')->on('m_dokter');
            $table->foreign('dpjp2')->references('id')->on('m_dokter');
            $table->foreign('dpjp3')->references('id')->on('m_dokter');
            $table->foreign('dpjp4')->references('id')->on('m_dokter');
            $table->foreign('dpjp5')->references('id')->on('m_dokter');
            $table->foreign('dpjp6')->references('id')->on('m_dokter');
            $table->foreign('ppja')->references('id')->on('m_ppja');
            $table->string('diagnosa');
            $table->foreign('penjamin')->references('id')->on('m_penjamin');
            $table->string('keterangan');
            $table->enum('status',['booking','ranap','batal-booking','rencanapulang','pulang']);
            $table->datetime('tgl_approve');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trx_pasien');
    }
};

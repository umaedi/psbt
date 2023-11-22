<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id');
            $table->string('lampiran1');
            $table->string('lampiran2');
            $table->string('lampiran3');
            $table->string('lampiran4');
            $table->string('lampiran5')->nullable();
            $table->enum('status', array('dalam antrian', 'diproses', 'diterima', 'ditolak'))->default('dalam antrian');
            $table->string('suratizin')->nullable();
            $table->string('pesan')->nullable();
            $table->string('kategori');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permohonans');
    }
};

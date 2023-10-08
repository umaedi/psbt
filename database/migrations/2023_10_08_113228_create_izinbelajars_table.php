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
        Schema::create('izinbelajars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('lampiran1');
            $table->string('lampiran2');
            $table->string('lampiran3');
            $table->string('lampiran4');
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('izinbelajars');
    }
};

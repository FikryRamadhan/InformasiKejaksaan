<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelanggarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggars', function (Blueprint $table) {
            $table->id();
            $table->string('id_kriminal');
            $table->string('nama');
            $table->string('nip');
            $table->string('alamat')->nullable();
            $table->string('masa_tahanan');
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
        Schema::dropIfExists('pelanggars');
    }
}

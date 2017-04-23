<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKecamatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecamatan', function (Blueprint $table) {
            $table->char('id', 7);
            $table->char('kabupaten_kota_id', 4);
            $table->string('name', 255);
            $table->primary('id');
            $table->foreign('kabupaten_kota_id')->references('id')->on('kabupaten_kota')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kecamatan', function (Blueprint $table) {
            $table->dropForeign(['kabupaten_kota_id']);
        });
        Schema::dropIfExists('kecamatan');
    }
}

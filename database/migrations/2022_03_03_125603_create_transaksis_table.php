<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_member');
            $table->unsignedBigInteger('id_outlet');
            $table->date('tgl');
            $table->date('batas_waktu');
            $table->date('tgl_bayar')->nullable();
            $table->enum('status', ['Baru', 'Proses', 'Selesai', 'Diambil']);
            $table->enum('pembayaran', ['Dibayar', 'Belum Dibayar']);
            $table->unsignedBigInteger('id_user');

            $table->foreign('id_member')->references('id')->on('member');
            $table->foreign('id_outlet')->references('id')->on('outlet');
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('transaksi');
    }
}

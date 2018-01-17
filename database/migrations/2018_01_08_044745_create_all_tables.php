<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_account', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password');
            $table->integer('hak_akses_id')->unsigned();
            $table->boolean('status');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('hak_akses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('slug')->unique();
            $table->string('deskripsi');
            $table->timestamps();
        });

        Schema::create('users_profil', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik')->unique();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
            $table->enum('agama', ['Islam', 'Katolik', 'Protestan', 'Hindu', 'Buddha'])->nullable();
            $table->text('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('photo')->nullable();
            $table->integer('kantor_cabang_id')->unsigned();
            $table->timestamps();
        });

        Schema::create('kantor_cabang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('alamat');
            $table->string('telepon');
            $table->timestamps();
        });

        Schema::create('angkatan_diklat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_diklat');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('keterangan');
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
        Schema::dropIfExists('users_account');
        Schema::dropIfExists('users_profil');
        Schema::dropIfExists('hak_akses');
        Schema::dropIfExists('kantor_cabang');
        Schema::dropIfExists('angkatan_diklat');
    }
}

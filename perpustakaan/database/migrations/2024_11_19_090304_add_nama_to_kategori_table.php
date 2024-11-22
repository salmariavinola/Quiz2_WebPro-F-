<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('kategori', function (Blueprint $table) {
        $table->string('nama');  // Menambahkan kolom 'nama'
    });
}

public function down()
{
    Schema::table('kategori', function (Blueprint $table) {
        $table->dropColumn('nama');  // Menghapus kolom 'nama' saat rollback
    });
}
};

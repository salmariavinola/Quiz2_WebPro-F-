<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('peminjamen', function (Blueprint $table) {
        $table->timestamp('tanggal_pinjam')->default(DB::raw('CURRENT_TIMESTAMP'))->change();
    });
}

public function down()
{
    Schema::table('peminjamen', function (Blueprint $table) {
        $table->timestamp('tanggal_pinjam')->nullable()->change();
    });
}
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odp_master', function (Blueprint $table) {
            $table->string('kode_odp')->primary();
            $table->string('name', 150);
            $table->string('provinsi', 100);
            $table->string('kabupaten', 100);
            $table->string('kecamatan', 100);
            $table->string('desa', 100);
            $table->text('alamat');
            $table->string('maps', 255);
            $table->text('description')->nullable();
            $table->integer('id_users_add')->nullable();
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
        Schema::dropIfExists('odp_master');
    }
};

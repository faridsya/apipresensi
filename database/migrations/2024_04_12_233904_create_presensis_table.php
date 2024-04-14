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
        Schema::create('presensis', function (Blueprint $table) {
            $table->id();
			$table->string('nik',length: 20);
			$table->date('tanggal');
			$table->time('jam', precision: 0);
			$table->string('latitude',length: 30);
			$table->string('longitude',length: 30);
			$table->enum('jenis',['m','p'])->default('m');
			$table->tinyInteger('jarak')->nullable(false)->default(0);
            $table->timestamps();
			$table->unique(['tanggal', 'nik','jenis']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensis');
    }
};

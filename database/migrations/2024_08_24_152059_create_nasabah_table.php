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
        Schema::create('nasabah', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            
            // Master Pekerjaan
            $table->foreignId('id_pekerjaan')
                ->constrained('master_pekerjaan')
                ->onDelete('cascade');

            // Kantor Cabang
            $table->foreignId('id_kc')
                ->constrained('kantor_cabang')
                ->onDelete('cascade');

            // Alamat
            $table->string('provinsi');
            $table->string('kota');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('nama_jalan');
            $table->string('rt');
            $table->string('rw');

            // User (CS yang menginput)
            $table->foreignId('id_user')
                ->constrained('users')
                ->onDelete('cascade');

            $table->enum('status', ['Menunggu Approval', 'Disetujui'])->default('Menunggu Approval');
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();


            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nasabah');
    }
};

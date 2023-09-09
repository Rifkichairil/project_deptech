<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 150);
            $table->string('last_name', 150);
            $table->string('email');
            $table->string('phone', 25)->nullable();
            $table->string('address', 255)->nullable();
            $table->enum('gender', ['LAKI-LAKI', 'PEREMPUAN'])->nullable();
            $table->string('password')->nullable();
            $table->integer('role');
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('accounts')->insert([
            'first_name'   => 'Admin',
            'last_name'    => 'Admin',
            'email'        => 'Admin@deptech.com',
            'role'         => 99,
            'password'     => Hash::make('PasswordAdmin123!!')
        ]);

        DB::table('accounts')->insert([
            'first_name'   => 'Pegawai',
            'last_name'    => 'Pertama',
            'email'        => 'PegawaiPertama@deptech.com',
            'phone'        => '087854659823',
            'address'      => 'Timbang jalan no.13',
            'gender'       => 'LAKI-LAKI',
            'role'         => 1,
        ]);
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};

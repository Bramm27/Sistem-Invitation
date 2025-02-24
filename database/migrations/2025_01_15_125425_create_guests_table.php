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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('number_phone')->nullable();
            $table->string('iduka_prodi')->nullable();
            $table->string('company_name');
            $table->string('respons');
            $table->text('qr_code')->nullable(); 
            $table->string('check_in');
            $table->string('username')->unique();
            $table->string('url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};

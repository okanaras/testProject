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
        Schema::create('Employees', function (Blueprint $table) {
            // migration ile calisanlar icin tablomuzu olusturduk. pdf disinda ID ve Tarih ozelligini de ekledim otomotik artis saglayan ve kayit olundugunda veya guncellendiginde tarihi otomotik tutmak icin. 

            $table->id();
            $table->foreign('comp_id')
                ->references('id')
                ->on('Companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('email')->nullable();
            $table->string('phone');
            $table->unsignedBigInteger('comp_id');
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
        Schema::dropIfExists('Employees');
    }
};
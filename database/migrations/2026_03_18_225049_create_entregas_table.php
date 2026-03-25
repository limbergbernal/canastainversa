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
        Schema::create('entregas', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->integer('ano');
            $table->string('entrega',100);
            $table->string('nombre_completo');
            $table->string('ci', 15);
            $table->enum('estado',['ENTREGADO','RESAGADO','NO ENTREGADO']);
            $table->unsignedBigInteger('beneficiario_id');
            $table->unsignedBigInteger('barrio_id');
            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios');
            $table->foreign('barrio_id')->references('id')->on('barrios');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entregas');
    }
};

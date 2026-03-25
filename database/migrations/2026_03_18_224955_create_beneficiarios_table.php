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
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->string('nombre_completo',255);
            $table->string('ci',15);
            $table->enum('civil',['SOLTERO(A)','CASADO(A)','DIVORCIADO(A)','VIUDO(A)','CONCUBINO(A)','NINGUNO']);
            $table->string('expedido',10);
            $table->enum('sexo',['H','M']);
            $table->date('fecha_nac');
            $table->timestamp('inscripcion');
            $table->string('profesion', 50);
            $table->string('direccion',255);
            $table->string('ocupacion',50);
            $table->string('celular',15);
            $table->string('firma', 5);
            $table->enum('estado',['HABILITADO','BAJA','PENDIENTE','FALLECIDO','ELIMINADO','OBSERVADO']);
            $table->unsignedBigInteger('barrio_id');
            $table->foreign('barrio_id')->references('id')->on('barrios');
            $table->timestamps();
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiarios');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->integer('unidades');
            $table->double('precio');
            $table->string('foto')->nullable();
            $table->foreignId('categoria_id')->constrained('categorias');
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
        Schema::table('productos', function (Blueprint $table) {
            $table->dropForeign('productos_categoria_id_foreign');
        });
        Schema::dropIfExists('productos');
    }
}

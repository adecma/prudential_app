<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKondisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kondisis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->boolean('stadium_a')->default(0);
            $table->boolean('stadium_b')->default(0);
            $table->boolean('stadium_c')->default(0);
            $table->timestamps();
        });

        Schema::create('kondisi_produk', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kondisi_id')->unsigned();
            $table->integer('produk_id')->unsigned();

            $table->foreign('kondisi_id')
                ->references('id')->on('kondisis')
                ->onDelete('cascade');
            $table->foreign('produk_id')
                ->references('id')->on('produks')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kondisi_produk');
        Schema::dropIfExists('kondisis');
    }
}

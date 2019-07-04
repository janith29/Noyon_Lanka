<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveredTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivered', function (Blueprint $table) {
            $table->increments('id');
            $table->string('refkey');
            $table->date('reqdate');
            $table->date('issudate'); 
            $table->boolean('print');
            $table->string('referenceby');
            $table->string('premark');
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
        Schema::dropIfExists('delivered');
    }
}

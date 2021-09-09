<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelcoPrefixsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telco_prefixs', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('prefix', 10)->unique('prefix_2');
            $table->bigInteger('telco_id')->index('telco_id');
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
        Schema::dropIfExists('telco_prefixs');
    }
}

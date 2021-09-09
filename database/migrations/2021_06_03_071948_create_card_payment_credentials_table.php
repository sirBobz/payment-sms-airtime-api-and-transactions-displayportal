<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardPaymentCredentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_payment_credentials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('org_id')->nullable()->index('org_id');
            $table->string('access_key', 255)->default('1');
            $table->string('profile_id', 255)->nullable();
            $table->longText('key_secret');
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
        Schema::dropIfExists('card_payment_credentials');
    }
}

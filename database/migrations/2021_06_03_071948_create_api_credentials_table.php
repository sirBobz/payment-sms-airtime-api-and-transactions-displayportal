<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiCredentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('api_credentials', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('org_id')->index('org_id');
            $table->string('consumer_key')->index('consumer_key');
            $table->string('consumer_secret');
            $table->softDeletes();
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
        Schema::dropIfExists('api_credentials');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAirtimeServiceCredentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('airtime_service_credentials', function (Blueprint $table) {
            $table->foreign('telco_id', 'airtime_service_credentials_ibfk_1')->references('id')->on('telcos')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('service_id', 'airtime_service_credentials_ibfk_2')->references('id')->on('services')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('airtime_service_credentials', function (Blueprint $table) {
            $table->dropForeign('airtime_service_credentials_ibfk_1');
            $table->dropForeign('airtime_service_credentials_ibfk_2');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAirtimeTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('airtime_transactions', function (Blueprint $table) {
            $table->foreign('org_id', 'airtime_transactions_ibfk_1')->references('id')->on('organizations')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('telco_id', 'airtime_transactions_ibfk_2')->references('id')->on('telcos')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('airtime_transactions', function (Blueprint $table) {
            $table->dropForeign('airtime_transactions_ibfk_1');
            $table->dropForeign('airtime_transactions_ibfk_2');
        });
    }
}

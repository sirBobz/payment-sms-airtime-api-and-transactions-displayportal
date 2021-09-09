<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSmsTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sms_transactions', function (Blueprint $table) {
            $table->foreign('org_id', 'sms_transactions_ibfk_3')->references('id')->on('organizations')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('telco_id', 'sms_transactions_ibfk_4')->references('id')->on('telcos')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sms_transactions', function (Blueprint $table) {
            $table->dropForeign('sms_transactions_ibfk_3');
            $table->dropForeign('sms_transactions_ibfk_4');
        });
    }
}

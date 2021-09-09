<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMpesaB2cTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mpesa_b2c_transactions', function (Blueprint $table) {
            $table->foreign('org_id', 'mpesa_b2c_transactions_ibfk_1')->references('id')->on('organizations')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mpesa_b2c_transactions', function (Blueprint $table) {
            $table->dropForeign('mpesa_b2c_transactions_ibfk_1');
        });
    }
}

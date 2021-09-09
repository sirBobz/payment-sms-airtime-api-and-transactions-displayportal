<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMpesaC2bTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mpesa_c2b_transactions', function (Blueprint $table) {
            $table->foreign('org_id', 'mpesa_c2b_transactions_ibfk_2')->references('id')->on('organizations')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('service_id', 'mpesa_c2b_transactions_ibfk_3')->references('id')->on('services')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mpesa_c2b_transactions', function (Blueprint $table) {
            $table->dropForeign('mpesa_c2b_transactions_ibfk_2');
            $table->dropForeign('mpesa_c2b_transactions_ibfk_3');
        });
    }
}

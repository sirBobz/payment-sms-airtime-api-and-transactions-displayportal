<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCardPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('card_payments', function (Blueprint $table) {
            $table->foreign('org_id', 'card_payments_ibfk_1')->references('id')->on('organizations')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('card_payments', function (Blueprint $table) {
            $table->dropForeign('card_payments_ibfk_1');
        });
    }
}

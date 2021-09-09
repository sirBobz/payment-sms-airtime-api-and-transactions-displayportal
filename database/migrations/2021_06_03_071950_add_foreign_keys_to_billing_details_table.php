<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBillingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('billing_details', function (Blueprint $table) {
            $table->foreign('account_id', 'billing_details_ibfk_1')->references('id')->on('accounts')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('service_id', 'billing_details_ibfk_2')->references('id')->on('services')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('org_id', 'billing_details_ibfk_3')->references('id')->on('organizations')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('billing_details', function (Blueprint $table) {
            $table->dropForeign('billing_details_ibfk_1');
            $table->dropForeign('billing_details_ibfk_2');
            $table->dropForeign('billing_details_ibfk_3');
        });
    }
}

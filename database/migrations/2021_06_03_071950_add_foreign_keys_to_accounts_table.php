<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->foreign('org_id', 'accounts_ibfk_1')->references('id')->on('organizations')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('service_id', 'accounts_ibfk_2')->references('id')->on('services')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropForeign('accounts_ibfk_1');
            $table->dropForeign('accounts_ibfk_2');
        });
    }
}

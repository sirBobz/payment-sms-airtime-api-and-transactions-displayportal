<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAccountIdCredentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_id_credentials', function (Blueprint $table) {
            $table->foreign('account_id', 'account_id_credentials_ibfk_1')->references('id')->on('accounts')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_id_credentials', function (Blueprint $table) {
            $table->dropForeign('account_id_credentials_ibfk_1');
        });
    }
}

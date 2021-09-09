<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTelcoPrefixsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('telco_prefixs', function (Blueprint $table) {
            $table->foreign('telco_id', 'telco_prefixs_ibfk_1')->references('id')->on('telcos')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('telco_prefixs', function (Blueprint $table) {
            $table->dropForeign('telco_prefixs_ibfk_1');
        });
    }
}

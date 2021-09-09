<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirtimeTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airtime_transactions', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->integer('status')->default(0)->index('status');
            $table->integer('billing_status')->default(0);
            $table->string('reference_name')->nullable();
            $table->string('request_id')->nullable();
            $table->bigInteger('org_id')->index('org_id');
            $table->bigInteger('telco_id')->nullable()->index('telco_id');
            $table->string('phone_number', 20);
            $table->decimal('amount', 10);
            $table->decimal('airtime', 5)->nullable();
            $table->decimal('available_balance', 10, 3)->nullable();
            $table->string('third_party_trans_id', 50)->nullable()->index('third_party_trans_id');
            $table->timestamp('transaction_time')->nullable()->useCurrent();
            $table->smallInteger('result_code')->nullable()->default(100);
            $table->string('result_desc')->nullable()->default('-- processing --');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airtime_transactions');
    }
}

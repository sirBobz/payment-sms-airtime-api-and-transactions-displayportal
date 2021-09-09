<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_details', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('org_id')->nullable()->index('org_id');
            $table->bigInteger('service_id')->nullable()->index('service_id');
            $table->bigInteger('account_id')->nullable()->index('account_id');
            $table->string('billing_rate', 255)->default('2');
            $table->string('billing_type', 255)->default('percent');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billing_details');
    }
}

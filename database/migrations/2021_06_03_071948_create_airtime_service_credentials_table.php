<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirtimeServiceCredentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airtime_service_credentials', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('service_id')->index('service_id');
            $table->bigInteger('telco_id')->nullable()->index('telco_id');
            $table->text('credentials');
            $table->boolean('status')->default(1)->comment('1 default for active 0 for inactive');
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
        Schema::dropIfExists('airtime_service_credentials');
    }
}

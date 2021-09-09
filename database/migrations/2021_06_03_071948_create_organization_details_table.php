<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_details', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('org_id')->index('org_id');
            $table->string('location', 100)->nullable();
            $table->string('website', 100)->nullable();
            $table->string('office_email', 100)->nullable();
            $table->string('office_mobile', 20)->nullable();
            $table->string('top_up_code', 10)->nullable()->unique('top_up_code');
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
        Schema::dropIfExists('organization_details');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToShipments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shipments', function (Blueprint $table) {
            $table->text('address')->after('shipment_date');
            $table->string('province')->after('address');
            $table->string('city')->after('province');
            $table->string('district')->after('city');
            $table->string('zipcode')->after('district');
            $table->string('phone')->after('zipcode');
            $table->integer('total_shipment_left')->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shipments', function (Blueprint $table) {
            $table->dropColumn(['address','province','city','district','zipcode','phone','total_shipment_left']);
        });
    }
}

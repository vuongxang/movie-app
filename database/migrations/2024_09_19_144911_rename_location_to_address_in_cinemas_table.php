<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameLocationToAddressInCinemasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('cinemas', function (Blueprint $table) {
            $table->renameColumn('location', 'address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('cinemas', function (Blueprint $table) {
            $table->renameColumn('address', 'location');
        });
    }
}

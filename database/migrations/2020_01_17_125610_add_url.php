<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUrl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         {
         Schema::table('festivals', function (Blueprint $table) {
            $table->string("url");
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddZonaIdToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('zona')->nullable()->after('password');
            $table->bigInteger('zona_id')->unsigned()->nullable()->after('password');
            $table->foreign('zona_id')->references('id')->on('zonas')
            ->onDelete('set null')
            ->onUpdate('cascade');;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
           $table->dropForeign(['zona_id']);
            $table->dropColumn('zona_id');
        });
    }
}

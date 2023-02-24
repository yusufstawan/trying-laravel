<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTemplatesIdToTemplatesBuilds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('templates_builds', function (Blueprint $table) {
            $table->unsignedBigInteger('templates_id')->nullable();
            $table->foreign('templates_id')->references('id')->on('templates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('templates_builds', function (Blueprint $table) {
            $table->dropForeign(['templates_id']);
            $table->dropColumn('templates_id');
        });
    }
}

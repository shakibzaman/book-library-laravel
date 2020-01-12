<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveBookIdFromSubRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_rules', function (Blueprint $table) {
            $table->dropColumn('book_id');
            $table->dropColumn('chap_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_rules', function (Blueprint $table) {
            $table->string('book_id');
            $table->string('chap_id');
        });
    }
}

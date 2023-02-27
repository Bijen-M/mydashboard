<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->enum('type',[1,2,3,4,5])->after('subtitle');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('site_favicon')->nullable();
            $table->string('contact_image')->nullable();
            $table->string('contact_message')->nullable();
            $table->string('site_email')->nullable();
            $table->string('site_address')->nullable();
            $table->string('site_contact')->nullable();
            $table->text('site_google_map_link')->nullable();
            $table->text('footer_message')->nullable();
            $table->text('footer_about_us')->nullable();
            $table->text('disclaimer')->nullable();
            $table->string('whatsapp')->nullable(); 
            $table->string('facebook')->nullable(); 
            $table->string('twitter')->nullable(); 
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
        Schema::dropIfExists('settings');
    }
}

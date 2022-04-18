<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->string('footer_tag_title');
            $table->longText('footer_text');
            $table->string('footer_link_text');
            $table->string('footer_contact_text');
            $table->string('footer_fb_link');
            $table->string('footer_youtube_link');
            $table->string('footer_linkedIn_link');
            $table->string('footer_insta_link');
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
        Schema::dropIfExists('footers');
    }
}

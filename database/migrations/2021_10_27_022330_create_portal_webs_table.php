<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortalWebsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portal_webs', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('divisi_id')->references('id')->on('divisi');
            $table->foreignId('divisi_id');
            $table->string('title');
            $table->string('desc');
            $table->char('link',100);
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
        Schema::dropIfExists('portal_webs');
    }
}

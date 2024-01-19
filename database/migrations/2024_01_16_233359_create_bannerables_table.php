<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannerablesTable extends Migration
{
    public function up()
    {
        Schema::create('bannerables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('banner_id');
            $table->unsignedBigInteger('bannerable_id');
            $table->string('bannerable_type');
            $table->timestamps();

            $table->foreign('banner_id')
                ->references('id')
                ->on('banners')
                ->onDelete('cascade');
            $table->index(['bannerable_id', 'bannerable_type']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('bannerables');
    }
}

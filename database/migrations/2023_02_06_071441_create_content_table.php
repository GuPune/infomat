<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->id();
            $table->text('title_th')->nullable();
            $table->text('title_en')->nullable();
            $table->text('detail_th')->nullable();
            $table->text('detail_en')->nullable();
            $table->text('desciption_en')->nullable();
            $table->text('desciption_th')->nullable();
            $table->text('url')->nullable();
            $table->text('image')->nullable();
            $table->text('keyword')->nullable();
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            $table->integer('seq')->nullable();
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
        Schema::dropIfExists('content');
    }
}

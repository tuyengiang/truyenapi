<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateChaptersTable.
 */
class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 191);
            $table->string('slug', 191);
            $table->text('content')->nullable();
            $table->string('link')->nullable();
            $table->unsignedBigInteger('id_store')->default(0)->unsigned();
            $table->foreign('id_store')->references('id')->on('stores')->onDelete('cascade');
            $table->unique('title');
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
        Schema::drop('chapters');
    }
}

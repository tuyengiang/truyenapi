<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateStoresTable.
 */
class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 191);
            $table->string('slug', 191);
            $table->text('overview')->nullable();
            $table->string('avatar', 191)->nullable();
            $table->bigInteger('status')->default(0);
            $table->string('info')->nullable();
            $table->integer('page_current')->default(0);
            $table->integer('page')->default(0);
            $table->string('link')->nullable();
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
        Schema::drop('stores');
    }
}

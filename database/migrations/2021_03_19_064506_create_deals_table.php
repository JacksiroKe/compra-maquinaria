<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100);
            $table->integer('deal_type');
            $table->unsignedInteger('type');
            $table->unsignedInteger('category');
            $table->text('description')->nullable();
            $table->string('year', 4);
            $table->unsignedInteger('make');
            $table->unsignedInteger('modell');
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('price', 50)->nullable();
            $table->string('price_currency', 10)->nullable();
            $table->integer('premium')->nullable();
            $table->text('sn')->nullable();
            $table->text('url')->nullable();
            $table->string('picture')->nullable();
            // Auction Fields
            $table->date('auc_enddate')->nullable();
            $table->string('auc_lot', 50)->nullable();
            $table->string('company')->nullable();
            $table->unsignedInteger('auctioneer')->nullable();
            // Truck Fields 
            $table->string('truck_year', 4)->nullable();
            $table->unsignedInteger('truckmake')->nullable();
            $table->string('truck_model', 50)->nullable();
            $table->string('truck_sn', 50)->nullable();
            // Specific Fields 
            $table->unsignedInteger('user');
            $table->timestamps();

            $table->foreign('type')->references('id')->on('types');
            $table->foreign('category')->references('id')->on('categories');
            $table->foreign('make')->references('id')->on('makes');
            $table->foreign('modell')->references('id')->on('modells');
            $table->foreign('truckmake')->references('id')->on('truckmakes');
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('auctioneer')->references('id')->on('auctioneers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deals');
    }
}

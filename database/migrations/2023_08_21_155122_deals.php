<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Deals extends Migration
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
            $table->string("internalName"); 
            $table->string("title"); 
            $table->string("metacriticLink"); 
            $table->string("dealID"); 
            $table->string("storeID"); 
            $table->string("gameID"); 
            $table->string("salePrice"); 
            $table->string("normalPrice"); 
            $table->string("isOnSale"); 
            $table->string("savings"); 
            $table->string("metacriticScore"); 
            $table->string("steamRatingText"); 
            $table->string("steamRatingPercent"); 
            $table->string("steamRatingCount"); 
            $table->string("steamAppID"); 
            $table->string("releaseDate"); 
            $table->string("lastChange"); 
            $table->string("dealRating"); 
            $table->string("thumb"); 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

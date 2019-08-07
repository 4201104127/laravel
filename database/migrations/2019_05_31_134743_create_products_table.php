<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('p_name')->nullable();
            $table->string('p_slug')->index();
            $table->integer('p_category_id')->index()->default(0);
            $table->integer('p_price')->default(0);
            $table->integer('p_author_id')->default(0)->index();
            $table->tinyInteger('p_sale')->default(0);
            $table->tinyInteger('p_active')->default(1)->index();
            $table->tinyInteger('p_hot')->default(0);
            $table->integer('p_view')->default(0);
            $table->string('p_description')->nullable();
            $table->string('p_avatar')->nullable();
            $table->string('p_description_seo')->nullable();
            $table->string('p_keyword_seo')->nullable();
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
        Schema::dropIfExists('products');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Product;

class CreateProduct extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type')->nullable();
            $table->integer('price')->nullable();
            $table->binary('product_image')->nullable();
            $table->timestamps();
        });

        Product::create([
            'name' => 'Logitech K400 Plus Wireless Touch Keyboard - 920007119',
            'type' => 'Computer accessories',
            'price' => '1500',
            'product_image' => null
        ]);

        Product::create([
            'name' => 'Logitech M570 Black Wireless Trackball Mouse - 910-001799',
            'type' => 'Normal Order',
            'price' => '1000',
            'product_image' => null
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('products');
    }

}

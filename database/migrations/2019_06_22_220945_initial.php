<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Initial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //FIXME bigIncrements issue
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('FullName', 30);
            $table->string('Address', 100);
            $table->boolean('Enabled');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name', 30);
            $table->string('PathOfImage', 100);
            $table->timestamps();
        });

        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name', 30);
            $table->string('WorkPhoneNumber', 15);
            $table->string('Email', 50);
            $table->string('Address', 100);
            $table->timestamps();
        });

        Schema::create('souvenirs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name', 30);
            $table->string('Description', 200);
            $table->double('Price');
            $table->unsignedInteger('Popularity');
            $table->string('PathOfImage', 100)->nullable();
            $table->unsignedInteger('CategoryID')->nullable();
            $table->foreign('CategoryID')->references('id')->on('categories')->onDelete('set null');
            $table->unsignedInteger('SupplierID')->nullable();
            $table->foreign('SupplierID')->references('id')->on('suppliers')->onDelete('set null');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('FirstName', 30);
            $table->string('LastName', 30);
            $table->string('Address', 100);
            $table->string('PhoneNumber', 15);
            $table->double('SubTotal');
            $table->double('GST');
            $table->double('GrandTotal');
            $table->string('OrderStatus', 10);
            $table->dateTime('Date');
            $table->unsignedInteger('UserID');
            $table->foreign('UserID')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('Quantity');
            $table->unsignedInteger('SouvenirID')->nullable();
            $table->foreign('SouvenirID')->references('id')->on('souvenirs')->onDelete('set null');
            $table->unsignedInteger('OrderID');
            $table->foreign('OrderID')->references('id')->on('orders')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Session', 30);
            $table->timestamps();
        });

        Schema::create('cart_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('Count');
            $table->dateTime('DateCreated');
            $table->unsignedInteger('SouvenirID');
            $table->foreign('SouvenirID')->references('id')->on('souvenirs')->onDelete('cascade');
            $table->unsignedInteger("ShoppingCartID");
            $table->foreign('ShoppingCartID')->references('id')->on('shopping_carts')->onDelete('cascade');
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('suppliers');
        Schema::dropIfExists('souvenirs');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_details');
        Schema::dropIfExists('shopping_carts');
        Schema::dropIfExists('cart_items');
    }
}

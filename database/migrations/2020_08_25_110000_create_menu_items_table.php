<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuItemsTable extends Migration
{
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("menu_id");
            $table->unsignedBigInteger("parent_id")->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->string("active_classes")->nullable();
            $table->string("classes")->nullable();
            $table->string("description")->nullable();
            $table->string("navigation_label");
            $table->unsignedSmallInteger("position")->nullable();
            $table->string("target")->nullable();
            $table->string("title_attribute")->nullable();
            $table->string("url");

            $table->foreign("menu_id")
                ->references("id")
                ->on("menus")
                ->onUpdate("CASCADE")
                ->onDelete("CASCADE");
            $table->foreign("parent_id")
                ->references("id")
                ->on("menu_items")
                ->onUpdate("CASCADE")
                ->onDelete("SET NULL");
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_items');
    }
}

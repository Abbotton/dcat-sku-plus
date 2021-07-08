<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkuAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sku_attribute', function (Blueprint $table) {
            $table->id();
            $table->string('attr_name', 128)->comment('规格名称');
            $table->enum('attr_type', ['checkbox', 'radio'])->comment('规格类型');
            $table->json('attr_value')->nullable()->comment('规格值');
            $table->tinyInteger('sort')->default(0)->comment('排序');
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
        Schema::dropIfExists('sku_attribute');
    }
}

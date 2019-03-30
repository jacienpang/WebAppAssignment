<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 100)->index();
            $table->string('lot_number', 10)->index();
            $table->unsignedInteger('zone_id');
            $table->unsignedInteger('floor_id');
            $table->unsignedInteger('category_id');
            $table->timestamps();

        });

        Schema::table('tenants', function (Blueprint $table) {
            $table->foreign('zone_id')
                ->references('id')->on('zones')->onDelete('cascade');
            $table->foreign('floor_id')
                ->references('id')->on('floors')->onDelete('cascade');
            $table->foreign('category_id')
                ->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}

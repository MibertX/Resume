<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillPortfolioItemTable extends Migration
{
    public function up()
    {
        Schema::create('skill_portfolio_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('skill_id')->unsigned();
            $table->integer('portfolio_item_id')->unsigned();
        });

        Schema::table('skill_portfolio_item', function (Blueprint $table) {
            $table->foreign('portfolio_item_id')
                ->references('id')->on('portfolio_items')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('skill_id')
                ->references('id')->on('skills')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('skill_portfolio_item');
    }
}

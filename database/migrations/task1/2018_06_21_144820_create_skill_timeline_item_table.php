<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillTimelineItemTable extends Migration
{
    public function up()
    {
        Schema::create('skill_timeline_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('skill_id')->unsigned();
            $table->integer('timeline_item_id')->unsigned();
        });

        Schema::table('skill_timeline_item', function (Blueprint $table) {
            $table->foreign('timeline_item_id')
                ->references('id')->on('timeline_items')
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
        Schema::dropIfExists('skill_timeline_item');
    }
}

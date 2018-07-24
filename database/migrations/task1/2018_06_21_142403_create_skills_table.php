<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsTable extends Migration
{
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique()->index();
            $table->integer('mastery_in_percent')->unsigned();
            $table->string('icon_path');
        });
    }

    public function down()
    {
        Schema::dropIfExists('skills');
    }
}

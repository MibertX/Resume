<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateFeedbacksTable extends Migration
{
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->index();
            $table->string('email')->index();
            $table->string('subject');
            $table->text('text');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::table('feedbacks', function (Blueprint $table) {
            $table->index('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('feedbacks');
    }
}

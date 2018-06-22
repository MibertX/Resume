<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTimelineItemsTable extends Migration
{
    public function up()
    {
        Schema::create('timeline_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 50)->index();
            $table->string('title');
            $table->string('text', 1000);
            $table->date('start_date')->index();
            $table->date('end_date')->index()->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::table('timeline_items', function (Blueprint $table) {
            $table->index('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('timeline_items');
    }
}

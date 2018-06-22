<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreatePortfolioItemsTable extends Migration
{
    public function up()
    {
        Schema::create('portfolio_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->string('preview_img')->nullable();
            $table->text('content');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::table('portfolio_items', function (Blueprint $table) {
            $table->index('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('portfolio_items');
    }
}

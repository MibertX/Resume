<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreatePortfolioCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('portfolio_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('portfolio_item_id')->unsigned();
            $table->string('username')->index();
            $table->text('text');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::table('portfolio_comments', function (Blueprint $table) {
            $table->foreign('portfolio_item_id')->references('id')->on('portfolio_items')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->index('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('portfolio_comments');
    }
}

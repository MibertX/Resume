<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->date('birthdate')->index();
            $table->string('email')->unique()->index();
            $table->string('login')->unique();
            $table->string('password');
            $table->string('location');
            $table->string('linked_in')->nullable();
            $table->string('skype')->nullable();
            $table->string('photo')->nullable();
            $table->text('about_text')->nullable();
            $table->rememberToken();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::table('users', function (Blueprint $table) {
            $table->index('created_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

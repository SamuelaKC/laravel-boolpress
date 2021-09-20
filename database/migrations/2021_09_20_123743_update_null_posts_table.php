<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNullPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->text('titlePost', 500)->nullable()->change();
            $table->longText('textPost')->nullable()->change();
            $table->text('etiquette', 255)->after('textPost')->nullable()->change();
            $table->text('comment')->after('etiquette')->nullable()->change();
            $table->text('image')->after('comment')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
}
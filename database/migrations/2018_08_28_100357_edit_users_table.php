<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('status')->default(1)->after('name');
            $table->string('phone')->after('name');
            $table->date('birthday')->after('name');
            $table->string('address')->after('name');
            $table->string('provider_id')->nullable();
            $table->string('email')->nullable()->change();
            $table->string('password')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('phone');
            $table->dropColumn('birthday');
            $table->dropColumn('address');
            $table->dropColumn('provider_id');
            $table->string('password')->change();
            $table->string('email')->unique()->change();
        });
    }
}

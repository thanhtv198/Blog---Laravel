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
            $table->integer('status')->after('name')->default(config('blog.user.status.active'));
            $table->tinyInteger('role')->after('name')->default(config('blog.user.role.admin'));
            $table->string('avatar')->after('name')->nullable();
            $table->date('birthday')->after('name')->nullable();
            $table->string('provider_id')->nullable()->after('name');
            $table->string('email')->nullable()->change();
            $table->string('password')->nullable()->change();
            $table->softDeletesTz()->after('status');
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
            $table->dropColumn('role');
            $table->dropColumn('birthday');
            $table->dropColumn('provider_id');
            $table->dropColumn('avatar');
            $table->string('password')->change();
            $table->string('email')->unique()->change();
            $table->dropColumn('delete_at');
        });
    }
}

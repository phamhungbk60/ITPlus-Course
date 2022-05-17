<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvatarPathAndAvatarNameToUserInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_information', function (Blueprint $table) {
            $table->string('avatar_path');
            $table->string('avatar_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_information', function (Blueprint $table) {
            $table->dropColumn('avatar_path');
            $table->dropColumn('avatar_name');
        });
    }
}

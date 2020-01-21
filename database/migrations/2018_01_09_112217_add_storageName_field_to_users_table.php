<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStorageNameFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('storageName')->after('name');
            $table->string('storageAddress')->after('storageName');
            $table->string('taxNumber')->after('storageAddress');
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
            $table->dropColumn('storageName');
            $table->dropColumn('storageAddress');
            $table->dropColumn('taxNumber');
        });
    }
}

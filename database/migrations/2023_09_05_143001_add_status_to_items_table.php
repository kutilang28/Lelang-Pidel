<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('items', function (Blueprint $table) {
        $table->enum('status', ['active', 'inactive'])->default('active')->nullable();
    });
}

public function down()
{
    Schema::table('items', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}

}

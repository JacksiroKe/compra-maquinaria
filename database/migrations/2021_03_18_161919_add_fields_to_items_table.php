<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->string('status')->nullable()->after('category');
            $table->date('date')->nullable()->after('status');
            $table->boolean('show_on_homepage')->default(0)->after('date');
            $table->text('options')->nullable()->default(null)->after('show_on_homepage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn(['status', 'date', 'show_on_homepage', 'options']);
        });
    }
}

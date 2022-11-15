<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // published => unpublished
        // unpublished => published
        // in_check => unpublished or published
        Schema::table('articles', function (Blueprint $table) {
            $table
                ->enum('status', ['published', 'unpublished', 'in_check'])
                ->default('in_check')
                ->after('image_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};

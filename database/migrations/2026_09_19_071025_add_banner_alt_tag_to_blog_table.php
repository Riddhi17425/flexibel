<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBannerAltTagToBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
        {
            Schema::table('blog', function (Blueprint $table) {
                $table->string('banner_alt_tag')->nullable()->after('banner_image');
            });
        }

    public function down()
        {
            Schema::table('blog', function (Blueprint $table) {
                $table->dropColumn('banner_alt_tag');
            });
        }

}


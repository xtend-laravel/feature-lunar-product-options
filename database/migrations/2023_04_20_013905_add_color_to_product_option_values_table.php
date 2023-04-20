<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Lunar\Base\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table($this->prefix.'product_option_values', function (Blueprint $table) {
            $table->string('color')->nullable()->after('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table($this->prefix.'product_option_values', function (Blueprint $table) {
            $table->dropColumn('color');
        });
    }
};

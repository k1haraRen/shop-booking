<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddQrFieldsToReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            if (!Schema::hasColumn('reservations', 'qr_token')) {
                $table->string('qr_token', 64)->unique()->nullable()->after('id');
            }
            if (!Schema::hasColumn('reservations', 'qr_used_at')) {
                $table->timestamp('qr_used_at')->nullable()->after('qr_token');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            if (Schema::hasColumn('reservations', 'qr_used_at')) {
                $table->dropColumn('qr_used_at');
            }
            if (Schema::hasColumn('reservations', 'qr_token')) {
                $table->dropColumn('qr_token');
            }
        });
    }
}

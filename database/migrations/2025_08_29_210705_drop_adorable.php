<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('avatar_adorable_uuid');
            $table->dropColumn('avatar_adorable_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->uuid('avatar_adorable_uuid')->after('avatar_gravatar_url')->nullable();
            $table->string('avatar_adorable_url', 250)->after('avatar_adorable_uuid')->nullable();
        });
    }
};

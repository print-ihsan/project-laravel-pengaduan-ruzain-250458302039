<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table(table: 'users', callback: function (Blueprint $table)  {
            $table->string(column: 'whatsapp')->nullable()->after(column: 'email');
            $table->string(column: 'photo')->nullable()->after(column: 'whatsapp');
            $table->text(column: 'address')->nullable()->after(column: 'photo');
            $table->enum(column: 'role', allowed : ['admin', 'warga'])->default(value: 'warga')->after(column: 'address');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table): void {
            $table->dropColumn(columns: ['whatsapp', 'photo', 'address', 'role']);
        });
    }
};

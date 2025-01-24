<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->string('email')->unique();  // Add the email column if missing
            $table->string('password');          // Add the password column if missing
            // Add any other columns as needed
        });
    }
    
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('password');
            // Drop other columns if needed
        });
    }
    
};

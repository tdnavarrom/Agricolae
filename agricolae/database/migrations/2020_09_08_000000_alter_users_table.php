<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    public function up() 
    {
        Schema::table('users', function($table)
        {
            $table->string('last_name');
            $table->string('cell_phone');
            $table->string('user_type');
        });
    }
}

?>
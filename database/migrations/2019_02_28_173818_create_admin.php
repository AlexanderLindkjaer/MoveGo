<?php

use Illuminate\Database\Migrations\Migration;

class CreateAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $p = \App\User::where('email', 'petertoftekaer@gmail.com')->first();
        $a = \App\User::where('email', 'aksel-faxe@hotmail.com')->first();

        if ($p) {
            $p->is_admin = true;
            $p->save();
        }

        if ($a) {
            $a->is_admin = true;
            $a->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

<?php

use Illuminate\Database\Seeder;

class Language extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('language')->insert([
            'code' => 'pt-br',
            'name' => 'Português'
        ]);
        DB::table('language')->insert([
            'code' => 'en-us',
            'name' => 'English'
        ]);
        DB::table('language')->insert([
            'code' => 'es',
            'name' => 'Español'
        ]);
    }
}

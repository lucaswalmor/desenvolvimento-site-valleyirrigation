<?php

use Illuminate\Database\Seeder;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('module_permissions')->insert([
            'id' => 1,
            'name' => "0_afericao",
        ]);
        DB::table('module_permissions')->insert([
            'id' => 2,
            'name' => "1_redimensionamnento",
        ]);
        DB::table('module_permissions')->insert([
            'id' => 3,
            'name' => "2_entregaTecnica",
        ]);


        DB::table('type_user_permissions')->insert([
            'id' => 1,
            'name' => "0_administrator",
        ]);
        DB::table('type_user_permissions')->insert([
            'id' => 2,
            'name' => "1_manager",
        ]);
        DB::table('type_user_permissions')->insert([
            'id' => 3,
            'name' => "2_dealer_technician",
        ]);
        DB::table('type_user_permissions')->insert([
            'id' => 4,
            'name' => "3_consultant",
        ]);
    }
}

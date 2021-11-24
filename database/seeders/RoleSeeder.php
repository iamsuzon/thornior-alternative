<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users_role = [
            ['role_name' => 'Super Admin', 'role_type' => 'superadmin'],
            ['role_name' => 'Admin', 'role_type' => 'admin'],
            ['role_name' => 'Editor', 'role_type' => 'editor'],
            ['role_name' => 'Author', 'role_type' => 'author'],
            ['role_name' => 'Blogger', 'role_type' => 'blogger'],
        ];

        foreach($users_role as $role){
            DB::table('user_roles')->insert([
                'role' => $role
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Role;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->delete();
        $roles = ['administrator', 'super-user', 'user'];
        foreach($roles as $role){

            Role::create(array(
                'name'      => $role
            ));

        }
        
    }
}

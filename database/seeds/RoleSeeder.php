<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeders = array();

        array_push($seeders, array(        	
        	'name' => 'admin',
        	'display_name' => 'admin',
        	'description' => 'admin'        	
        ));        

        foreach ($seeders as $seeder) {
        	Role::create($seeder);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Plan;
class PlanSeeder extends Seeder
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
        	'roaster_id' => 1,
        	'name' => 'Plan A',
        	'weight' => '100',
        	'price' => 90000
        ));
        array_push($seeders, array(
        	'roaster_id' => 2,
        	'name' => 'Plan B',
        	'weight' => '200',
        	'price' => 170000
        ));
        array_push($seeders, array(
        	'roaster_id' => 1,
        	'name' => 'Plan C',
        	'weight' => '350',
        	'price' => 280000
        ));

        foreach ($seeders as $seeder) {
        	Plan::create($seeder);
        }
        
    }
}

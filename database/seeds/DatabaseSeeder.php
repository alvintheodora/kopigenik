<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call('PlanSeeder');
        $this->command->info("Plan table seeded :)");
        $this->call('RoleSeeder');
        $this->command->info("Role table seeded :)");
    }
}

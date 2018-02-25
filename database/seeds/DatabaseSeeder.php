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
        // $this->call(OriginsTableSeeder::class);
        // $this->call(DestinationsTableSeeder::class);
        // $this->call(StatusesTableSeeder::class);
        // $this->call(CommoditiesTableSeeder::class);
        // $this->call(CostsTableSeeder::class);
        $this->call(PaymentMethodsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}

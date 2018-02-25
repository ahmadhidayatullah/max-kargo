<?php

use App\Models\Cost;
use Illuminate\Database\Seeder;

class CostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cost::create($this->input(1, 1, 1, 87000, 8700, 0.9));
        Cost::create($this->input(1, 2, 1, 157000, 15700, 0.9));
        Cost::create($this->input(1, 3, 1, 214000, 21400, 0.9));
        Cost::create($this->input(1, 4, 1, 158000, 15800, 0.9));
        Cost::create($this->input(1, 5, 1, 258000, 25800, 0.9));
        Cost::create($this->input(1, 6, 1, 216000, 21600, 0.9));
        Cost::create($this->input(1, 7, 1, 171000, 17100, 0.9));
        Cost::create($this->input(1, 8, 1, 157000, 15700, 0.9));
        Cost::create($this->input(1, 9, 1, 253000, 25300, 0.9));
        Cost::create($this->input(1, 10, 1, 205000, 20500, 0.9));
        Cost::create($this->input(1, 11, 1, 245000, 24500, 0.9));
        Cost::create($this->input(1, 12, 1, 246000, 24600, 0.9));
        Cost::create($this->input(1, 13, 1, 136000, 13600, 0.9));
    }

    public function input($origin_id, $destination_id, $commodity_id, $minimal, $nominal, $base_rate)
    {
        $plus_45  = $nominal - 300;
        $plus_100 = $nominal - 500;

        return [
            'origin_id' => $origin_id,
            'destination_id' => $destination_id,
            'commodity_id' => $destination_id,
            'price' => [
                'minimal' => $minimal,
                'nominal' => $nominal,
                'plus_45' => $plus_45,
                'plus_100' => $plus_100
            ],
            'base_rate' => $base_rate
        ];
    }
}

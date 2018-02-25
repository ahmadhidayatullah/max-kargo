<?php

use App\Models\Commodity;
use Illuminate\Database\Seeder;

class CommoditiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Commodity::create($this->input('0300', 'Fish(edible), Seafood'));
        Commodity::create($this->input('0301', 'Fish(edible), Seafood(excluding Caviar)'));
        Commodity::create($this->input('0302', 'Seafood'));
        Commodity::create($this->input('0304', 'Sea Urchin / Processed'));
        Commodity::create($this->input('0305', 'Sea Urchin'));
        Commodity::create($this->input('0306', 'Fish, Fish products'));
        Commodity::create($this->input('0307', 'Fish(processed)'));
        Commodity::create($this->input('0308', 'Fish(smoked)'));
        Commodity::create($this->input('0309', 'Shellfish'));
        Commodity::create($this->input('0310', 'Clams, Oysters, Scallops'));
        Commodity::create($this->input('0311', 'Cockies'));
        Commodity::create($this->input('0314', 'Abalone'));
        Commodity::create($this->input('0315', 'Crabs, Crawfish, Lobsters'));
        Commodity::create($this->input('0316', 'Crabs'));
        Commodity::create($this->input('0318', 'Tilapia'));
        Commodity::create($this->input('0319', 'Mahi Mahi'));
        Commodity::create($this->input('0320', 'Eel'));
        Commodity::create($this->input('0323', 'Tuna(fresh)'));
        Commodity::create($this->input('0324', 'Fish(edible/excluding Lobsters, Scallops)'));
        Commodity::create($this->input('0326', 'Fish(edible)'));
        Commodity::create($this->input('0330', 'Fish Roe'));
        Commodity::create($this->input('0334', 'Fish Gut (dried)'));
        Commodity::create($this->input('0335', 'Frogs'));
        Commodity::create($this->input('0340', 'Salmon'));
        Commodity::create($this->input('0355', 'Snapper'));
        Commodity::create($this->input('0356', 'Fish, Crabs, Shrimps-edible-'));
        Commodity::create($this->input('0380', 'Shrimps, Prawns'));
        Commodity::create($this->input('0382', 'Shrimps and/or Prawns'));
        Commodity::create($this->input('0384', 'Shrimps, Prawns, Lobsters'));
        Commodity::create($this->input('0385', 'Turtle'));
        Commodity::create($this->input('0386', 'Lobsters'));
        Commodity::create($this->input('1091', 'Snails'));
    }

    public function input($code, $name)
    {
        return [
            'code' => $code,
            'name' => $name
        ];
    }
}

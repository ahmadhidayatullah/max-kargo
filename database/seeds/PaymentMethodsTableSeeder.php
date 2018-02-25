<?php

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::create($this->input('cash', 'TUNAI'));
        PaymentMethod::create($this->input('bank-xyz', 'BANK XYZ', '<p>XYZ Cab. TIMIKA<br />No. Rek. 08118012345<br />a/n Iska'));
    }

    public function input($name, $display_name, $description = null)
    {
        return [
            'name' => $name,
            'display_name' => $display_name,
            'description' => $description
        ];
    }
}

<?php

use App\Models\Destination;
use Illuminate\Database\Seeder;

class DestinationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Destination::create($this->input('SOQ', 'SORONG', 'PAPUA BARAT')); //1
        Destination::create($this->input('SRG', 'SEMARANG', 'JAWA TENGAH')); //2
        Destination::create($this->input('SQG', 'SINTANG', 'KALIMANTAN BARAT')); //3
        Destination::create($this->input('SUB', 'SURABAYA', 'JAWA TIMUR')); //4
        Destination::create($this->input('SWQ', 'SUMBAWA', 'NUSA TENGGARA BARAT')); //5
        Destination::create($this->input('SXK', 'SAUMLAKI', 'MALUKU')); //6
        Destination::create($this->input('TJQ', 'TANJUNG PANDAN', 'KEPULAUAN BANGKA BELITUNG')); //7
        Destination::create($this->input('TKG', 'BANDAR LAMPUNG', 'LAMPUNG')); //8
        Destination::create($this->input('TMC', 'WAIKABUBAK', 'NUSA TENGGARA TIMUR')); //9
        Destination::create($this->input('TNJ', 'TANJUNG PINANG', 'KEPULAUAN RIAU')); //10
        Destination::create($this->input('TRK', 'TARAKAN', 'KALIMANTAN UTARA')); //11
        Destination::create($this->input('TTE', 'TERNATE', 'MALUKU UTARA')); //12
        Destination::create($this->input('UPG', 'MAKASSAR', 'SULAWESI SELATAN')); //13

    }

    public function input($code, $name, $province)
    {
        return [
            'code' => $code,
            'name' => $name,
            'province' => $province
        ];
    }
}

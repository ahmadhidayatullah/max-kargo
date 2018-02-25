<?php

use App\Models\Origin;
use Illuminate\Database\Seeder;

class OriginsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Origin::create($this->input('TIM', 'TIMIKA', 'PAPUA'));
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

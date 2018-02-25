<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create($this->input('M', 'Manifest', 'Barang baru didaftarkan di kantor Max Kargo asal pengiriman.'));
        Status::create($this->input('OP','On-Process', 'Barang sedang dalam proses pengiriman/perjalanan.'));
        Status::create($this->input('OT', 'On-Transit', 'Barang sedang transit di kota tertentu.'));
        Status::create($this->input('D', 'Delivered', 'Barang telah sampai di kota tujuan.'));
    }

    public function input($name, $display_name, $description)
    {
        return [
            'name' => $name,
            'display_name' => $display_name,
            'description' => $description
        ];
    }
}

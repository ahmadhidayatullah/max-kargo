<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin 1 Max Kargo',
            'email' => 'admin@max-kargo.com',
            'phone' => '085223408017',
            'address' => 'telkomas',
            'password' => bcrypt('1234qwer')
        ]);
    }
}

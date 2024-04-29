<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123')
        ]);
        $admin->assignRole('admin');

        $cabincrew = User::create([
            'name' => 'cabincrew',
            'email' => 'cabincrew@gmail.com',
            'password' => bcrypt('cabincrew123')
        ]);
        $cabincrew->assignRole('cabincrew');

        $management = User::create([
            'name' => 'management',
            'email' => 'management@gmail.com',
            'password' => bcrypt('management123')
        ]);
        $management->assignRole('management');
    }
}

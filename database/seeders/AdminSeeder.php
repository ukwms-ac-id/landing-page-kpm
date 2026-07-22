<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin.kpm@ukwms.ac.id'],
            [
                'name' => 'Super Admin KPM',
                'password' => Hash::make('pw123'),
                'is_admin' => true,
            ]
        );
    }
}
